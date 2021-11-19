<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class adminMiddle
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
            $user = Auth::user();
        if($user->email == 'admin' && Hash::check('admin', $user->password)) {
            return $next($request);
        }else{
            return redirect()->route('error.get');
        }
    }
}
