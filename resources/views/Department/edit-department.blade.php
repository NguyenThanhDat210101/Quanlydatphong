@extends('Department.index')
@section('department')
<div class="col-lg-6">
    <!-- Circle Buttons -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit New Department</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('department.update') }}" method="post">
             {{csrf_field()}}
             <div class="form-group">
                 <input type="hidden"
                   class="form-control" name="idEditDepartment" id="" value="{{!empty($getDepart)? $getDepart->id : ''}}" aria-describedby="helpId" placeholder="">
                 <label for="">Name</label>
                 <input type="text"
                   class="form-control" name="nameEditDepartment" id="" value="{{!empty($getDepart)? $getDepart->name : ''}}"  aria-describedby="helpId" placeholder="">
                 <small id="helpId" class="text-danger form-text">
                     @error('nameDepartment')
                         {{$message}}
                     @enderror
                 </small>

               </div>
               <button class="btn btn-outline-warning">Update</button>
               <a href="{{ route('department.get') }}" class="btn btn-outline-success">Add</a>
            </form>
        </div>
    </div>
</div>
@endsection
