<?php

namespace App\Http\Controllers;

use App\Models\App_User;
use App\Models\Participation_Ticket_Detail;
use App\Repositories\Interface\TicketDetailRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class numberJoinController extends Controller
{
    protected $ticketDetailRepository;
    protected $app_User;

    public function __construct(TicketDetailRepositoryInterface $ticketDetailRepository,App_User $app_User)
    {
        $this->ticketDetailRepository = $ticketDetailRepository;
        $this->app_User = $app_User;
    }
    public function joinUser(Request $request)
    {
        $user = $request->input('usersBook');
        for ($i = 0; $i < count($user); $i++) {
            $getUsers = explode('?', $user[$i]);
            $this->ticketDetailRepository->create(
                [
                'user_id'=>$getUsers[0],
                'ticketid'=>$request->input('idTicket')
                    ]
            );
            $getUser = $this->app_User->find($getUsers[0]);
            Mail::send(
                'BookRoom.message', ['name'=>$getUser->name], function ($message) use ($getUsers) {
                        $message->to($getUsers[1]);
                        $message->subject('Thông báo họp');
                }
            );

        }
        return redirect()->route('manager.book.room');
    }
    public function viewNumberJoin($id)
    {
        $ticket_detail = Participation_Ticket_Detail::where('ticketid', $id)
                        ->paginate(3);
        return view('BookRoom.number-join')
                ->with('ticketDetail', $ticket_detail);
    }

    public function deleteUserJoin($id)
    {
        $this->ticketDetailRepository->find($id)->delete();
        return redirect()->back();
    }
}
