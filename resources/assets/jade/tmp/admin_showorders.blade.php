
@extends('layout')
@section('content')
<div class="container content">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-4">
        <div class="list-group adminbar"><a href="/adminbar/showorders" class="list-group-item"><i class="fa fa-book"></i> Orders</a><a href="/adminbar/adduser" class="list-group-item"><i class="fa fa-user-plus"></i> Add new user</a><a href="/adminbar/addcategory" class="list-group-item"><i class="fa fa-plus"></i> Add new category</a><a href="/adminbar/addbrand" class="list-group-item"><i class="fa fa-plus"></i> Add new brand</a><a href="/adminbar/additem" class="list-group-item"><i class="fa fa-plus"></i> Add new product</a><a href="/logout" class="list-group-item"><i class="fa fa-sign-out"></i> Log out</a></div>
      </div>
      <div class="container col-lg-9 col-md-9 col-sm-12">
        <div class="row filters">
          <ul class="nav nav-pills adm-orders">
            <li role="presentation"><a href="/adminbar/showorders/1/all">All <span class="badge">7</span></a></li>
            <li role="presentation"><a href="/adminbar/showorders/1/confirmed">Confirmed <span class="badge">4</span></a></li>
            <li role="presentation"><a href="/adminbar/showorders/1/notconfirmed">Not confirmed <span class="badge">3</span></a></li>
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
              <tr>
                <td><a href="/adminbar/order/57172526bada4">57172526bada4</a></td>
                <td>unregistered</td>
                <td>521.97</td>
                <td>2016-04-20 14:44:27</td>
                <td><i style="color:#FF0004;" class="glyphicon glyphicon-remove"></i> Not confirmed</td>
                <td>
                  <form name="buy-item" action="/confirm/57172526bada4" method="post">
                    <button type="submit" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-ok"></i></button>
                  </form>
                </td>
                <td>
                  <form name="buy-item" action="/delorder/57172526bada4" method="post">
                    <button type="submit" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                  </form>
                </td>
              </tr>
              <tr>
                <td><a href="/adminbar/order/54e65171857ae">54e65171857ae</a></td>
                <td>unregistered</td>
                <td>264.98</td>
                <td>2015-02-20 05:11:59</td>
                <td><i style="color:#00A41E;" class="glyphicon glyphicon-ok"></i> Confirmed</td>
                <td>
                  <form name="buy-item" action="/confirm/54e65171857ae" method="post">
                    <button type="submit" class="btn btn-sm btn-success disabled"><i class="glyphicon glyphicon-ok"></i></button>
                  </form>
                </td>
                <td>
                  <form name="buy-item" action="/delorder/54e65171857ae" method="post">
                    <button type="submit" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                  </form>
                </td>
              </tr>
              <tr>
                <td><a href="/adminbar/order/54e6515e906eb">54e6515e906eb</a></td>
                <td>2</td>
                <td>1489.96</td>
                <td>2015-02-20 05:11:13</td>
                <td><i style="color:#00A41E;" class="glyphicon glyphicon-ok"></i> Confirmed</td>
                <td>
                  <form name="buy-item" action="/confirm/54e6515e906eb" method="post">
                    <button type="submit" class="btn btn-sm btn-success disabled"><i class="glyphicon glyphicon-ok"></i></button>
                  </form>
                </td>
                <td>
                  <form name="buy-item" action="/delorder/54e6515e906eb" method="post">
                    <button type="submit" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                  </form>
                </td>
              </tr>
              <tr>
                <td><a href="/adminbar/order/54e65140798e5">54e65140798e5</a></td>
                <td>2</td>
                <td>554.96</td>
                <td>2015-02-20 05:10:54</td>
                <td><i style="color:#00A41E;" class="glyphicon glyphicon-ok"></i> Confirmed</td>
                <td>
                  <form name="buy-item" action="/confirm/54e65140798e5" method="post">
                    <button type="submit" class="btn btn-sm btn-success disabled"><i class="glyphicon glyphicon-ok"></i></button>
                  </form>
                </td>
                <td>
                  <form name="buy-item" action="/delorder/54e65140798e5" method="post">
                    <button type="submit" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                  </form>
                </td>
              </tr>
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