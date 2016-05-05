
@extends('layout')
@section('content')
<div class="container content">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-4">
        <div class="list-group adminbar"><a href="/adminbar/showorders" class="list-group-item"><i class="fa fa-book"></i> Orders</a><a href="/adminbar/adduser" class="list-group-item"><i class="fa fa-user-plus"></i> Add new user</a><a href="/adminbar/addcategory" class="list-group-item"><i class="fa fa-plus"></i> Add new category</a><a href="/adminbar/addbrand" class="list-group-item"><i class="fa fa-plus"></i> Add new brand</a><a href="/adminbar/additem" class="list-group-item"><i class="fa fa-plus"></i> Add new product</a><a href="/logout" class="list-group-item"><i class="fa fa-sign-out"></i> Log out</a></div>
      </div>

<div class="container col-lg-9 col-md-9 col-sm-12">
  @if(Session::has('success'))
    <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
  @endif

  @if(Session::has('error'))
    <div class="alert alert-error" role="alert">{{ Session::get('error') }}</div>
  @endif  
  
    <div class="row">
  <div class="order_title">
    <h3>Order #{{ $order->order_id }}</h3>
    <h3 class="pull-right">

      <?if ($order->confirmed == 0):?>
        <i class="glyphicon glyphicon-remove" style="color:#FF0004;"></i> Not confirmed
      <?endif;?>
      <?if ($order->confirmed == 1):?>
        <i class="glyphicon glyphicon-ok" style="color:#00A41E;"></i> Confirmed
      <?endif;?>                    

    </h3>

    <hr>
  </div>
  <div class="row">
    <div class="col-xs-6">
      <address>
        <strong>User Id:</strong><br>
          {{ $order->user_id  }}          <br>
        <strong>Shipped To:</strong><br>
          {{ $order->name }}<br>
          {{ $order->address }}<br>
      </address>


    </div>
  </div>
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 order">

      <div class="panel panel-default">

        <div class="panel-heading">
          <h3 class="panel-title">Order summary</h3>
        </div>

        <div class="panel-body">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th class="text-center">Price</th>
                <th class="text-center">Total</th>
              </tr>
            </thead>
            <tbody>

            @foreach ($items as $item)
                <tr>
                  <td class="col-sm-8 col-md-6">
                  <div class="media">
                    <a class="thumbnail pull-left" href="/item/{{ $item->id }}">
                      <img class="media-object" src="/images/catalog/{{ $item->photo }}">
                    </a>
                    <div class="media-body">
                      <h4 class="media-heading">
                        <a href="/item/12">
                          {{ $item->brand }} {{ $item->model }}  </a>
                      </h4>
                    </div>
                  </div></td>
                  <td class="col-sm-1 col-md-1" style="text-align: center"><strong>{{ $item->quantity }}</strong></td>
                  <td class="col-sm-1 col-md-1 text-center"><strong>{{ $item->price }}</strong></td>
                  <td class="col-sm-1 col-md-1 text-center"><strong>{{ $item->price * $item->quantity  }}</strong></td>
                </tr>
            @endforeach              
              <tr>
                <td>   </td>
                <td>   </td>
                <td><h3>Total</h3></td>
                <td class="text-right"><h3><strong>{{ $total }}</strong></h3></td>
              </tr>


            </tbody>
          </table>
        </div>

      </div>

      
    </div>
  </div>

  <div class="row adm-order-btn">

    <div class="col-lg-3 col-md-4 col-sm-4">
      <form name="buy-item" action="/confirm/{{ $order->order_id }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
      <?if ($order->confirmed == 0):?>
        <button class="btn btn-success" type="submit">
        <i class="glyphicon glyphicon-ok"></i> Confirm
      <?endif;?>
      <?if ($order->confirmed == 1):?>
        <button class="btn btn-success disabled" type="submit">
        <i class="glyphicon glyphicon-ok"></i> Confirm
      <?endif;?>   


          
        </button>
      </form>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-4">
      <form name="buy-item" action="/delorder/{{ $order->order_id }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button class="btn btn-danger" type="submit">

          <i class="glyphicon glyphicon-remove"></i> Remove
        </button>
      </form>
    </div>
      

  </div>

  </div>
</div>


      </div>
    </div>
  </div>
</div>@endsection