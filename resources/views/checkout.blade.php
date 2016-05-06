
@extends('layout')
@section('content')
<div class="container content">

<div class="checkout">

      <form name="checkout" class="checkout-form" action="/checkout" method="post">

        
        

        <label>Name</label>
          <input name="name" type="text" value="{{ $name }}" class="form-control input-xlarge" autocomplete="off" required 
            @if ($name != "")
                readonly
            @endif
            >

        <label>Email</label>
          <input name="email" type="text" value="{{ $email }}" class="form-control input-xlarge" autocomplete="off" required
            @if ($email != "")
                readonly 
            @endif
          >

        <label>Telephone</label>
          <input name="telephone" type="text" value="{{ $telephone }}" class="form-control input-xlarge" autocomplete="off" required
            @if ($telephone != "")
                readonly 
            @endif
          >

        <label>Address</label>
          <input name="address" type="text" value="{{ $address }}" class="form-control input-xlarge" autocomplete="off" required
            @if ($address != "")
                readonly 
            @endif
          >

        <label>Order Number</label>
          <input name="order" type="text" value="{{ $order }}" class="form-control input-xlarge" autocomplete="off" readonly>

        <label>Total Sum</label>
          <input name="total" type="text" value="{{ $total }}" class="form-control input-xlarge" autocomplete="off" readonly>

        <div>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button class="btn btn-lg btn-primary pull-right btn-adminbar" type="submit">
             Buy and Confirm
          </button>
        </div>
      </form>

    </div> 


</div>@endsection