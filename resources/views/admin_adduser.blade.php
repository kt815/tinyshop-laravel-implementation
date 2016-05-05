
@extends('layout')
@section('content')
<div class="container content">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-4">
        <div class="list-group adminbar"><a href="/adminbar/showorders" class="list-group-item"><i class="fa fa-book"></i> Orders</a><a href="/adminbar/adduser" class="list-group-item"><i class="fa fa-user-plus"></i> Add new user</a><a href="/adminbar/addcategory" class="list-group-item"><i class="fa fa-plus"></i> Add new category</a><a href="/adminbar/addbrand" class="list-group-item"><i class="fa fa-plus"></i> Add new brand</a><a href="/adminbar/additem" class="list-group-item"><i class="fa fa-plus"></i> Add new product</a><a href="/logout" class="list-group-item"><i class="fa fa-sign-out"></i> Log out</a></div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6">
        <form action="/registrate" method="post" class="form-new-user">
          <label>Name</label>
          <input name="name" type="text" value="" required="" class="form-control input-xlarge"/>
          <label>Email</label>
          <input name="email" type="text" value="" required="" class="form-control input-xlarge"/>
          <label for="select1">User rights:</label>
          <select id="select1" name="role" class="form-control">
            <option value="user">user</option>
            <option value="admin">admin</option>
          </select>
          <label>Password</label>
          <input name="password" type="text" value="" required="" class="form-control input-xlarge"/>
          <label>Telephone</label>
          <input name="telephone" type="text" value="" required="" class="form-control input-xlarge"/>
          <label>Address</label>
          <textarea name="address" rows="3" required="" class="form-control input-xlarge"></textarea>
          <div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-lg btn-primary pull-right btn-adminbar">Add user</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>@endsection