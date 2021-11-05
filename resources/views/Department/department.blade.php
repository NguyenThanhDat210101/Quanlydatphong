@extends('Department.index')
@section('department')
<div class="col-lg-6">
    <!-- Circle Buttons -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add New Department</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('department.post') }}" method="post">
             {{csrf_field()}}
             <div class="form-group">
                 <input type="hidden"
                   class="form-control" name="idDepartment" id=""  aria-describedby="helpId" placeholder="">
                 <label for="">Name</label>
                 <input type="text"
                   class="form-control" name="nameDepartment" id=""  aria-describedby="helpId" placeholder="">
                 <small id="helpId" class="text-danger form-text">
                     @error('nameDepartment')
                         {{$message}}
                     @enderror
                 </small>
                 @if (!empty($messagesuccess))
                    <small id="helpId" class="text-muted form-text alert alert-success">
                        {{$messagesuccess}}
                    </small>
                 @endif
               </div>
               <button class="btn btn-outline-success">Add</button>
            </form>
        </div>
    </div>
</div>
@endsection
