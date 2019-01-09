<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    //
    /***
     * generates dashboard page
     */
    public function index(){
        
        //return dashboard for user
        if(Auth::user()->role == "USER")
            return view('admin.userdashboard');

        //return dashboard for admin
        if(Auth::user()->role == "ADMIN")
            return view('admin.admindashboard');

        //return dashboard for superadmin
        if(Auth::user()->role == "SUPERADMIN")
            return view('admin.superadmindashboard');

    }        

}
