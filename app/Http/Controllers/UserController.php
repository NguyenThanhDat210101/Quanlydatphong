<?php

namespace App\Http\Controllers;

use App\Models\App_User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user = App_User::join('departments','department_Id','=','departments.id')
                ->select('app__users.*','departments.name as nameDepartment')
                ->paginate(5);
        return view('User.user')
                ->with('getAllUser',$user);
    }


}
