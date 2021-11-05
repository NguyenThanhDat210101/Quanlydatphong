<?php

namespace App\Http\Controllers;

use App\Models\App_User;
use App\Models\Meet_room;
use App\Models\Participation_ticker;
use App\Models\Participation_Ticket_Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class JoinUserController extends Controller
{
    public function viewJoin($id)
    {
        $ticket = Participation_ticker::join(
                                            'meet_rooms',
                                            'participation_tickers.meet_id',
                                            '=',
                                            'meet_rooms.id'
                                        )
                                        ->select(
                                            'participation_tickers.*',
                                            'meet_rooms.name as nameroom',
                                            'meet_rooms.image as imageroom'
                                        )
                                        ->find($id);
        // $meet = Meet_room::find($ticket->meet_id);
        $allUser = App_User::join(
                                'participation__ticket__details',
                                'app__users.id',
                                '=',
                                'participation__ticket__details.user_id'
                            )
                            ->join(
                                'participation_tickers',
                                'participation_tickers.id',
                                '=',
                                'participation__ticket__details.ticketid'
                            )
                            ->where('participation_tickers.id',$id)
                            ->select('app__users.id')
                            ->get();
        $user = App_User::whereNotIn('id',$allUser)
                        ->get();
        return view('BookRoom.join-user')
                ->with('ticket',$ticket)
                ->with('getUser',$user);
    }

    public function joinUser(Request $request)
    {
        $user = $request->input('usersBook');
            for ($i = 0; $i < count($user); $i++) {
                $getUsers = explode('?',$user[$i]);
                Participation_Ticket_Detail::create([
                    'user_id'=>$getUsers[0],
                    'ticketid'=>$request->input('idTicket')
                ]);
                $getUser = App_User::find($getUsers[0]);
                Mail::send('BookRoom.message', ['name'=>$getUser->name], function ($message) use($getUsers) {
                    $message->to($getUsers[1]);
                    $message->subject('Thông báo họp');
                });

            }
        return redirect()->route('manager.book.room');
    }

    public function viewNumberJoin ($id)
    {
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

    public function deleteUserJoin($id)
    {
        Participation_Ticket_Detail::find($id)->delete();
        return redirect()->back();
    }
}
