<?php

namespace App\Http\Controllers;

use App\Models\App_User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $app_user;

    public function __construct(App_User $app_user)
    {
        $this->app_user = $app_user;
    }


    public function index()
    {
        $user = $this->app_user->paginate(5);
        return view('User.user')
                ->with('getAllUser', $user);
    }

    public function search(Request $request)
    {
        $name = $request->input('searchname');
        if(empty($name)) {
            return redirect()->route('user.get');
        }
        $user = $this->app_user->where('app__users.name', "like", "%".$name."%")
            ->paginate(5);

        return view('User.user')
                ->with('getAllUser', $user);
    }
}
