
@extends('layout')
@section('content')
<div class="container content">
  <div class="container">
    <div class="registration-form">
      <form action="{{ url('/registration') }}" method="post" class="form-signin">
        {!! csrf_field() !!}      
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <label>Name</label>
          <input name="name" type="text" value="" required="" class="form-control input-xlarge"/>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>        
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          <label>Email</label>
          <input name="email" type="text" value="" required="" class="form-control input-xlarge"/>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>        
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
          <label>Password</label>
          <input id="password1" type="password" name="password" value="" autocomplete="off" required="" class="form-control input-xlarge"/>
              @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
        </div>
        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
          <label>Repeat Password</label>
          <input id="password2" type="password" name="password_confirmation" value="" autocomplete="off" required="" class="form-control input-xlarge"/>
              @if ($errors->has('password_confirmation'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password_confirmation') }}</strong>
                  </span>
              @endif
        </div>        
        <div class="row">
          <div class="col-sm-12"><span id="pwmatch" style="color:#FF0004;" class="glyphicon glyphicon-remove"></span> Passwords Match</div></div>

        <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">        
        <label>Telephone</label>
        <input name="telephone" type="text" value="" required="" class="form-control input-xlarge"/>
              @if ($errors->has('telephone'))
                  <span class="help-block">
                      <strong>{{ $errors->first('telephone') }}</strong>
                  </span>
              @endif
        </div>        
        <label>Address</label>
        <textarea name="address" rows="3" required="" class="form-control input-xlarge"></textarea><br/>          
        <div>
          <button type="submit" class="btn btn-lg btn-primary btn-block">Sign Up</button>
        </div>
      </form>
    </div>
  </div>
</div>@endsection