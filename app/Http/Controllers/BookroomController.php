<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRoom\BookdateRequest;
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
    public function index(){
        $meet = Meet_room::all();
        $meetTable = Meet_room::paginate(6);

        return view('BookRoom.room')
                ->with('getMeet',$meet)
                ->with('getMeetTable',$meetTable);
    }

    public function ViewBook(Request $request,$id){
        $message = $request->session()->get('messError');
        $bookdate = Participation_ticker::where('meet_id',$id)
                                        ->paginate(5);

        return view('BookRoom.book')
                ->with('bookdate',$bookdate)
                ->with('meet_id',$id)
                ->with('message',$message);
    }

    public function viewManager(){
        $allBook = Participation_ticker::paginate(5);

        return view('BookRoom.manager-book-room')
                ->with('allBook',$allBook);
    }

    public function search(Request $request)
    {
        $name = $request->input('searchname');
        if(empty($name)){
            return redirect()->route('manager.book.room');
        }
        else{
            $allBook = Participation_ticker::join('meet_rooms','participation_tickers.meet_id','=','meet_rooms.id')
            ->where('meet_rooms.name',"like","%".$name."%")
            ->paginate(5);
        }

        return view('BookRoom.manager-book-room')
        ->with('allBook',$allBook);

    }

    public function bookRoom(BookRequest $request){
        $meet = $request->input('meetRoom');
        $array = explode('?',$meet);

        return redirect()->route('book.room.date',['id'=>$array[1]]);
    }

    public function book(BookdateRequest $request){
        $meet = $request->input('meetid');
        $date = new DateTime('Asia/Ho_Chi_Minh');
        $hourbook = $request->input('hourbook');
        $hourStart =  explode('?',$hourbook);
        $startHour = $hourStart[0];
        $endHour = $hourStart[1];
        $startbook = $request->input('datebook').' '. $startHour;
        $endbook = $request->input('datebook').' '. $endHour;

        Participation_ticker::create([
            'meet_id'=>$meet,
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
