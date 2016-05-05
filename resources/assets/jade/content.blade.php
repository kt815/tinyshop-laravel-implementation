| @extends('layout')
| @section('content')
.container.content
  .container
    | @include('slider')
    .row.items-list
      | @foreach ($items as $item)      
      .item.col-xs-12.col-sm-6.col-md-4.col-lg-2
        .col-item.item-46
          .photo
            a(href='/item/{{ $item->id }}')
              img.img-responsive(src='/images/catalog/{{ $item->photo }}', alt='a')
          .info
            .row.item-name
              h4
                a(href='/item/{{ $item->id }}') {{ $item->model }}
            .row.price-buy
              .col-xs-6.col-sm-6.col-md-4.col-lg-4
                h5.price-text-color
                  b ${{ $item->price }}
              .col-xs-6.col-sm-6.col-md-8.col-lg-8
                form(name='buy-item', action='/addtocart/46', method='post')
                  button.btn.btn-primary.disabled(type='submit')
                    | Add to cart
      | @endforeach
| @endsection

