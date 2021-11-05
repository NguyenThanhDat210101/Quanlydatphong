<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRoom\BookRequest;
use App\Models\App_User;
use App\Models\Meet_room;
use App\Models\Participation_ticker;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class BookroomController extends Controller
{
    public function index(Request $request){
        $meet = Meet_room::all();
        $message = $request->session()->get('messError');
        return view('BookRoom.book')
                ->with('getMeet',$meet)
                ->with('message',$message);

    }

    public function viewManager(){
        $allBook = Participation_ticker::join('meet_rooms','participation_tickers.meet_id','=','meet_rooms.id')
        ->select('participation_tickers.*','meet_rooms.name as nameroom','meet_rooms.image as imageroom')
        ->paginate(5);

        return view('BookRoom.manager-book-room')
                ->with('allBook',$allBook);
    }

    public function bookRoom(BookRequest $request){
        $meet = $request->input('meetRoom');
        $array = explode('?',$meet);
        $date = new DateTime('Asia/Ho_Chi_Minh');
        $hourbook = $request->input('hourbook');
        $hourStart =  explode('?',$hourbook);
        $startHour = $hourStart[0];
        $endHour = $hourStart[1];
        $startbook = $request->input('datebook').' '. $startHour;
        $endbook = $request->input('datebook').' '. $endHour;

        Participation_ticker::create([
            'meet_id'=>$array[1],
            'book_date'=>$date->format('Y-m-d H:i'),
            'start_date'=>$startbook,
            'end_date'=>$endbook,
            'status'=>true
        ]);
        return redirect()->route('manager.book.room');
    }

    public function deletes($id){
        Participation_ticker::find($id)->delete();
        return redirect()->route('manager.book.room');
    }
}
