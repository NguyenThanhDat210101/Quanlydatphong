<?php

namespace App\Http\Controllers;

use App\Http\Requests\Meet\InsertMeetRequest;
use App\Http\Requests\Meet\UpdateMeetRequest;
use App\Models\Meet_room;
use App\Repositories\Interface\MeetroomRepositoryInterface;
use Illuminate\Http\Request;

class MeetRoomController extends Controller
{
    protected $meetRepository;

    public function __construct(MeetroomRepositoryInterface $meetRepo)
    {
        $this->meetRepository = $meetRepo;
    }
    public function index(Request $request)
    {
        $meet = $this->meetRepository->paginate(5);
        $message = $request->session()->get('message');
        return view('MeetRoom.meet_room')
            ->with('getAllMeet', $meet)
            ->with('messagesuccess', $message);
    }

    public function search(Request $request)
    {
        $name = $request->input('searchname');
        if(empty($name)) {
            return redirect()->route('meetroom.get');
        }

        $meet = Meet_room::where('name', "like", "%".$name."%")
                        ->paginate(5);
        return view('MeetRoom.meet_room')
            ->with('getAllMeet', $meet);
    }

    public function inserts(InsertMeetRequest $request)
    {
        $name = $request->input('meetName');
        $address = $request->input('meetAddress');
        $seats = $request->input('meetSeats');
        $images = 'Noimage.png';

        if($request->hasFile('image_meet_room')) {
            $request->file('image_meet_room')->move(
                'images',
                $images = $request->image_meet_room->getClientOriginalName()
            );
        }

        $this->meetRepository->create(
            [
            'name'=>$name,
            'address'=>$address,
            'status'=>true,
            'seats'=>$seats,
            'image'=>$images
             ]
        );
        $request->session()->flash('message', 'Thêm Thành Công');
        return redirect()->route('meetroom.get');
    }

    public function deletes($id)
    {
        $this->meetRepository->find($id)->delete();
        return redirect()->route('meetroom.get');
    }

    public function edits($id)
    {
        $meet = $this->meetRepository->paginate(5);
        $getMeet =  $this->meetRepository->find($id);
        return view('MeetRoom.edit_meet_room')
            ->with('getAllMeet', $meet)
            ->with('getOneMeet', $getMeet);
    }

    public function updates(UpdateMeetRequest $request)
    {
        $name = $request->input('meetName');
        $id = $request->input('meetId');
        $address = $request->input('meetAddress');
        $seats = $request->input('meetSeats');
        $meetRoom = $this->meetRepository->find($id);
        $images = $meetRoom->image;
        if($request->hasFile('image_meet_room')) {
            $request->file('image_meet_room')->move(
                'images',
                $images = $request->image_meet_room->getClientOriginalName()
            );
        }

        $meetRoom->update(
            [
            'name'=>$name,
            'address'=>$address,
            'status'=>true,
            'seats'=>$seats,
            'image'=>$images
            ]
        );
        $request->session()->flash('message', 'Cập Nhật Thành Công');
        return redirect()->route('meetroom.get');
    }

}
