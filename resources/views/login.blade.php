
@extends('layout')
@section('content')
<div class="container content">
  <div class="container">
    <div>
      <form action="{{ url('/login') }}" method="post" class="form-signin">
       {!! csrf_field() !!}

      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <h2 class="form-signin-heading">Please sign in </h2>
        <input id="inputEmail" name="email" type="email" autofocus="" required="" placeholder="Email address" class="form-control"/>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
      
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="inputPassword" class="sr-only">Password</label>
        <input id="inputPassword" name="password" type="password" required="" placeholder="Password" autocomplete="off" class="form-control"/><br/>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group">
          <div class="col-md-6 col-md-offset-3">
              <div class="checkbox">
                  <label>
                      <input type="checkbox" name="remember"> Remember Me
                  </label>
              </div>
          </div>
      </div>


        <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
        <div role="alert" class="panel panel-warning">You will redirect to "/" upon login</div>

      <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>

      </form>
    </div>
  </div>
</div>@endsection