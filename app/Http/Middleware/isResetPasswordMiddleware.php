<?php

namespace App\Http\Middleware;

use App\Models\password_reset;
use Closure;
use Illuminate\Http\Request;

class isResetPasswordMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $newpass = $request->input('newpassword');
        $config = $request->input('configpassword');
        if($newpass == $config) {
            return $next($request);
        }

        $email = $request->input('emailResetPassword');
        $emailPassReset = password_reset::where(['email'=>$email])->first();
        $request->session()->flash('error', 'Mật Khẩu và xác nhận không khớp với nhau');
        return redirect()->route('reset.password.get', ['token'=>$emailPassReset->token]);

    }
}
