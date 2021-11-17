<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isLoginMiddleware
{

    // protected $auths;

    // public function __construct(Auth $auths)
    // {
    //     $this->auths = $auths;
    // }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()) {
            return $next($request);
        }

        return redirect()->route('login.get');

    }
}
