| @extends('layout')
| @section('content')
.container.content
  .container
    .row
      .col-md-3.col-lg-3
        .list-group.adminbar.catalog-bar
          | @foreach ($categories as $category)      
          a.list-group-item(href='/catalog/{{ $category->category }}') {{ $category->category }}
          | @endforeach          
      .col-md-9.col-lg-9.catalog-content
        .row.items-list

          | @foreach ($items as $item)      
          .item.col-sm-6.col-sm-6.col-md-4.col-lg-3
            .col-item.item-16
              .photo
                a(href='/item/{{ $item->id }}')
                  img.img-responsive(src='/images/catalog/{{ $item->photo }}', alt='a')
              .info
                .row.item-name
                  h4
                    a(href='/item/{{ $item->id }}') {{ $item->brand_name }} {{ $item->model }}
                .row.price-buy
                  .col-xs-6.col-sm-6.col-md-4.col-lg-4
                    h5.price-text-color
                      b ${{ $item->price }}
                  .col-xs-6.col-sm-6.col-md-8.col-lg-8
                    form(name='buy-item', action='/addtocart/{{ $item->id }}', method='post')
                      button.btn.btn-primary.disabled(type='submit')
                        | Add to cart
          | @endforeach
| @endsection