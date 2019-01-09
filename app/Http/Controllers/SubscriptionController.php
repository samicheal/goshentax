<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * return register page 
     */
    public function subscribeOrContinue(){

        return view('frontend.subscribe.register');

    }

    /**
     * hanlde register form for subscription process
     */
    public function register(Request $request){

        //validate form requests
        $request-validate([
            'firstname' => 'required|alpha',
            'lastname' => 'required|alpha',
            'email' => 'required|email',
            'phone' => 'required|digits:11'
        ]);

    }
}
