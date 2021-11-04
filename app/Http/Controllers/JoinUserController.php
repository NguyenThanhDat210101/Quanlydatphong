<?php

namespace App\Http\Controllers;

use App\Models\App_User;
use App\Models\Meet_room;
use App\Models\Participation_ticker;
use App\Models\Participation_Ticket_Detail;
use Illuminate\Http\Request;

class JoinUserController extends Controller
{
    public function viewJoin($id){
        $ticket =  Participation_ticker::join('meet_rooms','participation_tickers.meet_id','=','meet_rooms.id')
        ->select('participation_tickers.*','meet_rooms.name as nameroom','meet_rooms.image as imageroom')
        ->find($id);
        // $meet = Meet_room::find($ticket->meet_id);
        $user = App_User::all();
        return view('BookRoom.join-user')
                ->with('ticket',$ticket)
                ->with('getUser',$user);
    }
    public function joinUser(Request $request){
        $user = $request->input('usersBook');
           for ($i = 0; $i < count($user); $i++) {
            Participation_Ticket_Detail::create([
                'user_id'=>$request->input('usersBook')[$i],
                'ticketid'=>$request->input('idTicket')
            ]);
        }
        return redirect()->route('manager.book.room');
    }

    public function viewNumberJoin ($id){
        $ticket_detail = Participation_Ticket_Detail::join('app__users','user_id','=','app__users.id')
                        ->join('departments','department_Id','=','departments.id')
                        ->where('ticketid',$id)
                        ->select('participation__ticket__details.id as idticketdetail','app__users.*','departments.name as departmentname')
                        ->paginate(3);
        // return view('BookRoom.number-join')
        //         ->with('getJoin',$ticket_detail);
        return view('BookRoom.number-join')
                ->with('ticketDetail',$ticket_detail);
    }

    public function deleteUserJoin($id){
        Participation_Ticket_Detail::find($id)->delete();
        return redirect()->back();
    }
}
