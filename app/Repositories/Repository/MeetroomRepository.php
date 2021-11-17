<?php
namespace App\Repositories\Repository;

use App\Models\Meet_room;
use App\Repositories\BaseRepository;
use App\Repositories\Interface\MeetroomRepositoryInterface;

class MeetroomRepository extends BaseRepository implements MeetroomRepositoryInterface
{
    public function getModel()
    {
        return Meet_room::class;

    }

}
