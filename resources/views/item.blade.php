
@extends('layout')
@section('content')
<div class="container content">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-lg-3">
        <div class="list-group catalog-bar"><a href="/catalog/smartphones" class="list-group-item">smartphones</a><a href="/catalog/accessories" class="list-group-item">accessories</a></div>
      </div>
      <div class="col-md-9 col-lg-9 item-alone">
        <div class="row name">
          <p>{{ $brand->brand }} {{ $item->model }}</p>
        </div>
        <div class="row main">
          <div class="col-sm-6 col-md-6 col-lg-6 pic"><img src="/images/catalog/{{ $item->photo }}" alt="a" class="img-responsive"/></div>
          <div class="col-sm-6 col-md-6 col-lg-6 info-price">
            <div>
              <p class="price-text-color">${{ $item->price }}</p>
            </div>
            <div><span class="label label-success">In stock</span></div>
            <div class="buy-item">
              <form name="buy-item" action="/addtocart/{{ $item->id }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-2x fa-cart-plus"></i> Add to cart</button>
              </form>
            </div>
          </div>
        </div>
        <div class="row features">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">{{ $item->model }} features</h3>
            </div>
            <div class="panel-body">{{ $item->description }}</div>
          </div>
        </div>
        <div class="row characteristics">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Technical Details</h3>
            </div>
            <div class="panel-body">{{ $item->characteristics }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>@endsection