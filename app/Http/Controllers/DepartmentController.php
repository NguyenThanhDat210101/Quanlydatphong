<?php

namespace App\Http\Controllers;

use App\Http\Requests\Department\InsertRequest;
use App\Models\Department;
use App\Repositories\Interface\DepartmentRepositoryInterface;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $departRepository;

    public function __construct(DepartmentRepositoryInterface $departReposi)
    {
        $this->departRepository = $departReposi;
    }

    public function index(Request $request)
    {
        $department = $this->departRepository->paginate(5);
        $message = $request->session()->get('message');
        return view('Department.department')
            ->with('department', $department)
            ->with('messagesuccess', $message);
    }

    public function search(Request $request)
    {
        $name = $request->input('searchname');
        if(empty($name)) {
            return redirect()->route('department.get');
        }

        $department = Department::where('name', "like", "%".$name."%")
                                ->paginate(5);
        return view('Department.department')
            ->with('department', $department);

    }

    public function inserts(InsertRequest $request)
    {
        $name = $request->input('nameDepartment');
        $this->departRepository->create(
            [
            'name'=>$name,
            'status'=>true
            ]
        );
        $request->session()->flash('message', 'Thêm Thành Công');
        return redirect()->route('department.get');
    }

    public function edits($id)
    {
        $getDepart =  $this->departRepository->find($id);
        $department = $this->departRepository->paginate(5);
        return view('Department.edit-department')
            ->with('getDepart', $getDepart)
            ->with('department', $department);;
    }

    public function updates(Request $request)
    {
        $name = $request->input('nameEditDepartment');
        $id = $request->input('idEditDepartment');
        $this->departRepository->find($id)->update(
            [
            'name'=>$name
            ]
        );
        $request->session()->flash('message', 'Cập Nhật Thành Công');
        return redirect()->route('department.get');
    }

    public function deletes(Request $request,$id)
    {
        $this->departRepository->find($id)->delete();
        $request->session()->flash('message', 'Xóa Thành Công');
        return redirect()->route('department.get');
    }
}
