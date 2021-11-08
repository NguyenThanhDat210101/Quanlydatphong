<?php

namespace App\Http\Controllers;

use App\Http\Requests\Meet\InsertMeetRequest;
use App\Models\Meet_room;
use Illuminate\Http\Request;

class MeetRoomController extends Controller
{
    public function index(Request $request)
    {
        $meet = Meet_room::paginate(5);
        $message = $request->session()->get('message');
        return view('MeetRoom.meet_room')
                ->with('getAllMeet',$meet)
                ->with('messagesuccess',$message);
    }

    public function search(Request $request)
    {
        $name = $request->input('searchname');
        if(empty($name)){
            return redirect()->route('meetroom.get');
        }
        else{
            $meet = Meet_room::where('name',"like","%".$name."%")
            ->paginate(5);
        }

        return view('MeetRoom.meet_room')
            ->with('getAllMeet',$meet);
    }

     public function inserts(InsertMeetRequest $request)
     {
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
         $request->session()->flash('message','Thêm Thành Công');
         return redirect()->route('meetroom.get');
     }

     public function deletes($id)
     {
        Meet_room::find($id)->delete();
        return redirect()->route('meetroom.get');
    }

    public function edits($id){
        $meet = Meet_room::paginate(5);
        $getMeet =  Meet_room::find($id);
        return view('MeetRoom.edit_meet_room')
                ->with('getAllMeet',$meet)
                ->with('getOneMeet',$getMeet);
    }

    public function updates(InsertMeetRequest $request)
    {
        $name = $request->input('meetName');
        $id = $request->input('meetId');
        $address = $request->input('meetAddress');
        $seats = $request->input('meetSeats');
        $meetRoom = Meet_room::find($id);
        if($request->hasFile('image_meet_room')){
           $request->file('image_meet_room')->move(
               'images',
               $images = $request->image_meet_room->getClientOriginalName()
           );
        }
        else{
           $images = $meetRoom->image;
        }
        $meetRoom->update([
            'name'=>$name,
            'address'=>$address,
            'status'=>true,
            'seats'=>$seats,
            'image'=>$images
        ]);
        $request->session()->flash('message','Cập Nhật Thành Công');
        return redirect()->route('meetroom.get');
    }

}
