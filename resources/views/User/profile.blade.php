@extends('main')
@section('namePage','Profile')
@section('content')
<div class="row">
    {{-- Crud --}}
    <div class="col-6">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('profile.post') }}" method="post" enctype="multipart/form-data">
             {{csrf_field()}}
                <div class="form-group text-center">
                    <img src="../images/{{$user->image}} " id="photoprofile" width="350px" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                    <input type="file" onchange="chooseFile(this)"
                         class="d-none" name="imageProfile" id="imageFile"  aria-describedby="helpId" placeholder="">
                </div>
                <label for="imageFile" class="btn btn-outline-primary d-flex justify-content-center">Select</label>
             <div class="form-group">
                <label for="">email</label>
                <input type="text" value="{{$user->email}}" readonly
                     class="form-control" name="emailProfile" id=""  aria-describedby="helpId" placeholder="">
            </div>
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" value="{{$user->name}}"
                         class="form-control" name="nameProfile" id=""  aria-describedby="helpId" placeholder="">
                         <small id="helpId" class="form-text text-danger">
                            @error('nameProfile')
                                {{$message}}
                             @enderror
                        </small>
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="text" value="{{$user->phone}}"
                         class="form-control" name="phoneProfile" id=""  aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-danger">
                        @error('phoneProfile')
                            {{$message}}
                        @enderror
                    </small>
                </div>

               <button class="btn btn-outline-warning">Update</button>
               @if (!empty($messageSuccessProfile))
               <hr>
               <div class="alert alert-success text-center">
                   {{$messageSuccessProfile}}
               </div>
               @endif
            </form>
         </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('change.pass.post') }}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                       <label for="">Current Password</label>
                       <input type="password"
                            class="form-control" name="currentpassword" id=""  aria-describedby="helpId" placeholder="">
                   </div>
                       <div class="form-group">
                           <label for="">New Password</label>
                           <input type="password"
                                class="form-control" name="newpassword" id=""  aria-describedby="helpId" placeholder="">
                                <small class="text-danger form-text">
                            @error('newpassword')
                                {{$message}}
                            @enderror
                           </small>
                       </div>
                       <div class="form-group">
                           <label for="">Config Password</label>
                           <input type="password"
                                class="form-control" name="configpassword" id=""  aria-describedby="helpId" placeholder="">
                            <small class="text-danger form-text">
                                @error('configpassword')
                                    {{$message}}
                                 @enderror
                </small>
                       </div>

                      <button class="btn btn-outline-primary">Change</button>
                      <hr>
                      @if (!empty($messageError))
                      <div class="alert alert-danger text-center">
                          {{$messageError}}
                      </div>
                      @endif
                      @if (!empty($messageSuccess))
                      <div class="alert alert-success text-center">
                          {{$messageSuccess}}
                      </div>
                      @endif
            </div>

        </div>
    </div>
</div>
<script>
    function chooseFile(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#photoprofile').attr('src',e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
