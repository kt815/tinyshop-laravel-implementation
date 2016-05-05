
@extends('layout')
@section('content')
<div class="container content">
  <div class="container">
    <div>
      <form action="/login" method="post" class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input id="inputEmail" name="email" type="email" autofocus="" required="" placeholder="Email address" class="form-control"/>
        <label for="inputPassword" class="sr-only">Password</label>
        <input id="inputPassword" name="password" type="password" required="" placeholder="Password" autocomplete="off" class="form-control"/><br/>
        <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
        <div role="alert" class="panel panel-warning">You will redirect to "/" upon login</div>
      </form>
    </div>
  </div>
</div>@endsection