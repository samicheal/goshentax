<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Advert;
use App\User;
use App\AuditAdverts;
use App\Company;
use Auth;
use Session;
use Validator;
use Response;
use View;
use Carbon\carbon;
use DateTime;

class AdvertsController extends Controller
{

    //decalare instance variables
    private $input;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //return view for mangeposts for user
        if(Auth::user()->role == "USER")
            return view('advert.manageadverts')->with('adverts' , User::find(Auth::id())->adverts);
        
        //view for admin and superadmin  
        return view('advert.manageadverts')->with('adverts' , Advert::all());   
    }
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //display advert creation form
        return view('advert.adverts');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //current date from server
        $currentDate = date('d-m-Y');

        //validation
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'banner' => 'required|image',
            'company' => 'required|string',
            'amount' => 'required|numeric|digits_between:0,7',
            'amountPaid' => 'required|numeric|digits_between:0,7',
            'expiration' => 'required|date|after:'.$currentDate
        ]);

        //validation failure
         if($validator->fails()) 
             return Response::json(array('errors' => $validator->getMessageBag()->toArray()));

        //check amount fields
        if($request->amountPaid > $request->amount)
            return Response::json(array('amountError' => 1));

            
        //create new company if gta code ends with XXXX
          $coyCode = explode("/" , $request->companyId);
          $coyCode = $coyCode[2];

          //get id of compnay with name
          $count = Company::all()->where('name' , strtolower( $request->company) )->count();
   
          if($coyCode == "XXXX"  && $count == 0){

                try{
                    //create company
                      $company = new Company;
                      $company->name = strtolower($request->company);
                      $company->save();
                      
                      $coyCode = $company->id; 

                    }
                    catch(\Exception $e){ 
                        return Response::json(array('coyError' => 1 )); 
                    }  

                try{    
                      //create company object
                      $date = date('Ymd');
                      $c_code = 'GTA/'.$date.'/'.$coyCode;

                      //update company record
                      $company = Company::find($coyCode);
                      $company->code = $c_code;
                      $company->created_by = Auth::id();

                      $company->save(); //update comapny code
                        
                      //return Response::json(array(['error' => class_basename($e) , 'in' => basename($e->getFile())] , 404));
                }
                catch(\Exception $e){ 
                    return Response::json(array('coyError' => 2 )); 
                }
            }   

        //check for duplicate
        $duplicate = Advert::all()->where('title' , $request->title)->count(); 
   
        //advert creation process for unique ad
        if(!$duplicate){
             //get image content
             $banner = $request->banner;
            
             //create custom name for featured image
             $banner_new_name = time().$banner->getClientOriginalName();
 
             //move image to uploads folder
             $banner->move('uploads/adverts' , $banner_new_name);
 
             //declare approval status of request and request variables
             $approved = 1;
 
             //database update preparation
             if(Auth::user()->role == "USER")
                  $approved = 0;  
         
            
             //get company id
             $coyCode = Company::all()->where('name' , strtolower( $request->company) )->first()->id;  
                  
             //append request data to global input variable
             $this->input = request()->all();
             $this->input['approved'] = $approved;
             $this->input['banner'] =  $banner_new_name;
             $this->input['companyId'] = $coyCode;
             $this->input['user_id'] =  Auth::id();

             //return Response::json(array('here' => $this->input));
 
             //upload data using tranactions to enable rollbacks and committs
             DB::transaction(function(){
                
                 $advert = Advert::create([
                     'title' => $this->input['title'],
                     'amount' => $this->input['amount'],
                     'paid' => $this->input['amountPaid'],
                     'expiration' => $this->input['expiration'],
                     'approved' => $this->input['approved'],
                     'banner' => 'uploads/adverts/'.$this->input['banner'],
                     'user_id' => $this->input['user_id'],
                     'company_id' => $this->input['companyId']
                 ]);
 
                 $audit_advert = AuditAdverts::create([
                     'action' =>  'create',
                     'resource_name' => $this->input['title'],
                     'user_id' => $this->input['user_id']
                 ]);
 
             });

             return Response::json(array('success' => 'Advert created successfully.'));
        }else
            return Response::json(array('alert' => 'Advert with same title already exists'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve($id)
    {
        //for error handling
        try{
            //retrieve post with id
            $advert = Advert::find($id);  

            //set approval status to 1
            $advert->approved = 1;

            //save post
            if($advert->save()){

                //create success message
                Session::flash('success' , "Advert approved");

                // redirect to home page
                return redirect()->route('advert.manage');
            }
        }
        catch(\Exception $e){
            //create success message
            Session::flash('success' , "Advert not approved");

            // redirect to home page
            return redirect()->route('advert.manage');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //retrieve post with id
        $advert = Advert::find($id);

        //return view
        return view('advert.advertedit')
                    ->with('amountError' , 0)
                    ->with('advert' , $advert);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //current date from server
        $currentDate = date('d-m-Y'); 
        $status = 0;

         //validation
         $validated = $this->validate($request, [
            'title' => 'required|string',
            'company' => 'required|string',
            'amount' => 'required|numeric|digits_between:0,7',
            'amountPaid' => 'required|numeric|digits_between:0,7',
            'expiration' => 'required|date|after:'.$currentDate
        ]);

        //create new company if gta code ends with XXXX
        $coyCode = explode("/" , $request->companyId);
        $coyCode = $coyCode[2];
        
        //get id of compnay with name
        $count = Company::all()->where('name' , strtolower( $request->company) )->count();
        
        if($coyCode == "XXXX"  && $count == 0){

            try{
                //create company
                  $company = new Company;
                  $company->name = strtolower($request->company);
                  $company->save();
                  
                  $coyCode = $company->id; 

                }
                catch(\Exception $e){ 
                    return Response::json(array('coyError' => 1 )); 
                }  

            try{    
                  //create company object
                  $date = date('Ymd');
                  $c_code = 'GTA/'.$date.'/'.$coyCode;

                  //update company record
                  $company = Company::find($coyCode);
                  $company->code = $c_code;
                  $company->created_by = Auth::id();

                  $company->save(); //update comapny code
                    
                  //return Response::json(array(['error' => class_basename($e) , 'in' => basename($e->getFile())] , 404));
            }
            catch(\Exception $e){ 
                return Response::json(array('coyError' => 2 )); 
            }
        }

            //retrieve advert data  
            $advert = Advert::find($id);

            try{
                //if new ad banner
                if($request->hasFile('banner')){
                    
                    //get image content
                    $banner = $request->banner;
                    
                    //create custom name for featured image
                    $banner_new_name = time().$banner->getClientOriginalName();

                    //move image to uploads folder
                    $banner->move('uploads/adverts' , $banner_new_name);

                    $advert->banner = 'uploads/adverts/'.$banner_new_name;

                }
            }catch(\Exception $e){
                return Response::json(array('bannerUpload' => 3 )); 
            }    

            //submit data
            try{
                //declare approval status of request and request variables
                $approved = $advert->approved;

                //database update preparation
                if(Auth::user()->role == "USER")
                    $approved = 0; 
                    
                //get company id
                $coyCode = Company::all()->where('name' , strtolower( $request->company) )->first()->id;     
        
                //submit updated record to database
                $advert->title = $request->title;
                $advert->amount = $request->amount;
                $advert->paid = $request->amountPaid;
                $advert->expiration = $request->expiration;
                $advert->approved = $approved;
                $advert->banner = $advert->banner;
                $advert->user_id = Auth::id();
                $advert->company_id = $coyCode;

                //dd($advert);
                //append request data to global input variable
                $this->input['title'] = $advert->id;
                $this->input['user_id'] = Auth::id();

                //dd($this->input);

                if($advert->save()){

                    try{
                        $audit_advert = AuditAdverts::create([
                            'action' =>  'edit',
                            'resource_name' => $this->input['title'],
                            'user_id' => $this->input['user_id']
                        ]);
                    }
                    catch(\Exception $e){
                        //create error session variable
                        Session::flash('audit' , 'crtitcal!! , audit entry for update not performed');
                        
                        return redirect()->route('advert.manage');
                        //return Response::json(array('auditTable' => 4 ));
                    }   

                    return redirect()->route('advert.manage');
                }       
            }
            catch(\Exception $e){
                return Response::json(array('bannerUpload' => 3 ));
            }
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        //find resource to be deleted
        $advert = Advert::find($request->id);

        //create new audit object
        $audit = new AuditAdverts;

        //delete news
        if($advert->delete()){

            $audit->action = "delete";
            $audit->resource_name = $advert->title;
            $audit->user_id = $advert->user_id;

            if($audit->save())
                return Response::json(array('success' => 1 , 'id' => $request->id));
               
            return Response::json(array('data' => 'young, dumb and broke' ));    
        }

            return Response::json(array('fail' => 1));
    }

    /**
     * Generate company code for advert.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function generateCode(Request $request)
    {
        //get id of compnay with name
        $count = Company::all()->where('name' , strtolower($request->id) )->count();

        if($count == 0){
            $date = date('Ymd');
            $c_code = 'GTA/'.$date.'/XXXX';
        }
        else{
            $coy = Company::all()->where('name' , strtolower($request->id) )->first();
            $date = date('Ymd');
            $c_code = 'GTA/'.$date.'/'.$coy->id;
        }
                
        return Response::json(array('success' => $c_code));

    }
}
