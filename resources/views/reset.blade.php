
@extends('layout')
@section('content')
<div class="container content">
  <div class="container">
    <div>
      <form action="{{ url('/login') }}" method="post" class="form-signin">
       {!! csrf_field() !!}
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <h2 class="form-signin-heading">Reset Password </h2>
        <input id="inputEmail" name="email" type="email" autofocus="" required="" placeholder="Email address" class="form-control"/>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>


        <button type="submit" class="btn btn-lg btn-primary btn-block">
          
          <i class="fa fa-btn fa-envelope"></i>  Send Password Reset Link

        </button>

      </form>
    </div>
  </div>
</div>@endsection