@extends('main')
@section('namePage','Department')
@section('search','/searchDepartment')
@section('content')
<div class="row">
    {{-- Crud --}}
     @yield('department')
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
                        @if (count($department) == 0)
                        <tr class="text-center text-danger  "><td  colspan="5" ><h2 >Không Tìm Thấy??</h2></td></tr>

                        @endif
                        @foreach ($department as $item)
                        <tr>
                            <td scope="row">{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                <a style="text-decoration: none" href="{{ route('department.edit', ['id'=>$item->id]) }}">
                                    <i class="fa fa-edit btn btn-outline-warning"></i>
                                </a>
                                <a href="{{ route('department.delete', ['id'=>$item->id]) }}">
                                    <i class="fa fa-trash-alt btn btn-outline-danger"></i>
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
