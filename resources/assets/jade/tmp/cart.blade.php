
@extends('layout')
@section('content')
<div class="container content">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 shopping-cart">
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
              <td class="col-sm-8 col-md-6">
                <div class="media"><a href="/item/26" class="thumbnail pull-left"><img src="/images/catalog/sony-xperia-t2-ultra-dual-d5322.jpg" class="media-object"/></a>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="/item/26">Sony Xperia T2 Ultra Dual D5322</a></h4><span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                  </div>
                </div>
              </td>
              <td style="text-align: center" class="col-sm-1 col-md-1"><strong>2</strong></td>
              <td class="col-sm-1 col-md-1 text-center"><strong>$259.99</strong></td>
              <td class="col-sm-1 col-md-1 text-center"><strong>$519.98</strong></td>
              <td class="col-sm-1 col-md-1">
                <form name="checkout" action="/delfromcart/26" method="post">
                  <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Remove</button>
                </form>
              </td>
            </tr>
            <tr>
              <td>   </td>
              <td>   </td>
              <td>   </td>
              <td>
                <h3>Total</h3>
              </td>
              <td class="text-right">
                <h3><strong>519.98</strong></h3>
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
      </div>
    </div>
  </div>
</div>@endsection