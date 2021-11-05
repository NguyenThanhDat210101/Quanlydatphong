@extends('main')
@section('namePage','Manager Book Room')
@section('content')
<div class="row">
    {{-- Crud --}}
       <div class="col-lg-12">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Manager Book Room</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Meet Room</th>
                            <th>Book Date</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($allBook as $item)
                        <tr>

                            <td scope="row"><img src="../images/{{$item->imageroom}}" alt="" width="70px"></td>
                            <td>{{$item->nameroom}}</td>
                            <td>{{date("d-m-Y H:i", strtotime($item->book_date))}}</td>
                            <td>{{date("d-m-Y H:i", strtotime($item->start_date))}}</td>
                            <td>{{date("d-m-Y H:i", strtotime($item->end_date))}}</td>
                            <td>
                                <a style="text-decoration: none" href="{{ route('join.user.get', ['id'=>$item->id]) }}">
                                    <i class="fa fa-plus-square btn btn-outline-success"></i>
                                </a>
                                <a style="text-decoration: none" href="{{ route('is.join.user', ['id'=>$item->id]) }}">
                                    <i class="fa fa-user btn btn-outline-primary"></i>
                                </a>
                                <a style="text-decoration: none" href="{{ route('manager.book.room.cancel', ['id'=>$item->id]) }}">
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
                        <a class="page-link" href="{{$allBook->previousPageUrl()}}">Previous</a>
                      </li>
                      <li class="page-item"><a class="page-link" href="{{$allBook->currentPage()}}">{{$allBook->currentPage()}} / {{$allBook->lastPage()}}</a></li>
                        <a class="page-link" href="{{$allBook->nextPageUrl()}}">Next</a>
                      </li>
                    </ul>
                  </nav>
            </div>
        </div>
       </div>
   </div>
@endsection
