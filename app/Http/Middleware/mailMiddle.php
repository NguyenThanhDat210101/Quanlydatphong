<?php

namespace App\Http\Middleware;

use App\Models\App_User;
use Closure;
use Illuminate\Http\Request;

class mailMiddle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $email = $request->input('emailForgot');
        $user = App_User::where('email',$email)->first();
        if(empty($user)){
            $request->session()->flash('error','Email này chưa đăng kí người dùng');
            return redirect()->route('forgot.get');
        }
        return $next($request);
    }
}
