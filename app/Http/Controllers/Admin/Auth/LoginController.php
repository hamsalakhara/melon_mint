<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm(){

        return view('admin.auth.login');
    }
    public function login(Request $request)
    {
         $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
       // if (Auth::guard('admin')->attempt($credentials)) {
        if (Auth::attempt($credentials)) {
            dd('hello');
            // Authentication passed
            return redirect()->intended('dashboard');
        }

        // Authentication failed
        return redirect()->back()->withInput($request->only('email'));
    }
}
