<?php

namespace App\Http\Controllers;

use App\Models\App_User;
use App\Repositories\Interface\TicketRepositoryInterface;

class JoinUserController extends Controller
{
    protected $ticketRepository;

    public function __construct(TicketRepositoryInterface $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }

    public function viewJoin($id)
    {
        $ticket = $this->ticketRepository->find($id);
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
            ->where('participation_tickers.id', $id)
            ->select('app__users.id')
            ->get();
        $user = App_User::whereNotIn('id', $allUser)
                        ->get();
        return view('BookRoom.join-user')
            ->with('ticket', $ticket)
            ->with('getUser', $user);
    }
}
