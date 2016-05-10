
@extends('layout')
@section('content')
<div class="container content">

<div class="checkout">


      <form name="checkout" class="checkout-form" action="/checkout" method="post" id="payment-form">

      <div>
          @if($errors->has())
              <div class="alert alert-danger fade in">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4>The following errors occurred</h4>
                  <ul>
                      @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
      </div>

            
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


      <div class="form-group" id="cc-group">
          <label for="">Credit card number:</label>
          <input class="form-control" required="required" data-stripe="number" data-parsley-type="number" maxlength="16" data-parsley-trigger="change focusout" data-parsley-class-handler="#cc-group" type="text">
      </div>


      <div class="row">
        <div class="col-md-4">
          <div class="form-group" id="exp-m-group">
              <label for="">CVC (3 or 4 digit number):</label>
              <input class="form-control" required="required" data-stripe="cvc" data-parsley-type="number" data-parsley-trigger="change focusout" maxlength="4" data-parsley-class-handler="#ccv-group" type="text">
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group" id="exp-m-group">
              <label for="">Ex. Month</label>
              <select class="form-control" required="required" data-stripe="exp-month"><option value="1">01</option><option value="2">02</option><option value="3">03</option><option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group" id="exp-y-group">
              <label for="">Ex. Year</label>
              <select class="form-control" required="required" data-stripe="exp-year"><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option><option value="2019">2019</option><option value="2020">2020</option><option value="2021">2021</option><option value="2022">2022</option><option value="2023">2023</option><option value="2024">2024</option><option value="2025">2025</option><option value="2026">2026</option></select>
          </div>
        </div>
      </div>



        <div>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button class="btn btn-lg btn-primary pull-right btn-adminbar" type="submit">
             Buy and Confirm
          </button>
        </div>

        <span class="payment-errors" style="color: red;margin-top:10px;"></span>
        
      </form>

    </div> 


</div>@endsection