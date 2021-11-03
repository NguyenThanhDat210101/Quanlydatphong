<?php

namespace App\Http\Controllers;

use App\Http\Requests\Meet\InsertMeetRequest;
use App\Models\Meet_room;
use Illuminate\Http\Request;

class MeetRoomController extends Controller
{
    public function index(){
        $meet = Meet_room::paginate(5);
        return view('MeetRoom.meet_room')
                ->with('getAllMeet',$meet);
    }

     public function inserts(InsertMeetRequest $request){
         $name = $request->input('meetName');
         $address = $request->input('meetAddress');
         $seats = $request->input('meetSeats');

        if($request->hasFile('image_meet_room')){
            $request->file('image_meet_room')->move(
                'images',
                $images = $request->image_meet_room->getClientOriginalName()
            );
        }
        else{
            $images = 'Noimage.png';
        }

         Meet_room::create([
            'name'=>$name,
            'address'=>$address,
            'status'=>true,
            'seats'=>$seats,
            'image'=>$images
         ]);

         return redirect()->route('meetroom.get');
     }
     public function deletes($id){
        Meet_room::find($id)->delete();
        return redirect()->route('meetroom.get');
    }
}
