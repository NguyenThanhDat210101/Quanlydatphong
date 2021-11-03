<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DepartmentMiddleware
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
        $name = $request->input('nameDepartment');
        if(empty($name) && strlen($name) <=6 ){
            return redirect()->route('department.get');
        }
        return $next($request);
    }
}
