<?php 
  
namespace App\Http\Controllers\Admin\Auth; 
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use DB; 
use Carbon\Carbon; 
use App\Models\Admin; 
use Mail; 
use Hash;
use Illuminate\Support\Str;
  
class ForgotPasswordController extends Controller
{
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showForgetPassword()
      {
         return view('admin.auth.forgotPassword');
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitForgetPassword(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:admin',
          ]);
  
          $token = Str::random(64);
  
          DB::table('password_reset_tokens')->insert([
              'email' => $request->email, 
              'token' => $token, 
              'created_at' => Carbon::now()
            ]);
  
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
         return view('admin.auth.forgetPasswordLink', ['token' => $token]);
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitResetPassword(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:admin',
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
  
          $user = Admin::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);
 
          DB::table('password_reset_tokens')->where(['email'=> $request->email])->delete();
  
          return redirect('/showLoginForm')->with('message', 'Your password has been changed!');
      }
}
 