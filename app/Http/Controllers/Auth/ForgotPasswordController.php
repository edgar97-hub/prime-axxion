<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request; 
use DB; 
use Carbon\Carbon; 
use App\Models\User; 
use Mail; 
use Hash;
use Illuminate\Support\Str;
use Redirect;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
    public function showForgetPasswordForm()
    {
         return view('auth.email.formtoFillEmail');
    }

  

      /**

       * Write code on Method

       *

       * @return response()

       */

      public function submitForgetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:users',
          ]);
          $token = Str::random(64);
          DB::table('password_resets')->insert([

              'email' => $request->email, 
              'token' => $token, 
              'created_at' => Carbon::now()

            ]);

          Mail::send('auth.email.forgetPassword', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Restablecer la contraseña');
          });
          return back()->with('message', 'Hemos enviado por correo electrónico su enlace de restablecimiento de contraseña!');
      }

      /**

       * Write code on Method

       *

       * @return response()

       */

      public function showResetPasswordForm($token) { 
         return view('auth.email.forgetPasswordLink', ['token' => $token]);
      }

  

      /**

       * Write code on Method

       *

       * @return response()

       */

      public function submitResetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:users',
              'password' => 'required|string|min:6|confirmed',
              'password_confirmation' => 'required'
          ]);
          $updatePassword = DB::table('password_resets')
                              ->where([
                                'email' => $request->email, 
                              'token' => $request->token
                              ])
                              ->first();

          //return redirect()->back()->with('success', 'your message,here');  
          if(!$updatePassword){
              return Redirect::back()->withErrors(['token_message' => 'token no valido!']); 
          }

          $user = User::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);
          DB::table('password_resets')->where(['email'=> $request->email])->delete();

          return redirect('/login')->with('success', 'Tu contraseña ha sido cambiada!');

      }
}
