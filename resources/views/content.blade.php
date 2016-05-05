
@extends('layout')
@section('content')
<div class="container content">
  <div class="container">@include('slider')
    <div class="row items-list">@foreach ($items as $item)      
      <div class="item col-xs-12 col-sm-6 col-md-4 col-lg-2">
        <div class="col-item item-46">
          <div class="photo"><a href="/item/{{ $item->id }}"><img src="/images/catalog/{{ $item->photo }}" alt="a" class="img-responsive"/></a></div>
          <div class="info">
            <div class="row item-name">
              <h4><a href="/item/{{ $item->id }}">{{ $item->model }}</a></h4>
            </div>
            <div class="row price-buy">
              <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                <h5 class="price-text-color"><b>${{ $item->price }}</b></h5>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8">
                <form name="buy-item" action="/addtocart/{{ $item->id }}" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit" class="btn btn-primary">Add to cart</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>@endforeach
    </div>
  </div>
</div>@endsection