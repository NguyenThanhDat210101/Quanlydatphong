@extends('main')
@section('namePage','Meet Room')
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
                   <form action="{{ route('meetroom.post') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col">
                            <img src="../images/Noimage.png" alt="" height="230px" width="230px" id="imageMeet">
                            <input type="file" class="d-none" onchange="chooseFile(this)" name="image_meet_room" id="imageFile">
                            <label for="imageFile" style="margin-top: 25px" class="btn btn-primary">Select</label>
                        </div>
                        <div class="col"><div class="form-group">
                            <label for="">Name</label>
                            <input type="text"
                              class="form-control" name="meetName" id="" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-danger">
                                @error('meetName')
                                  {{$message}}
                                @enderror
                            </small>
                        </div>

                        <div class="form-group">
                          <label for="">Address</label>
                          <input type="text"
                            class="form-control" name="meetAddress" id="" aria-describedby="helpId" placeholder="">
                          <small id="helpId" class="form-text text-danger">
                              @error('meetAddress')
                                {{$message}}
                              @enderror
                          </small>
                        </div>

                        <div class="form-group">
                          <label for="">Seats</label>
                          <input type="number"
                            class="form-control" name="meetSeats" id="" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-danger">
                                @error('meetSeats')
                                  {{$message}}
                                @enderror
                            </small>
                        </div>
                        <button class="btn btn-outline-success">Add</button>
                    </div>
                </div>

                   </form>
               </div>
           </div>

           <!-- Brand Buttons -->


       </div>
       {{--table  --}}
       <div class="col-lg-7">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Meet Room</h6>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Seats</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getAllMeet as $item)
                        <tr>
                            <td scope="row"><img src="../images/{{$item->image}}" width="50px" alt=""></td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->address}}</td>
                            <td>{{$item->seats}}</td>
                            <td></td>
                            <td>
                                <i class="fa fa-edit btn btn-outline-success"></i>
                                <a href="{{ route('delete.meetroom', ['id'=>$item->id]) }}">
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
