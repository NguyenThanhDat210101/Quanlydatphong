@extends('MeetRoom.index')
@section('meetroom')
<form action="{{ route('meetroom.update') }}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="row">
        <div class="col">
            <img src="../images/{{!empty($getOneMeet)? $getOneMeet->image:'Noimage.png'}}"
                 alt="" height="230px" width="230px" id="imageMeet">
            <input type="file" class="d-none" onchange="chooseFile(this)" name="image_meet_room" id="imageFile">
            <label for="imageFile" style="margin-top: 25px" class="btn btn-primary">Select</label>
        </div>
        <div class="col">
            <input type="hidden" value="{{!empty($getOneMeet)? $getOneMeet->id:''}}"
                    class="form-control" name="meetId" id="" aria-describedby="helpId" placeholder="">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" value="{{!empty($getOneMeet)? $getOneMeet->name:''}}"
                    class="form-control" name="meetName" id="" aria-describedby="helpId" placeholder="">
                <small id="helpId" class="form-text text-danger">
                    @error('meetName')
                        {{$message}}
                     @enderror
                </small>
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <input type="text" value="{{!empty($getOneMeet)? $getOneMeet->address:''}}"
                    class="form-control" name="meetAddress" id="" aria-describedby="helpId" placeholder="">
                <small id="helpId" class="form-text text-danger">
                    @error('meetAddress')
                        {{$message}}
                    @enderror
                </small>
            </div>
            <div class="form-group">
            <label for="">Seats</label>
            <input type="number" value="{{!empty($getOneMeet)? $getOneMeet->seats:''}}"
                class="form-control" name="meetSeats" id="" aria-describedby="helpId" placeholder="">
                <small id="helpId" class="form-text text-danger">
                    @error('meetSeats')
                        {{$message}}
                    @enderror
                </small>
            </div>
            <button class="btn btn-outline-warning">Update</button>
            <a href="{{ route('meetroom.get') }}" class="btn btn-outline-success">Add</a>
        </div>
    </div>
   </form>
@endsection
