<?php
namespace App\Repositories\Repository;

use App\Models\Meet_room;
use App\Models\Participation_ticker;
use App\Repositories\BaseRepository;
use App\Repositories\Interface\TicketRepositoryInterface;

class TicketRepository extends BaseRepository implements TicketRepositoryInterface
{
    public function getModel()
    {
        return Participation_ticker::class;
    }
}
