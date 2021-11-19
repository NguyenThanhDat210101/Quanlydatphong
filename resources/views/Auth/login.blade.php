@extends('auth')
@section('titleAuth','Login')
@section('images','room2.jpg')
@section('mainAuth')
<form action="{{ route('signin') }}" method="POST" class="user">
    {{csrf_field()}}
    <div class="form-group">
        <input type="text" class="form-control form-control-user" value="{{ old('emailLogin') }}"
            id="exampleInputEmail" aria-describedby="emailHelp"
            placeholder="Enter Email Address..." name="emailLogin">
            <small class="text-danger form-text">
                @error('emailLogin')
                   {{$message}}
                @enderror
           </small>
    </div>
    <div class="form-group">
        <input type="password" name="passwordLogin" class="form-control form-control-user"
            id="exampleInputPassword" placeholder="Password">
            <small class="text-danger form-text">
                @error('passwordLogin')
                   {{$message}}
                @enderror
           </small>
    </div>
    <div class="form-group">
        <div class="custom-control custom-checkbox small">
            <input type="checkbox" class="custom-control-input" id="customCheck">
            <label class="custom-control-label" for="customCheck">Remember
                Me</label>
        </div>
    </div>
    <button class="btn btn-primary btn-user btn-block">
        Login
    </button>
    @if (!empty($errormessage))
<br>
<hr>
<div class="alert alert-danger text-center" role="alert">
    {{$errormessage}}
</div>
@endif
    <hr>
    <a href="index.html" class="btn btn-google btn-user btn-block">
        <i class="fab fa-google fa-fw"></i> Login with Google
    </a>
    <a href="index.html" class="btn btn-facebook btn-user btn-block">
        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
    </a>
</form>

<hr>
<div class="text-center">
    <a class="small" href="{{ route('forgot.get') }}">Forgot Password?</a>
</div>
<div class="text-center">
    <a class="small" href="{{ route('register.get') }}">Registered</a>
</div>
@endsection
