
@extends('layout')
@section('content')
<div class="container content">
  <div class="container">
    <div class="registration-form">
      <form action="/registrate" method="post" class="form-signin">
        <label>Name</label>
        <input name="name" type="text" value="" required="" class="form-control input-xlarge"/>
        <label>Email</label>
        <input name="email" type="text" value="" required="" class="form-control input-xlarge"/>
        <label>Password</label>
        <input id="password1" type="password" name="password" value="" autocomplete="off" required="" class="form-control input-xlarge"/>
        <label>Repeat Password</label>
        <input id="password2" type="password" name="password2" value="" autocomplete="off" required="" class="form-control input-xlarge"/>
        <div class="row">
          <div class="col-sm-12"><span id="pwmatch" style="color:#FF0004;" class="glyphicon glyphicon-remove"></span> Passwords Match</div>
        </div>
        <label>Telephone</label>
        <input name="telephone" type="text" value="" required="" class="form-control input-xlarge"/>
        <label>Address</label>
        <textarea name="address" rows="3" required="" class="form-control input-xlarge"></textarea><br/>
        <div>
          <button type="submit" class="btn btn-lg btn-primary btn-block">Sign Up</button>
        </div>
      </form>
    </div>
  </div>
</div>@endsection