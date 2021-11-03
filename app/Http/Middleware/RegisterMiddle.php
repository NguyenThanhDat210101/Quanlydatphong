<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RegisterMiddle
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
        $pass = $request->input('passwordRegister');
        $config = $request->input('configPasswordRegister');
        if($pass == $config){
            return $next($request);
        }
        else{
            $errorMess =  $request->session()->flash('errorMessage','Mật Khẩu và xác nhận mật khẩu không giống nhau');
            return redirect()->route('register.get')
                             ->with('errormess',$errorMess);
        }
    }
}
