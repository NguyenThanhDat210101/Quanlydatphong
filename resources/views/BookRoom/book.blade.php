@extends('main')
@section('namePage','Meet Room')
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
                   <form action="" method="post">
                    <div class="row">
                        <div class="col">
                            <img id="my_changing_image" src="../images/Noimage.png" width="300px" height="300px"/>
                            <div class="form-group col-6">
                                <label for="my-select">Select Meet Room</label>
                                <select id="my_select_box" class="form-control" name="meetRoom">
                                   @foreach ($getMeet as $item)
                                   <option id="../images/{{$item->image}}" value="../images/{{$item->image}}">{{$item->name}}</option>
                                     {{-- <option value="{{$item->id}}" >{{$item->name}}</option> --}}
                                   @endforeach
                                </select>
                                <div class="form-group">
                                    <label for="my-select">Thêm Người Tham Gia</label>
                                    <select id="my-select" class="form-control" name="" multiple>
                                        @foreach ($getUser as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col">
                            <div class="form-group">
                            <label for="">Ngày</label>
                            <input type="date"
                              class="form-control col-7" name="" id="" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-da"></small>
                                               {{-- radio --}}
                                               <div class="btn-group-toggle" style="padding: 2px;margin: 2px" data-toggle="buttons">
                                                <label class="btn btn-outline-secondary">
                                                  <input type="radio" name="8" id="8" > 08:00 - 09:00
                                                </label>
                                                <label class="btn btn-outline-secondary">
                                                  <input type="radio" name="9" id="9"> 09:00 - 10:00
                                                </label>
                                                <label class="btn btn-outline-secondary">
                                                  <input type="radio" name="10" id="10"> 10:00 - 11:00
                                                </label>
                                                <label class="btn btn-outline-secondary">
                                                    <input type="radio" name="11" id="11"> 11:00 - 12:00
                                                  </label>

                                                <label class="btn btn-outline-secondary">
                                                  <input type="radio" name="12" id="12" > 12:00 - 13:00
                                                </label>
                                                <label class="btn btn-outline-secondary">
                                                  <input type="radio" name="13" id="13"> 13:00 - 14:00
                                                </label>
                                                <label class="btn btn-outline-secondary">
                                                  <input type="radio" name="14" id="14"> 14:00 - 15:00
                                                </label>
                                                <label class="btn btn-outline-secondary">
                                                    <input type="radio" name="15" id="15"> 15:00 - 16:00
                                                  </label>
                                                  <br>
                                                <label class="btn btn-outline-secondary">
                                                    <input type="radio" name="16" id="16"> 16:00 - 17:00
                                                  </label>
                                                <label class="btn btn-outline-secondary">
                                                  <input type="radio" name="17" id="17" > 17:00 - 18:00
                                                </label>
                                                <label class="btn btn-outline-secondary">
                                                  <input type="radio" name="18" id="18"> 18:00 - 19:00
                                                </label>
                                                <label class="btn btn-outline-secondary">
                                                  <input type="radio" name="19" id="19"> 19:00 - 20:00
                                                </label>

                                                <label class="btn btn-outline-secondary">
                                                  <input type="radio" name="20" id="20" > 20:00 - 21:00
                                                </label>
                                                <label class="btn btn-outline-secondary">
                                                  <input type="radio" name="21" id="21"> 21:00 - 22:00
                                                </label>
                                                <label class="btn btn-outline-secondary">
                                                  <input type="radio" name="22" id="22"> 22:00 - 23:00
                                                </label>

                                              </div>

                                            {{-- end radio --}}
                        </div>

                        <br>
                        <button class="btn btn-success">Add</button>
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
});
</script>
@endsection
