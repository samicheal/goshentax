<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserTemporary;
use Session;

class SubscriptionsController extends Controller
{
    /**
     * return register page 
     */
    public function subscribeOrContinue(){

        //return register page
        return view('frontend.subscribe.register');

    }

    /**
     * hanlde register form for subscription process
     */
    public function register(Request $request){

        return redirect()->route('subscription.subscriptionchoice' , [ 'email' => $request->email , 'id' => 2 ]);

        //validate form requests
        $request->validate([
            'firstname' => 'required|alpha',
            'lastname' => 'required|alpha',
            'email' => 'required|email',
            'phone' => 'required|digits:11'
        ]);

        //check if duplicate record exists in database
        $duplicateCount = UserTemporary::all()->where('email' , $request->email)->count(); 

        //send mail
        if(!$duplicateCount){

                //generate pass token
                $subscriber = new UserTemporary;

                //add details to subscriber
                $subscriber->first_name = $request->firstname;
                $subscriber->last_name = $request->lastname;
                $subscriber->email = $request->email;
                $subscriber->phone = $request->phone;
                $subscriber->email_verification = 0;
                
                //generate token
                $random = substr(str_shuffle(MD5(microtime())) ,0, 15); 
                $subscriber->email_token = $random;

                $url = "www.goshentax.com/email_verification/$subscriber->email/".$random;

                //save subscriber register details
                if($subscriber->save()){

                    $url = "www.goshentax.com/email_verification/$subscriber->email/".$random.$subscriber->id;

                    return redirect()->route('subscription.subscriptionchoice' , [ 'email' => $request->email , 'id' => $subscriber->id ]);

                    //send mail to subscriber
                    Mail::raw("Click link to verify email. $url", function($message)
	                        {
		                        $message->subject('Email Validation for GoshenTax');
		                        $message->from('subscribe@goshentax.com', 'www.goshentax.com');
		                        $message->to('samicheal0976@gmail.com');
                            });

                    //send notitfication to user about email verification        
	                
                }else{
                    //send message to user
                    dd('registeration unsuccessful');
                }

            }
            else{
                //send toastr notification to user
                dd('This email account has been used, register with another email address');
            }

    }

     /**
     * return register page 
     */
    public function emailVerify($email , $token){

        //extract last character from token
        $savedToken = substr($token , 0 , count($token) - 2);

        $id = substr($token , count($token) - 2 , count($token) );

        //check if email and $token exist in database
        $result = UserTemporary::where('email', $email)->where('email_token', $savedToken);
        
        if( $result->count() == 1 )
         {
            $record = UserTemporary::find($id);
            $record->email_verification = 1;

            if($record->save()){
                dd('email account successfully verified');
            }
                
         }
         else{
             dd('unsuccessful email verification');
         } 

    }


    /**
     * return register page 
     */
    public function subtypeForm($email , $id){
        
        return view('frontend.subscribe.paymentplan')
                ->with('email' , $email)
                ->with('id' , $id);

    }

}
