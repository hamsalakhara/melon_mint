<?php

namespace App\Http\Controllers\creater;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Creater;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CreaterForgotPasswordController extends Controller
{
    public function showForgetPassword()
    {
       return view('creater.auth.createrforgotPassword');
    }
    

    public function submitForgetPassword(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:creater',
          ]);
  
          $token = Str::random(64);
          // Check if the email already exists in the password_reset_tokens table
        if (DB::table('password_reset_tokens')->where('email', $request->input('email'))->exists()) {
            // Email already exists, show custom error message
            return back()->with('error',  'A password reset request has already been sent for this email address.');
        }else{
          
              DB::table('password_reset_tokens')->insert([
                  'email' => $request->email, 
                  'token' => $token, 
                  'created_at' => Carbon::now()
                ]);
        }
          Mail::send('email.forgotPassword', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Reset Password');
          });
  
          return back()->with('message', 'We have e-mailed your password reset link!');
      }
      /**
       * Write code on Method
       *
       * @return response()
       */

       public function showResetPassword($token) { 
        return view('creater.auth.forgetPasswordLink', ['token' => $token]);
     }
     /**
      * Write code on Method
      *
      * @return response()
      */

      public function submitResetPassword(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:creater',
              'password' => 'required|string|min:6|confirmed',
              'password_confirmation' => 'required'
          ]);
  
          $updatePassword = DB::table('password_reset_tokens')
                              ->where([
                                'email' => $request->email, 
                                'token' => $request->token
                              ])
                              ->first();
  
          if(!$updatePassword){
              return back()->withInput()->with('error', 'Invalid token!');
          }
          $user = Creater::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);
 
          DB::table('password_reset_tokens')->where(['email'=> $request->email])->delete();
  
          return redirect('/createrLogin')->with('message', 'Your password has been changed!');
      }

}
