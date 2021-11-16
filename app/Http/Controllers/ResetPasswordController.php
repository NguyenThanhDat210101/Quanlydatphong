<?php

namespace App\Http\Controllers;

use App\Http\Requests\Forgot\ResetpasswordRequest;
use App\Models\App_User;
use App\Models\password_reset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function sendMail(Request $request){
        $email = $request->input('emailForgot');
        $user = App_User::where('email', $email)->first();
        $token = Str::random(64);

        $emailPassReset = password_reset::where(['email'=>$email])
                                        ->first();
        if(!empty($emailPassReset)){
            $emailPassReset->update([
                'email' => $user->email,
                'token' => $token
            ]);
        }
        else{
            password_reset::create([
                'email' => $user->email,
                'token' => $token
            ]);
        }

        Mail::send('Auth.Forgot.message', ['token' => $token], function($message) use($request){
            $message->to($request->input('emailForgot'));
            $message->subject('Reset Password');
        });

        $request->session()->flash('message','Hãy vào email của bạn để xác nhận Reset Mật Khẩu');
        return redirect()->route('forgot.get');
    }

    public function forgot(Request $request){
        $message = $request->session()->get('message');
        $error = $request->session()->get('error');
        return view('Auth.Forgot.forgot')
                ->with('message',$message)
                ->with('error',$error);
    }

    public function showResetPasswordForm($token,Request $request) {
        $email = password_reset::where('token',$token)->first()->email;
        if(empty($email)){
            return 'null';
        }
        $error = $request->session()->get('error');
        return view('Auth.Forgot.resset_password')
                ->with('token', $token)
                ->with('email',$email)
                ->with('error',$error);
     }

     public function resetPassword(ResetpasswordRequest $request){
        $email = $request->input('emailResetPassword');
        $pass = $request->input('configpassword');
        App_User::where('email',$email)->update([
                'password'=>Hash::make($pass)
        ]);

        $emailPassReset = password_reset::where(['email'=>$email])
        ->first();
        $token = Str::random(64);
        $emailPassReset->update([
            'email' => $email,
            'token' => $token
        ]);
        $request->session()->flash('message','Đổi mật khẩu thành công <br>
                                    Đăng nhập nào');
        return redirect()->route('login.get');
     }
}
