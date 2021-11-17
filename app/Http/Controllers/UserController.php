<?php

namespace App\Http\Controllers;

use App\Models\App_User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = App_User::paginate(5);
        return view('User.user')
                ->with('getAllUser', $user);
    }

    public function search(Request $request)
    {
        $name = $request->input('searchname');
        if(empty($name)) {
            return redirect()->route('user.get');
        }
        $user = App_User::where('app__users.name', "like", "%".$name."%")
                        ->paginate(5);

        return view('User.user')
                ->with('getAllUser', $user);
    }
}
