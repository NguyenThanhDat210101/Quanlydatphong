@extends('MeetRoom.index')
@section('meetroom')
<form action="{{ route('meetroom.post') }}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="row">
        <div class="col">
            <img src="../images/Noimage.png" alt="" height="230px" width="230px" id="imageMeet">
            <input type="file" class="d-none" onchange="chooseFile(this)" name="image_meet_room" id="imageFile">
            <label for="imageFile" style="margin-top: 25px" class="btn btn-primary">Select</label>
            @if (!empty($messagesuccess))
            <small id="helpId" class="text-muted form-text alert alert-success">
                {{$messagesuccess}}
            </small>
            @endif
        </div>
        <div class="col">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" value="{{ old('meetName') }}"
                    class="form-control" name="meetName" id="" aria-describedby="helpId" placeholder="">
                <small id="helpId" class="form-text text-danger">
                    @error('meetName')
                        {{$message}}
                     @enderror
                </small>
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <input type="text" value="{{ old('meetAddress') }}"
                    class="form-control" name="meetAddress" id="" aria-describedby="helpId" placeholder="">
                <small id="helpId" class="form-text text-danger">
                    @error('meetAddress')
                        {{$message}}
                    @enderror
                </small>
            </div>
            <div class="form-group">
            <label for="">Seats</label>
            <input type="number" value="{{ old('meetSeats') }}"
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
@endsection
