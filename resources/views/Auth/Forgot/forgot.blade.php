@extends('auth')
@section('images','room.jpg')
@section('titleAuth','
Forgot Your Password?
We get it, stuff happens. Just enter your email address below and well send you a link to reset your password!')
@section('mainAuth')
<form action="{{ route('sendmail')}}" method="POST" class="user">
    {{csrf_field()}}
    <div class="form-group">
        <input type="email" class="form-control form-control-user"
            id="exampleInputEmail" name="emailForgot" aria-describedby="emailHelp"
            placeholder="Enter Email Address...">
    </div>
    <button class="btn btn-primary btn-user btn-block">
        Reset Password
    </button>
</form>
<hr>
<div class="text-center">
    <a class="small" href="{{ route('register.get') }}">Register</a>
</div>
<div class="text-center">
    <a class="small" href="{{ route('login.get') }}">Already have an account? Login!</a>
</div>
@endsection
