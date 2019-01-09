<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Notification;
use App\User;
use Auth;
use Session;
use Validator;
use Response;
use View;


class NotificationController extends Controller
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
            return view('banner.managenotification')->with('notifications' , User::find(Auth::id())->notifications);
      
        //view for admin and superadmin  
        return view('banner.managenotification')->with('notifications' , Notification::all()); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('banner.create');
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
            'line_one' => 'required|string',
            'line_two' => 'required|string',
            'message' => 'required|string'
        ]);

        if($validator->fails()) 
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));

                //check for duplicate
                $duplicate = Notification::where('title' , $request->title)
                                            ->where('line_one' , $request->line_one)
                                            ->where('line_two' , $request->line_two)
                                            ->count();

                if(!$duplicate){

                    //declare approval status of request and request variables
                    $approved = 1;
        
                    //database update preparation
                    if(Auth::user()->role == "USER")
                         $approved = 0;  
                
                    //append request data to global input variable
                    $this->input = request()->all();
                    $this->input['approved'] = $approved;
                    $this->input['user_id'] =  Auth::id();
        
                    //upload data using tranactions to enable rollbacks and committs
                    DB::transaction(function(){
        
                        $notification = Notification::create([
                            'title' => $this->input['title'],
                            'line_one' => $this->input['line_one'],
                            'line_two' => $this->input['line_two'],
                            'message' => $this->input['message'],
                            'approved' => $this->input['approved'],
                            'user_id' => $this->input['user_id'],
                        ]);
        
                    });
                    
                    return Response::json(array('success' => 'Notification created successfully.'));
                }
                else
                    return Response::json(array('alert' => 'Notification already exists'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
    }
}
