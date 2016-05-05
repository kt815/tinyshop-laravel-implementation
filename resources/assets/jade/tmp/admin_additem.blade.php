
@extends('layout')
@section('content')
<div class="container content">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-4">
        <div class="list-group adminbar"><a href="/adminbar/showorders" class="list-group-item"><i class="fa fa-book"></i> Orders</a><a href="/adminbar/adduser" class="list-group-item"><i class="fa fa-user-plus"></i> Add new user</a><a href="/adminbar/addcategory" class="list-group-item"><i class="fa fa-plus"></i> Add new category</a><a href="/adminbar/addbrand" class="list-group-item"><i class="fa fa-plus"></i> Add new brand</a><a href="/adminbar/additem" class="list-group-item"><i class="fa fa-plus"></i> Add new product</a><a href="/logout" class="list-group-item"><i class="fa fa-sign-out"></i> Log out</a></div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6">
        <form name="additem" action="/additem" enctype="multipart/form-data" method="post" class="form-new-item">
          <label for="select1">Category:</label>
          <select id="select1" name="category" class="form-control">
            <option value="">-</option>
            <option value="1">smartphones</option>
            <option value="2">accessories</option>
          </select>
          <label for="select2">Brand:</label>
          <select id="select2" name="brand" class="form-control">
            <option value="">-</option>
            <option value="4">Acer</option>
            <option value="9">Apple</option>
            <option value="3">Asus</option>
            <option value="5">Fly</option>
            <option value="1">HTC</option>
            <option value="2">Lenovo</option>
            <option value="6">Nokia</option>
            <option value="10">Samsung</option>
            <option value="7">Sony</option>
          </select>
          <label>Model</label>
          <input name="model" type="text" value="" autocomplete="off" required="" class="form-control input-xlarge"/>
          <label>Characteristics</label>
          <textarea name="characteristics" value="" rows="3" required="" class="form-control input-xlarge"></textarea>
          <label>Description</label>
          <textarea name="description" value="h" rows="3" required="" class="form-control input-xlarge"></textarea>
          <label>Price</label>
          <input name="price" type="text" value="" autocomplete="off" required="" class="form-control input-xlarge"/>
          <label>Instock</label>
          <input name="instock" type="text" value="" max="3" autocomplete="off" required="" class="form-control input-xlarge"/>
          <label>Photo</label><br/>
          <div class="upload-file">
            <div class="input-group"><span class="input-group-btn"><span class="btn btn-primary btn-file">Browse… 
                  <input type="file" name="file"/></span></span>
              <input type="text" readonly="" class="form-control"/>
            </div><span class="help-block">*.jpg only! Will resize your image to square proportion + adding white background!</span>
          </div>
          <div>
            <button type="submit" class="btn btn-lg btn-primary pull-right btn-adminbar">Add product</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>@endsection