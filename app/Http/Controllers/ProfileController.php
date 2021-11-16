<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\ChangeRequest;
use App\Http\Requests\Profile\ProfileRequest;
use App\Models\App_User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function isProfile(Request $request)
    {
        $user = Auth::user();
        $messError = $request->session()->get('messError');
        $messSuccess = $request->session()->get('messSuccess');
        $messupdate = $request->session()->get('messUpdate');
        return view('User.profile')
                ->with('user',$user)
                ->with('messageError',$messError)
                ->with('messageSuccess',$messSuccess)
                ->with('messageSuccessProfile',$messupdate);
    }

    public function updateProfile(ProfileRequest $request)
    {
        $name = $request->input('nameProfile');
        $phone = $request->input('phoneProfile');
        if($request->hasFile('imageProfile')){
            $request->file('imageProfile')->move(
                'images',
                $image = $request->imageProfile->getClientOriginalName()
            );
        }else{
            $image = Auth::user()->image;
        }
        App_User::find(Auth::id())
                    ->update([
                        'phone'=>$phone,
                        'name'=>$name,
                        'image'=>$image
                    ]);
        $request->session()->flash('messUpdate','Cập Nhật Thành Công');
        return redirect()->route('profile.get');
    }

    public function changePassword(ChangeRequest $request)
    {
        $pass = $request->input('configpassword');
        App_User::find(Auth::id())->update([
            'password'=>Hash::make($pass)
        ]);
        $request->session()->flash('messSuccess','Đổi Mật Khẩu Thành Công');
        return redirect()->route('profile.get');
    }
}
