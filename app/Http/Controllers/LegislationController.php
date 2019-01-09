<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Legislation;
use App\AuditLegislation;
use Session;
use Auth;
use Response;
use Validator;

class LegislationController extends Controller
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
            return view('legist.managelegislation')->with('legislations' , User::find(Auth::id())->legislations);
      
        //view for admin and superadmin  
        return view('legist.managelegislation')->with('legislations' , Legislation::all()); 
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('legist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'policy' => 'required|mimes:pdf',
            'contents' => 'required|string'
        ]);

        if($validator->fails()) 
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));

        //check for duplicate
        $duplicate = Legislation::where('title' , $request->title)->where('content' , $request->policy->getClientOriginalName())->count();

        //check for uniqueness of data    
        if( !$duplicate ){

            //declare approval status of request and request variables
            $approved = 1;

            //database update preparation
            if(Auth::user()->role == "USER")
                $approved = 0;

            //append request data to global input variable
            $this->input['approved'] = $approved;
            $this->input['content'] =  $request->policy->getClientOriginalName();
            $this->input['user_id'] =  Auth::id();
            
            //start transaction 
            DB::connection();

            DB::beginTransaction();

            //submit form data
            try{ 
                //create legislation object
                Legislation::create([
                    'title' => Input::get('title'),
                    'excerpt' => Input::get('contents'),
                    'content' => $this->input['content'],
                    'approved' => $this->input['approved'],
                    'slug' => str_slug(Input::get('title')),
                    'user_id' => $this->input['user_id']
                ]); 
                
                //create audit legislation object
                AuditLegislation::create([
                    'action' => 'create',  
                    'resource_name' => Input::get('title'),
                    'user_id' => $this->input['user_id']
                ]);

            }
            catch(\Exception $e){
                DB::rollBack();
                //generate error page
            }

            //commit the queries
            DB::commit();
            
            //get policy content
            $policy = $request->policy;

            //move policy pdf to uploads folder
            $policy->move('uploads/legislation' , $policy->getClientOriginalName());

            return Response::json(array('success' => 'legislation added successfully.'));

        }
        else{
            return Response::json(array('alert' => 'legislation with same title or policy document already exists'));
        }

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
            $legislation = Legislation::find($id);  

            //set approval status to 1
            $legislation->approved = 1;

            //save post
            if($legislation->save()){

                //create success message
                Session::flash('success' , "litigation approved");

                // redirect to home page
                return redirect()->route('legislation.index');
            }
        }
        catch(\Exception $e){
            //create success message
            Session::flash('success' , "litigation not approved");

            // redirect to home page
            return redirect()->route('legislation.index');
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
        //retrieve legislation with id
        $litigation = Legislation::find($id);

        //return view
        return view('legist.edit')->with('litigation' , $litigation);
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
        //validation
        $validated = $this->validate($request, [
            'title' => 'required|string',
            'contents' => 'required|string'
        ]);
            
        $litigation = Legislation::find($id); //retrieve legislation
           
        if($request->hasFile('policy')){

            //policy new name
            $featured_new_name = $request->policy->getClientOriginalName();

            //update content
            $litigation->content = $request->policy->getClientOriginalName(); //update legislation name
        } 

        if( $request->hasFile('policy') )
            //check for duplicate
            $record = Legislation::where('title' , $request->title)->where('content' , $request->policy->getClientOriginalName())->count();
        else
            //check for duplicate
            $record = Legislation::where('title' , $request->title)->where('content' , $litigation->content )->count();
    
        //check for uniqueness of data    
        if($record == 1){

            //declare approval status of request and request variables
            $approved = $litigation->approved;

            //database update preparation
            if(Auth::user()->role == "USER")
                $approved = 0;
            
            //update content
            //append request data to global input variable
            $this->input = request()->all();
            $this->input['approved'] = $approved;
            $this->input['user_id'] =  Auth::id();

            //
            $litigation->title = $this->input['title'];
            $litigation->excerpt = $this->input['contents'];
            $litigation->approved = $this->input['approved'];
            $litigation->slug = str_slug($this->input['title']);
            $litigation->user_id = $this->input['user_id'];

            if( $litigation->save() ){

                if($request->hasFile('policy'))
                    $request->policy->move('uploads/legislation' , $featured_new_name); //move image to uploads folder

                $audit_litigation = AuditLegislation::create([
                    'action' =>  'edit',
                    'resource_name' => $this->input['title'],
                    'user_id' => $this->input['user_id']
                ]);

            }

            //create success message
            Session::flash('success' , 'litigation updated successfully');

            // redirect to home page
            return redirect()->route('legislation.index');  
            
        }
        else{
            //create success message
            Session::flash('success' , 'Silms like you trying to create a new legislation, use the create new legislation link');

            // redirect to home page
            return redirect()->route('legislation.index'); 
        }  
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //find resource to be deleted
        $legislation = Legislation::find($id); 

        //create new audit object
        $auditLitigation = new AuditLegislation;

        //delete news
        if($legislation->delete()){

            $auditLitigation->action = "delete";
            $auditLitigation->resource_name = $legislation->title;
            $auditLitigation->user_id = $legislation->user_id;

            if($auditLitigation->save()) //save to audit_news
            {
                //create success message
                Session::flash("success" , 'legislation deleted successfully');

                return redirect()->back();
            }    
        }

            //create error message
            Session::flash("notification" , 'deletion unsuccessful');

            return redirect()->back();
    }

}
