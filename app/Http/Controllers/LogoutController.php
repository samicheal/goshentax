<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LogoutController extends Controller
{
    /**
     * logout of admin section
     */
    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('admin.login.index');
    }
}
