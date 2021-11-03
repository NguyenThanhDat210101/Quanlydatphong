@extends('main')
@section('namePage','Department')
@section('content')
<div class="row">
    {{-- Crud --}}
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
                      </div>
                      <button class="btn btn-outline-success">Add</button>
                   </form>
               </div>
           </div>

           <!-- Brand Buttons -->


       </div>
       {{--table  --}}
       <div class="col-lg-6">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Department</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-center" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($department as $item)
                        <tr>
                            <td scope="row">{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                <a href="{{ route('edit.department', ['id'=>$item->id]) }}">
                                    <i class="fa fa-edit btn btn-outline-warning"></i>
                                </a>
                                <a href="{{ route('delete.department', ['id'=>$item->id]) }}">
                                    <i class="fas fa-trash-alt btn btn-outline-danger"></i>
                                </a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                      <li class="page-item">
                        <a class="page-link" href="{{$department->previousPageUrl()}}">Previous</a>
                      </li>
                      <li class="page-item"><a class="page-link" href="{{$department->currentPage()}}">{{$department->currentPage()}} / {{$department->lastPage()}}</a></li>
                        <a class="page-link" href="{{$department->nextPageUrl()}}">Next</a>
                      </li>
                    </ul>
                  </nav>
            </div>
        </div>
    </div>
   </div>
@endsection
