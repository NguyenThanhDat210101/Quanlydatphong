<?php

namespace App\Http\Controllers;

use App\Http\Requests\Department\InsertRequest;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $department = Department::paginate(5);
        $message = $request->session()->get('message');
        return view('Department.department')
                ->with('department',$department)
                ->with('messagesuccess',$message);
    }

    public function search(Request $request)
    {
        $name = $request->input('searchname');
        if(empty($name)){
            return redirect()->route('department.get');
        }
        else{
            $department = Department::where('name',"like","%".$name."%")
            ->paginate(5);
        }

        return view('Department.department')
            ->with('department',$department);

    }

    public function inserts(InsertRequest $request)
    {
        $name = $request->input('nameDepartment');
        Department::create([
            'name'=>$name,
            'status'=>true
        ]);
        $request->session()->flash('message','Thêm Thành Công');
        return redirect()->route('department.get');
    }

    public function edits($id)
    {
        $getDepart =  Department::find($id);
        $department = Department::paginate(5);
        return view('Department.edit-department')
                    ->with('getDepart',$getDepart)
                    ->with('department',$department);;
    }

    public function updates(Request $request)
    {
        $name = $request->input('nameEditDepartment');
        $id = $request->input('idEditDepartment');
        Department::find($id)->update([
            'name'=>$name
        ]);
        $request->session()->flash('message','Cập Nhật Thành Công');
        return redirect()->route('department.get');
    }

    public function deletes(Request $request,$id)
    {
        Department::find($id)->delete();
        $request->session()->flash('message','Xóa Thành Công');
        return redirect()->route('department.get');
    }
}
