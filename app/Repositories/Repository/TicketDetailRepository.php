<?php
namespace App\Repositories\Repository;

use App\Models\App_User;
use App\Models\Participation_Ticket_Detail;
use App\Repositories\BaseRepository;
use App\Repositories\Interface\TicketDetailRepositoryInterface;
use Illuminate\Support\Facades\Mail;

class TicketDetailRepository extends BaseRepository implements TicketDetailRepositoryInterface
{
    public function getModel()
    {
        return Participation_Ticket_Detail::class;
    }

}
