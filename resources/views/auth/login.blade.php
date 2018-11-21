@extends('layouts.layout')

@section('content')
<div class="container" style="margin-top:80px;">
    <div class="row justify-content-center">
        <div class="col-md-6 col-md-offset-3">

          <div class="login-form" style="box-shadow:1px 1px 5px grey;padding:20px;">
            <p style="color:#3b3f42;font-size:30px;text-align:center;margin-top:0;margin-bottom:25px;">Log in</p>
            <form method="POST" action="{{ route('login') }}">
              @csrf
              <input placeholder="Email" id="email" type="email" style="margin-bottom:10px;" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
              @if ($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif

              <input placeholder="Password" id="password" type="password" style="margin-bottom:10px;" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

              @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
              <input type="submit" class="btn btn-block" style="background:#fbba42;color:white;" value="Log in">
              <div style="text-align:center;margin-top:25px;">
                <!--<a style="color:#3b3f42;text-decoration:underline;" href="#">Register</a> | -->
                <a style="color:#3b3f42;text-decoration:underline;" href="#">Forgot password?</a>
              </div>
            </form>
          </div>

        </div>
    </div>
</div>
@endsection
