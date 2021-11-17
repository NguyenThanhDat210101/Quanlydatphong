<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login\SigninRequest;
use App\Models\App_User;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Register\SignupRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login(Request $request)
    {
        $errorMess =  $request->session()->get('errorMessage');
        return view('Auth.login')
           ->with('errormessage', $errorMess);
    }

    function register(Request $request)
    {
        $departments = Department::all();
        $errorMess =  $request->session()->get('errorMessage');
        return view('Auth.register')
            ->with('photos', 'Noimage.png')
            ->with('departmentGetAll', $departments)
            ->with('errormess', $errorMess);
    }

    function forgot()
    {
        return view('Auth.forgot');
    }

    function test()
    {
        return view('tesst');
    }

    function signup(SignupRequest $request)
    {
        $email = $request->input('emailRegister');
        $name = $request->input('nameRegister');
        $phone = $request->input('phoneRegister');
        $cmnd = $request->input('cmndRegister');
        $config = $request->input('configPasswordRegister');
        $department = $request->input('departmentRegister');
        $image = 'Noimage.png';
        if($request->hasFile('photoRegister')) {
            $request->file('photoRegister')->move(
                'images',
                $image = $request->photoRegister->getClientOriginalName()
            );
        }
        App_User::create(
            [
            'email'=>$email,
            'name'=>$name,
            'phone'=>$phone,
            'cmnd'=>$cmnd,
            'password'=>Hash::make($config),
            'image'=>$image,
            'department_Id'=>$department
            ]
        );
        return redirect()->route('login.get');
    }

    function signin(SigninRequest $request)
    {
        $email = $request->input('emailLogin');
        $password = $request->input('passwordLogin');

        if(Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('manager.book.room');
        }

        return redirect()->route('login.get')
            ->with('errormess', $request->session()->flash('errorMessage', 'Sai thông tin đăng nhập'));

    }

    function logOut()
    {
        Auth::logout();
        return redirect()->route('login.get');
    }
}
