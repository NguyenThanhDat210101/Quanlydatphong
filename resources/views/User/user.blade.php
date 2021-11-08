@extends('main')
@section('namePage','User')
@section('search','/searchUser')
@section('content')
<div class="row">
    {{-- Crud --}}
       <div class="col-lg-12">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List User</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Department</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($getAllUser as $item)
                        <tr>
                            <td scope="row"><img src="../images/{{$item->image}}" alt="" width="50px"></td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->nameDepartment}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                      <li class="page-item">
                        <a class="page-link" href="{{$getAllUser->previousPageUrl()}}">Previous</a>
                      </li>
                      <li class="page-item"><a class="page-link" href="{{$getAllUser->currentPage()}}">{{$getAllUser->currentPage()}} / {{$getAllUser->lastPage()}}</a></li>
                        <a class="page-link" href="{{$getAllUser->nextPageUrl()}}">Next</a>
                      </li>
                    </ul>
                  </nav>
            </div>
        </div>
       </div>
   </div>
@endsection
