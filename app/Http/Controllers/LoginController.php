<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /***
     * generates signin page
     */
    public function index(){
        return view('admin.signin' , ['status' => 0]);
    }

    /***
     * generates signin page
     */
    public function login(Request $request){
        
        //validate login details
        $validated = $request->validate([
            'username' => 'bail|required|email',
            'password' => 'bail|required',
        ]); 

        //extract login details
        //dd(Auth::attempt(['email' => $request->username , 'password' => $request->password]));

        //check for user details in datastore
        if(Auth::attempt(['email' => $request->username , 'password' => $request->password])) {
            // Authentication passed...
            return redirect()->route('dashboard');
        }

        return view('admin.signin' , ['status' => 1]);
    }

}
