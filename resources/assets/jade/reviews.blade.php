| @extends('layout')
| @section('content')

.container
  .row.col-sm-12.review-form
    .col-sm-10.col-sm-offset-1.contact-form
      .row
        form#contact.form(action='/addreview', method='post', role='form')
          .row.lead
            #stars-existing.starrr(data-rating='5')
            input#count-existing(type='hidden', name='rating', value='5')
          .row
            .col-xs-6.col-md-6.form-group
              input#name.form-control(name='name', placeholder='Name', type='text', required='', autofocus='')
            .col-xs-6.col-md-6.form-group
              input#email.form-control(name='email', placeholder='Email', type='email', required='')
          textarea#message.form-control(name='review', placeholder='Message', rows='5', required='')
          br
          button.btn.btn-primary.pull-right(type='submit') Add review
  .row.col-sm-10.col-sm-offset-1.reviews
    .row.review
      .col-sm-3
        span.fa.fa-star
        span.fa.fa-star
        span.fa.fa-star
        span.fa.fa-star
        span.fa.fa-star
        p
          | by 
          a(href='mailto:murder@mail.com') Mr Pickles
        p 2015-02-28 21:31:36
      .col-sm-9
        | Good boys buys here.
    hr
    | @foreach ($reviews as $review)      
    .row.review
      .col-sm-3
        span.fa.fa-star
        span.fa.fa-star
        span.fa.fa-star
        span.fa.fa-star-o
        span.fa.fa-star-o
        p
          | by 
          a(href='mailto:bro@bromail.com') Neil Patrick
        p 2015-02-28 21:29:25
      .col-sm-9
        | Do you even bro mahn
    hr
    | @endforeach

| @endsection

