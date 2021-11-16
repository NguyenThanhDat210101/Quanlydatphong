@extends('main')
@section('namePage','Join User')
@section('content')
<div class="row">
    {{-- Crud --}}
       <div class="col-lg-12">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
           <!-- Circle Buttons -->
           <div class="card shadow mb-4">
               <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary">Join User</h6>
               </div>
               <div class="card-body">
                   <form action="{{ route('join.user.post') }}" method="post" >
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col">
                            <img id="my_changing_image" src="../images/{{$ticket->meet_room->image}}" width="300px" height="300px"/>
                            <div class="form-group col-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for=""></label>
                                        <input type="hidden" name="idTicket" value="{{$ticket->id}}">
                                        <input type="text"
                                        class="form-control text-center alert alert-dark" readonly name="nameRoom" value="{{$ticket->meet_room->name}}" id="" aria-describedby="helpId" placeholder="">
                                        <small id="helpId" class="form-text text-danger">
                                            @error('meetRoom')
                                                {{$message}}
                                            @enderror
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="my-select">Thêm Người Tham Gia</label>
                                    <select id="my-select" class="form-control" name="usersBook[]" multiple>
                                        @foreach ($getUser as $item)
                                            <option value="{{$item->id.'?'.$item->email}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    <small id="helpId" class="form-text text-danger">
                                        @error('usersBook')
                                            {{$message}}
                                         @enderror
                                    </small>
                                </div>
                                {{-- end radio --}}
                                </div>
                            <br>
                            <button class="btn btn-success">Join</button>
                        </div>
                    </div>
                   </form>
               </div>
           </div>
           <!-- Brand Buttons -->
       </div>
   </div>
@endsection
