
@extends('layout')
@section('content')
<div class="container content">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-lg-3">
        <div class="list-group adminbar catalog-bar">@foreach ($categories as $category)      <a href="/catalog/{{ $category-&gt;category }}" class="list-group-item">{{ $category->category }}</a>@endforeach          </div>
      </div>
      <div class="col-md-9 col-lg-9 catalog-content">
        <div class="row items-list">@foreach ($items as $item)      
          <div class="item col-sm-6 col-sm-6 col-md-4 col-lg-3">
            <div class="col-item item-16">
              <div class="photo"><a href="/item/{{ $item-&gt;id }}"><img src="/images/catalog/{{ $item-&gt;photo }}" alt="a" class="img-responsive"/></a></div>
              <div class="info">
                <div class="row item-name">
                  <h4><a href="/item/{{ $item-&gt;id }}">{{ $item->brand_name }} {{ $item->model }}</a></h4>
                </div>
                <div class="row price-buy">
                  <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                    <h5 class="price-text-color"><b>${{ $item->price }}</b></h5>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8">
                    <form name="buy-item" action="/addtocart/{{ $item-&gt;id }}" method="post">
                      <button type="submit" class="btn btn-primary disabled">Add to cart</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>@endforeach
        </div>
      </div>
    </div>
  </div>
</div>@endsection