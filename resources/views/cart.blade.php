
@extends('layout')
@section('content')
<div class="container content">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 shopping-cart">

        @if($items == 0)
        
            @if(Session::has('success'))
              <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
            @elseif(Session::has('danger'))
              <div class="alert alert-danger" role="alert">{{ Session::get('danger') }}</div>
            @else
              <div class="alert alert-danger" role="alert">Your shopping cart is empty!</div>
            @endif
        
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th class="text-center">Price</th>
                <th class="text-center">Total</th>
                <th> </th>
              </tr>
            </thead>
            <tbody>                                        
              <tr>
                <td>   </td>
                <td>   </td>
                <td>   </td>
                <td><h3>Total</h3></td>
                <td class="text-right"><h3><strong>0</strong></h3></td>
              </tr>
              <tr>
                <td>   </td>
                <td>   </td>
                <td>   </td>
                <td>
                  <a href="/catalog" type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                  </a>
                </td>
                <td>
                  <a href="/checkout" class="btn btn-success disabled ">
                    Checkout <span class="glyphicon glyphicon-play"></span>
                  </a>
                </td>
              </tr>
            </tbody>
          </table>

        @else


            @if(Session::has('success'))
              <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
            @elseif(Session::has('danger'))
              <div class="alert alert-danger" role="alert">{{ Session::get('danger') }}</div>
            @endif


          <table class="table table-hover">
            <thead>
              <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th class="text-center">Price</th>
                <th class="text-center">Total</th>
                <th> </th>
              </tr>
            </thead>
            <tbody>
            @foreach ($items as $item)
              <tr>
                <td class="col-sm-8 col-md-6">
                  <div class="media"><a href="/item/{{ $item->id }}" class="thumbnail pull-left"><img src="/images/catalog/{{ $item->photo }}" class="media-object"/></a>
                    <div class="media-body">
                      <h4 class="media-heading"><a href="/item/{{ $item->id }}">{{ $item->brand }} {{ $item->model }}</a></h4><span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                    </div>
                  </div>
                </td>
                <td style="text-align: center" class="col-sm-1 col-md-1"><strong>{{ $item->quantity }}</strong></td>
                <td class="col-sm-1 col-md-1 text-center"><strong>{{ $item->price }}</strong></td>
                <td class="col-sm-1 col-md-1 text-center"><strong>{{ $item->price * $item->quantity  }}</strong></td>
                <td class="col-sm-1 col-md-1">
                  <form name="checkout" action="/delfromcart/{{ $item->id }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Remove</button>
                  </form>
                </td>
              </tr>
            @endforeach
              <tr>
                <td>   </td>
                <td>   </td>
                <td>   </td>
                <td>
                  <h3>Total</h3>
                </td>
                <td class="text-right">
                  <h3><strong>{{ $total }} $</strong></h3>
                </td>
              </tr>
              <tr>
                <td>   </td>
                <td>   </td>
                <td>   </td>
                <td><a href="/catalog" type="button" class="btn btn-default"><span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping</a></td>
                <td><a href="/checkout" class="btn btn-success">Checkout <span class="glyphicon glyphicon-play"></span></a></td>
              </tr>
            </tbody>
          </table>
        @endif
      </div>
    </div>
  </div>
</div>@endsection