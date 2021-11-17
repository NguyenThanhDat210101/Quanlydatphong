<?php
namespace App\Repositories\Repository;

use App\Models\Department;
use App\Repositories\BaseRepository;
use App\Repositories\Interface\DepartmentRepositoryInterface;

class DepartmentRepository extends BaseRepository implements DepartmentRepositoryInterface
{
    public function getModel()
    {
        return Department::class;
    }

}
