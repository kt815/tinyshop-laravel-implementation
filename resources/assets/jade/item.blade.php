| @extends('layout')
| @section('content')
.container.content
  .container
    .row
      .col-md-3.col-lg-3
        .list-group.catalog-bar
          a.list-group-item(href='/catalog/smartphones') smartphones
          a.list-group-item(href='/catalog/accessories') accessories
      .col-md-9.col-lg-9.item-alone
        .row.name
          p {{ $brand->brand }} {{ $item->model }}
        .row.main
          .col-sm-6.col-md-6.col-lg-6.pic
            img.img-responsive(src='/images/catalog/{{ $item->photo }}', alt='a')
          .col-sm-6.col-md-6.col-lg-6.info-price
            div
              p.price-text-color
                | ${{ $item->price }}
            div
              span.label.label-success In stock
            .buy-item
              form(name='buy-item', action='/addtocart/{{ $item->id }}', method='post')
                button.btn.btn-lg.btn-primary(type='submit')
                  i.fa.fa-2x.fa-cart-plus
                  |  Add to cart
        .row.features
          .panel.panel-primary
            .panel-heading
              h3.panel-title {{ $item->model }} features
            .panel-body
              | {{ $item->description }}
        .row.characteristics
          .panel.panel-primary
            .panel-heading
              h3.panel-title Technical Details
            .panel-body
              | {{ $item->characteristics }}
| @endsection