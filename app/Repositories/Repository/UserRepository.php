<?php
namespace App\Repositories\Repository;

use App\Models\App_User;
use App\Repositories\BaseRepository;
use App\Repositories\Interface\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return App_User::class;
    }

}
