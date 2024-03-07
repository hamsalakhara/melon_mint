<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\models\Admin;

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
        if (Auth::guard('admin')->attempt($credentials)) {
            // Authentication passed
            //dd('helo');
            return redirect()->route('admindashboard');
        }
        // Authentication failed
        return redirect()->back()->withInput($request->only('email'));
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('showLoginForm');
      
    }
   /* public function redirectToGmail()
    {
       //dd('hello');
        return Socialite::driver('google')->stateless()->redirect();
    }*/
   /* public function handleGmailCallback()
    {
        /*$user = Socialite::driver('google')->stateless()->user();
        dd($user);
        try {
        
            $user = Socialite::driver('google')->stateless()->user();
            $finduser = Admin::where('google_id', $user->id)->first();
           
            if($finduser){
                Auth::guard('admin')->login($finduser);
                return redirect()->intended('dashboard');
            }else{
                $newUser = Admin::updateOrCreate(['email' => $user->email],[
                        'name' => $user->name,
                        'google_id'=> $user->id,
                        'password' => encrypt('123456')
                    ]);
                Auth::guard('admin')->login($newUser);
                return redirect()->intended('dashboard');
            }
        
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }*/
}
