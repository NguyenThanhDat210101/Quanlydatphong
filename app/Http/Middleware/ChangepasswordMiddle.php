<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangepasswordMiddle
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
        $currentpass = $request->input('currentpassword');
        $newpass = $request->input('newpassword');
        $configpass = $request->input('configpassword');
        $user = Auth::user();
        if(Hash::check($currentpass, $user->password)) {
            if($newpass == $configpass) {
                return $next($request);
            }

            $request->session()->flash('messError', 'Xác nhận mật khẩu thất bại');
            return redirect()->route('profile.get');

        }

        $request->session()->flash('messError', 'Mật khẩu hiện tại của bạn không đúng');
        return redirect()->route('profile.get');


    }
}
