@extends('main')
@section('namePage','Book Room')
@section('content')
<div class="row">
    {{-- Crud --}}
       <div class="col-lg-12">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
           <!-- Circle Buttons -->
           <div class="card shadow mb-4">
               <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary">Book Meet Room</h6>
               </div>
               <div class="card-body">
                   <form action="{{ route('book.room.post') }}" method="post" >
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col">
                            <img id="my_changing_image" src="../images/Noimage.png" width="300px" height="300px"/>
                            <div class="form-group col-6">
                                <div class="form-group">
                                <label for="my-select">Select Meet Room</label>
                                <select id="my_select_box" class="form-control"  name="meetRoom">
                                    <option value="" >Chọn Phòng Họp</option>
                                   @foreach ($getMeet as $item)
                                   <option value="../images/{{$item->image}}?{{$item->id}}">{{$item->name}}</option>
                                     {{-- <option value="{{$item->id}}" >{{$item->name}} </option> --}}
                                   @endforeach
                                </select>
                                <small id="helpId" class="form-text text-danger">
                                    @error('meetRoom')
                                        {{$message}}
                                    @enderror
                                </small>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                            <label for="">Ngày</label>
                            <input type="date"
                              class="form-control col-7" name="datebook" id="" aria-describedby="helpId" placeholder="">
                              <small id="helpId" class="form-text text-danger">
                                @error('datebook')
                                    {{$message}}
                                 @enderror
                            </small>
                                {{-- radio --}}
                                <div class="btn-group-toggle"   data-toggle="buttons">
                                    @for ($i = 8; $i < 23; $i++)
                                        <label class="btn btn-outline-dark" style="margin: 5px">
                                            <input type="radio" value="{{($i==8 || $i==9)?'0'.$i:$i}}:00?{{($i+1==9)?'0'.$i+1:$i+1}}:00" name="hourbook" id="{{$i}}" > {{($i==8 || $i==9)?'0'.$i:$i}}:00 - {{($i+1==9)?'0'.$i+1:$i+1}}:00
                                        </label>
                                    @endfor
                                </div>
                                <small id="helpId" class="form-text text-danger">
                                    @error('hourbook')
                                        {{$message}}
                                     @enderror
                                </small>
                                @if (!empty($message))
                                <h3 id="helpId" class="form-text text-danger text-center alert alert-danger">
                                    {{$message}}
                                </h3>
                                @endif

                                {{-- end radio --}}
                                </div>
                            <br>
                            <button class="btn btn-success ">Book Room</button>
                        </div>

                    </div>

                   </form>
               </div>
           </div>
           <!-- Brand Buttons -->
       </div>
   </div>
   <script>
    $('#my_select_box').change(function(){
	$('#my_changing_image').attr('src', $('#my_select_box').val());
    console.log($('#my_select_box').val());
});
</script>
@endsection
