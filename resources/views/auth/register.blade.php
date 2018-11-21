@extends('layouts.layout')

@section('content')

<div class="container" style="margin-top:80px;margin-bottom:100px; ">
  <div class="row">
    <div class="col col-md-4 col-md-offset-4" style="box-shadow:1px 1px 5px grey;padding:20px;">
      <h1>Sign up</h1>
      <form method="POST" action="{{ route('register') }}">
          @csrf
        <div class="row">
          <div class="col col-md-6">
            <input type="text" name="name" placeholder="Name" class="form-control" value="{{old('name')}}">
          </div>

          <div class="col col-md-6">
            <input type="text" name="surname" placeholder="Surname" class="form-control" value="{{old('surname')}}">
          </div>
          @if ($errors->has('name'))
              <p class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
              </p>
          @endif

          @if ($errors->has('surname'))
              <p class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('surname') }}</strong>
              </p>
          @endif
          <div class="col col-md-12">
            <input type="email" name="email" placeholder="Email" class="form-control" value="{{old('email')}}">
          </div>
          @if ($errors->has('email'))
              <p class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
              </p>
          @endif
          <div class="col col-md-6">
            <input type="password" name="password" placeholder="password" class="form-control" value="">
          </div>
          <div class="col col-md-6">
            <input type="password" name="password_confirmation" placeholder="Repeat password" class="form-control" value="">
          </div>
          @if ($errors->has('password'))
              <p class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
              </p>
          @endif
          <div class="col col-md-5">
            <select class="form-control" name="month">
              <option selected value=''>Select Month</option>
              <option value='1'>January</option>
              <option value='2'>February</option>
              <option value='3'>March</option>
              <option value='4'>April</option>
              <option value='5'>May</option>
              <option value='6'>June</option>
              <option value='7'>July</option>
              <option value='8'>August</option>
              <option value='9'>September</option>
              <option value='10'>October</option>
              <option value='11'>November</option>
              <option value='12'>December</option>
            </select>
          </div>
          <div class="col col-md-3">
            <select class="form-control" name="day">
              <option>Day</option>
              @for($i=1;$i<=31;$i++)
              <option value="{{$i}}">{{$i}}</option>
              @endfor
            </select>
          </div>
          <div class="col col-md-4">
            <select class="form-control" name="year">
              <option>Year</option>
              @for($i=date("Y");$i>=1900;$i--)
              <option value="{{$i}}">{{$i}}</option>
              @endfor
            </select>
          </div>
          @if ($errors->has('date_of_birth'))
              <p class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('date_of_birth') }}</strong>
              </p>
          @endif
          <div class="col col-md-12">
            <label>
                <input type="checkbox" onchange="this.checked ? document.getElementById('reg_btn').removeAttribute('disabled') : document.getElementById('reg_btn').setAttribute('disabled','true')" name="" value="">
               I agree that I have read and accepted the <a href="#" target="_blank">Terms of Use</a>.
            </label>
          </div>
        </div>
        <input class="btn btn-primary" type="submit" disabled name="" id="reg_btn" value="Sign up">
      </form>
    </div>

  </div>
</div>
@endsection
