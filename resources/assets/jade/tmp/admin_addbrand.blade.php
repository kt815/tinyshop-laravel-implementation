
@extends('layout')
@section('content')
<div class="container content">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-4">
        <div class="list-group adminbar"><a href="/adminbar/showorders" class="list-group-item"><i class="fa fa-book"></i> Orders</a><a href="/adminbar/adduser" class="list-group-item"><i class="fa fa-user-plus"></i> Add new user</a><a href="/adminbar/addcategory" class="list-group-item"><i class="fa fa-plus"></i> Add new category</a><a href="/adminbar/addbrand" class="list-group-item"><i class="fa fa-plus"></i> Add new brand</a><a href="/adminbar/additem" class="list-group-item"><i class="fa fa-plus"></i> Add new product</a><a href="/logout" class="list-group-item"><i class="fa fa-sign-out"></i> Log out</a></div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6">
        <form name="addbrand" action="/addbrand" method="post" class="form-new-brand">
          <label>New brand</label>
          <input name="brand" type="text" value="" autocomplete="off" required="" class="form-control input-xlarge"/>
          <div>
            <button type="submit" class="btn btn-lg btn-primary pull-right btn-adminbar">Add brand</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>@endsection