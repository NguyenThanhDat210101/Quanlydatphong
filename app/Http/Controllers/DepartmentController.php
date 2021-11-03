<?php

namespace App\Http\Controllers;

use App\Http\Requests\Department\InsertRequest;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){
        $department = Department::paginate(5);
        return view('Department.department')
                ->with('department',$department);
    }

    public function inserts(InsertRequest $request){
        $name = $request->input('nameDepartment');
        Department::create([
            'name'=>$name,
            'status'=>true
        ]);
        return redirect()->route('department.get');
    }

    public function edits($id){
        $department =  Department::find($id);
        return view('Department.edit-department')
                    ->with('getDepart',$department);
    }

    public function deletes($id){
        Department::find($id)->delete();
        return redirect()->route('department.get');
    }
}
