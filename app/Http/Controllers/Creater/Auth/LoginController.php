<?php

namespace App\Http\Controllers\Creater\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function createrLoginForm(){

        return view('creater.auth.createrlogin');
    }
        
    public function checkcreaterlogin(Request $request)
    {
       
              $request->validate([
            'email' => 'required|email',
            'password' => 'required',
              ]);
        $credentials = $request->only('email','password');
        if (Auth::guard('creater')->attempt($credentials)) {
            // Authentication passed
            return redirect()->intended('creater.dashboard.dashboard');
        }
        // // Authentication failed
        return redirect()->back()->withInput($request->only('email'));
        


    }



}
