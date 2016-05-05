
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

        <div class="row filters">
          <ul class="nav nav-pills adm-orders">
            <li role="presentation"><a href="/adminbar/showorders">All <span class="badge">{{ $count_all }}</span></a></li>
            <li role="presentation"><a href="/adminbar/showorders/confirmed">Confirmed <span class="badge">{{ $count_confirmed }}</span></a></li>
            <li role="presentation"><a href="/adminbar/showorders/notconfirmed">Not confirmed <span class="badge">{{ $count_not_confirmed }}</span></a></li>
          </ul>
        </div>
        <div class="row orders-list">
          <table id="mytable" class="table table-bordred table-striped">
            <thead>
              <th>Order id</th>
              <th>User id</th>
              <th>Sum</th>
              <th>Date</th>
              <th>Status</th>
              <th>Confirm</th>
              <th>Remove</th>
            </thead>
            <tbody>
            @foreach($orders as $order)
              <tr>
                <td><a href="/adminbar/order/{{ $order->order_id }}">{{ $order->order_id }}</a></td>
                <td>
                @if($order->user_id)
                  {{ $order->user_id }}
                @else
                  unregistered
                @endif
                </td>
                <td>{{ $order->sum }}</td>
                <td>{{ $order->created_at }}</td>
                <td>
                @if ($order->confirmed == 0)
                <i style="color:#FF0004;" class="glyphicon glyphicon-remove"></i> Not confirmed
                @else
                <i class="glyphicon glyphicon-ok" style="color:#00A41E;"></i> Confirmed
                @endif
                </td>
                <td>
                  <form name="buy-item" action="/confirm/{{ $order->order_id }}" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @if ($order->confirmed == 0)
                    <button type="submit" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-ok"></i></button>
                @else
                    <button class="btn btn-sm btn-success disabled" type="submit">
                    <i class="glyphicon glyphicon-ok"></i>
                  </button>
                @endif
                  </form>
                </td>
                <td>
                  <form name="buy-item" action="/delorder/{{ $order->order_id }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                  </form>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <div class="row">
          <div class="pages">
            <nav>
              <ul class="pagination">
                <li class="disabled"><a aria-label="Previous" href="/adminbar/showorders/0/all"><span aria-hidden="true">«</span></a></li>
                <li class="active"><a href="/adminbar/showorders/1/all">1</a></li>
                <li><a href="/adminbar/showorders/2/all">2</a></li>
                <li><a aria-label="Next" href="/adminbar/showorders/2/all"><span aria-hidden="true">»</span></a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>@endsection