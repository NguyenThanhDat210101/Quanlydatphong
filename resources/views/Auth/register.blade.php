@extends('auth')
@section('titleAuth', 'Registered')
@section('images', $photos)
@section('mainAuth')
    <form action="{{ route('register.post') }}" method="POST" class="user" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="my-input" class="btn btn-outline-dark btn-user btn-block">Import Image</label>
            <input id="my-input" class="d-none" onchange="chooseFile(this)" type="file" name="photoRegister">
        </div>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" name="nameRegister" id="" value="{{ old('nameRegister') }}"
                placeholder="Name">
            <small class="text-danger form-text">
                @error('nameRegister')
                    {{ $message }}
                @enderror
            </small>
        </div>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" name="phoneRegister" id="" value="{{ old('phoneRegister') }}"
                placeholder="Phone">
            <small class="text-danger form-text">
                @error('phoneRegister')
                    {{ $message }}
                @enderror
            </small>
        </div>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" name="cmndRegister" id="" value="{{ old('cmndRegister') }}"
                placeholder="CMND/SCCCD">
            <small class="text-danger form-text">
                @error('cmndRegister')
                    {{ $message }}
                @enderror
            </small>
        </div>
        <div class="form-group">
            <input type="email" class="form-control form-control-user" name="emailRegister" id="" value="{{ old('emailRegister') }}"
                placeholder="Email">
            <small class="text-danger form-text">
                @error('emailRegister')
                    {{ $message }}

                @enderror
            </small>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="password" class="form-control form-control-user" name="passwordRegister" value="{{ old('passwordRegister') }}"
                    id="exampleInputPassword" placeholder="Password">
                <small class="text-danger form-text">
                    @error('passwordRegister')
                        {{ $message }}
                    @enderror
                </small>
            </div>
            <div class="col-sm-6">
                <input type="password" class="form-control form-control-user" id="" value="{{ old('configPasswordRegister') }}"
                    name="configPasswordRegister" placeholder="Repeat Password">
                <small class="text-danger form-text ">
                    @error('configPasswordRegister')
                        {{ $message }}
                    @enderror
                </small>
            </div>
        </div>
        <div class="form-group">
            <label for="">Department</label>
            <select class="form-control" name="departmentRegister" id="">
                @foreach ($departmentGetAll as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary btn-user btn-block">
            Register Account
        </button>
    </form>

    @if (!empty($errormess))
        <br>
        <hr>
        <div class="alert alert-danger text-center" role="alert">
            {{ $errormess }}
        </div>
    @endif

    <hr>
    <div class="text-center">
        <a class="small" href="{{ route('forgot.get') }}">Forgot Password?</a>
    </div>
    <div class="text-center">
        <a class="small" href="{{ route('login.get') }}">Already have an account? Login!</a>
    </div>

    <script>
        function chooseFile(fileInput) {
            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#photoFile').attr('src', e.target.result);
                }
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    </script>
@endsection
