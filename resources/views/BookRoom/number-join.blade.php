@extends('main')
@section('namePage','Number User')
@section('content')
<div class="row">
    {{-- Crud --}}
       <div class="col-lg-12">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">                    <ul class="pagination justify-content-lg-start">
                    <a href="{{url()->previous()}}" class="btn btn-outline-primary "><i class="fas fa-backspace "></i> </a>
                </ul></h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Number Phone</th>
                            <th>Department</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @if (count($ticketDetail) == 0)
                        <tr class="text-center text-danger  "><td  colspan="5" ><h2 >Chưa có người tham gia họp phòng này</h2></td></tr>

                        @endif
                        @foreach ($ticketDetail as $item)
                        <tr>

                            <td scope="row"><img src="../images/{{$item->App_User->image}}" alt="" width="50px"></td>
                            <td>{{$item->App_User->name}}</td>
                            <td>{{$item->App_User->phone}}</td>
                            <td>{{$item->App_User->department->name}}</td>
                            <td>
                                <a style="text-decoration: none" href="{{ route('delete.join.user', ['id'=>$item->id]) }}">
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
                        <a class="page-link" href="{{$ticketDetail->previousPageUrl()}}">Previous</a>
                      </li>
                      <li class="page-item"><a class="page-link" href="{{$ticketDetail->currentPage()}}">{{$ticketDetail->currentPage()}} / {{$ticketDetail->lastPage()}}</a></li>
                        <a class="page-link" href="{{$ticketDetail->nextPageUrl()}}">Next</a>
                      </li>
                    </ul>
                  </nav>
            </div>
        </div>
       </div>
   </div>
@endsection
