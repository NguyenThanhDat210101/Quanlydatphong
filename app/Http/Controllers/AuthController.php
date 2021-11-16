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
    public function login(Request $request){
        $errorMess =  $request->session()->get('errorMessage');
        $email =  $request->session()->get('emailMess');
        return view('Auth.login')
                ->with('errormessage',$errorMess)
                ->with('email',$email);
    }

    public function register(Request $request){
        $departments = Department::all();
        $errorMess =  $request->session()->get('errorMessage');
        return view('Auth.register')
                ->with('photos','Noimage.png')
                ->with('departmentGetAll',$departments)
                ->with('errormess',$errorMess);
    }

    public function forgot(){
        return view('Auth.forgot');
    }

    public function test(){
        return view('tesst');
    }

    public function signup(SignupRequest $request){

        $email = $request->input('emailRegister');
        $name = $request->input('nameRegister');
        $phone = $request->input('phoneRegister');
        $cmnd = $request->input('cmndRegister');
        $config = $request->input('configPasswordRegister');
        $department = $request->input('departmentRegister');
        if($request->hasFile('photoRegister')){
            $request->file('photoRegister')->move(
                'images',
                $image = $request->photoRegister->getClientOriginalName()
            );
        }
        else{
           $image = 'Noimage.png';
        }
        App_User::create([

            'email'=>$email,
            'name'=>$name,
            'phone'=>$phone,
            'cmnd'=>$cmnd,
            'password'=>Hash::make($config),
            'image'=>$image,
            'department_Id'=>$department
        ]);
        return redirect()->route('login.get');
    }

    public function signin(SigninRequest $request){
        $email = $request->input('emailLogin');
        $password = $request->input('passwordLogin');

        if(Auth::attempt(['email' => $email, 'password' => $password])){
            return redirect()->route('manager.book.room');
        }
        else{
            $emailmess = $request->session()->flash('emailMess',$email);
            $errorMess = $request->session()->flash('errorMessage','Sai thông tin đăng nhập');
            return redirect()->route('login.get')
                            ->with('errormess',$errorMess)
                            ->with('email',$emailmess);
        }
    }

    public function logOut(){
        Auth::logout();
        return redirect()->route('login.get');
    }
}
