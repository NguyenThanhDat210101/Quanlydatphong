@extends('main')
@section('namePage','Meet Room')
@section('search','/searchMeetRoom')
@section('content')
<div class="row">
    {{-- Crud --}}
       <div class="col-lg-5">

           <!-- Circle Buttons -->
           <div class="card shadow mb-4">
               <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary">Add New Meet Room</h6>
               </div>
               <div class="card-body">
                 @yield('meetroom')
               </div>
           </div>
       </div>
       {{--table  --}}
       <div class="col-lg-7">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Meet Room</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th >Name</th>
                            <th>Address</th>
                            <th>Seats</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        @if (count($getAllMeet) == 0)
                        <tr class="text-center text-danger  "><td  colspan="5" ><h2 >Không Tìm Thấy??</h2></td></tr>

                        @endif
                        @foreach ($getAllMeet as $item)
                        <tr>
                            <td scope="row"><img src="../images/{{$item->image}}" width="90px" alt=""></td>
                            <td style="width:150px">{{$item->name}}</td>
                            <td style="width:200px">{{$item->address}}</td>
                            <td>{{number_format($item->seats)}}</td>

                            <td>
                                <a style="text-decoration-line: none" href="{{ route('meetroom.edit', ['id'=>$item->id]) }}">
                                    <i class="fa fa-edit btn btn-outline-success"></i>
                                </a>

                                <a href="{{ route('meetroom.delete', ['id'=>$item->id]) }}">
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
                        <a class="page-link" href="{{$getAllMeet->previousPageUrl()}}">Previous</a>
                      </li>
                      <li class="page-item"><a class="page-link" href="{{$getAllMeet->currentPage()}}">{{$getAllMeet->currentPage()}} / {{$getAllMeet->lastPage()}}</a></li>
                        <a class="page-link" href="{{$getAllMeet->nextPageUrl()}}">Next</a>
                      </li>
                    </ul>
                  </nav>
            </div>
        </div>
    </div>
   </div>
   <script>
       function chooseFile(fileInput){
            if(fileInput.files && fileInput.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#imageMeet').attr('src',e.target.result);
                }
                reader.readAsDataURL(fileInput.files[0])
            }
       }
   </script>
@endsection
