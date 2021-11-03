<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRoom\BookRequest;
use App\Models\App_User;
use App\Models\Meet_room;
use Illuminate\Http\Request;

class BookroomController extends Controller
{
    public function index(){
        $meet = Meet_room::all();
        $user = App_User::all();
        return view('BookRoom.book')
                ->with('getMeet',$meet)
                ->with('getUser',$user);
    }

    public function bookRoom(Request $request){
        

    }
}
