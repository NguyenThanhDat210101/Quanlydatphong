<?php

namespace App\Http\Controllers;

use App\Models\App_User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user = App_User::paginate(5);
        return view('User.user')
                ->with('getAllUser',$user);
    }

}
