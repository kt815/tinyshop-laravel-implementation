| @extends('layout')
| @section('content')
.container.content
  .container
    .row
      .col-sm-12.col-md-12.col-lg-12.shopping-cart
        table.table.table-hover
          thead
            tr
              th Product
              th Quantity
              th.text-center Price
              th.text-center Total
              th  
          tbody
            tr
              td.col-sm-8.col-md-6
                .media
                  a.thumbnail.pull-left(href='/item/26')
                    img.media-object(src='/images/catalog/sony-xperia-t2-ultra-dual-d5322.jpg')
                  .media-body
                    h4.media-heading
                      a(href='/item/26')
                        | Sony Xperia T2 Ultra Dual D5322
                    span Status: 
                    span.text-success
                      strong In Stock
              td.col-sm-1.col-md-1(style='text-align: center')
                strong 2
              td.col-sm-1.col-md-1.text-center
                strong $259.99
              td.col-sm-1.col-md-1.text-center
                strong $519.98
              td.col-sm-1.col-md-1
                form(name='checkout', action='/delfromcart/26', method='post')
                  button.btn.btn-danger(type='submit')
                    span.glyphicon.glyphicon-remove
                    |  Remove
            tr
              td    
              td    
              td    
              td
                h3 Total
              td.text-right
                h3
                  strong 519.98
            tr
              td    
              td    
              td    
              td
                a.btn.btn-default(href='/catalog', type='button')
                  span.glyphicon.glyphicon-shopping-cart
                  |  Continue Shopping
              td
                a.btn.btn-success(href='/checkout')
                  | Checkout 
                  span.glyphicon.glyphicon-play
| @endsection

