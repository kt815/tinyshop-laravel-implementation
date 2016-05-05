
@extends('layout')
@section('content')
<div class="container">
  <div class="row col-sm-12 review-form">
    <div class="col-sm-10 col-sm-offset-1 contact-form">
      <div class="row">
        <form id="contact" action="/addreview" method="post" role="form" class="form">
          <div class="row lead">
            <div id="stars-existing" data-rating="5" class="starrr"></div>
            <input id="count-existing" type="hidden" name="rating" value="5"/>
          </div>
          <div class="row">
            <div class="col-xs-6 col-md-6 form-group">
              <input id="name" name="name" placeholder="Name" type="text" required="" autofocus="" class="form-control"/>
            </div>
            <div class="col-xs-6 col-md-6 form-group">
              <input id="email" name="email" placeholder="Email" type="email" required="" class="form-control"/>
            </div>
          </div>
          <textarea id="message" name="review" placeholder="Message" rows="5" required="" class="form-control"></textarea><br/>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="submit" class="btn btn-primary pull-right">Add review</button>
        </form>
      </div>
    </div>
  </div>
  <div class="row col-sm-10 col-sm-offset-1 reviews">
    <div class="row review">
      <div class="col-sm-3"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>
        <p>by <a href="mailto:murder@mail.com">Mr Pickles</a></p>
        <p>2015-02-28 21:31:36</p>
      </div>
      <div class="col-sm-9">Good boys buys here.</div>
    </div>
    <hr/>
    @foreach ($reviews as $review)      
    <div class="row review">      
      <div class="col-sm-3">

          <?for ($i = 0; $i < $review->rating; $i++):?>
            <span class='fa fa-star'></span>
          <?endfor;?>

          <?for ($i = 0; $i < (5 - $review->rating); $i++):?>
            <span class='fa fa-star-o'></span>
          <?endfor;?>

        <p>by <a href="mailto:bro@bromail.com">{{  $review->name }}</a></p>
        <p>{{  $review->created_at }}</p>
      </div>
      <div class="col-sm-9">{{  $review->review }}</div>
    </div>
    <hr/>
    @endforeach
  </div>
</div>@endsection