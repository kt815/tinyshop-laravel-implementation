| @extends('layout')
| @section('content')
.container.content
  .container
    .row
      .col-lg-3.col-md-3.col-sm-4
        .list-group.adminbar
          a.list-group-item(href='/adminbar/showorders')
            i.fa.fa-book
            |  Orders
          a.list-group-item(href='/adminbar/adduser')
            i.fa.fa-user-plus
            |  Add new user
          a.list-group-item(href='/adminbar/addcategory')
            i.fa.fa-plus
            |  Add new category
          a.list-group-item(href='/adminbar/addbrand')
            i.fa.fa-plus
            |  Add new brand
          a.list-group-item(href='/adminbar/additem')
            i.fa.fa-plus
            |  Add new product
          a.list-group-item(href='/logout')
            i.fa.fa-sign-out
            |  Log out
      .container.col-lg-9.col-md-9.col-sm-12
        .row.filters
          ul.nav.nav-pills.adm-orders
            li(role='presentation')
              a(href='/adminbar/showorders/1/all')
                | All 
                span.badge 7
            li(role='presentation')
              a(href='/adminbar/showorders/1/confirmed')
                | Confirmed 
                span.badge 4
            li(role='presentation')
              a(href='/adminbar/showorders/1/notconfirmed')
                | Not confirmed 
                span.badge 3
        .row.orders-list
          table#mytable.table.table-bordred.table-striped
            thead
              th Order id
              th User id
              th Sum
              th Date
              th Status
              th Confirm
              th Remove
            tbody
              tr
                td
                  a(href='/adminbar/order/57172526bada4') 57172526bada4
                td
                  | unregistered
                td 521.97
                td 2016-04-20 14:44:27
                td
                  i.glyphicon.glyphicon-remove(style='color:#FF0004;')
                  |  Not confirmed
                td
                  form(name='buy-item', action='/confirm/57172526bada4', method='post')
                    button.btn.btn-sm.btn-success(type='submit')
                      i.glyphicon.glyphicon-ok
                td
                  form(name='buy-item', action='/delorder/57172526bada4', method='post')
                    button.btn.btn-sm.btn-danger(type='submit')
                      i.glyphicon.glyphicon-remove
              tr
                td
                  a(href='/adminbar/order/54e65171857ae') 54e65171857ae
                td
                  | unregistered
                td 264.98
                td 2015-02-20 05:11:59
                td
                  i.glyphicon.glyphicon-ok(style='color:#00A41E;')
                  |  Confirmed
                td
                  form(name='buy-item', action='/confirm/54e65171857ae', method='post')
                    button.btn.btn-sm.btn-success.disabled(type='submit')
                      i.glyphicon.glyphicon-ok
                td
                  form(name='buy-item', action='/delorder/54e65171857ae', method='post')
                    button.btn.btn-sm.btn-danger(type='submit')
                      i.glyphicon.glyphicon-remove
              tr
                td
                  a(href='/adminbar/order/54e6515e906eb') 54e6515e906eb
                td
                  | 2
                td 1489.96
                td 2015-02-20 05:11:13
                td
                  i.glyphicon.glyphicon-ok(style='color:#00A41E;')
                  |  Confirmed
                td
                  form(name='buy-item', action='/confirm/54e6515e906eb', method='post')
                    button.btn.btn-sm.btn-success.disabled(type='submit')
                      i.glyphicon.glyphicon-ok
                td
                  form(name='buy-item', action='/delorder/54e6515e906eb', method='post')
                    button.btn.btn-sm.btn-danger(type='submit')
                      i.glyphicon.glyphicon-remove
              tr
                td
                  a(href='/adminbar/order/54e65140798e5') 54e65140798e5
                td
                  | 2
                td 554.96
                td 2015-02-20 05:10:54
                td
                  i.glyphicon.glyphicon-ok(style='color:#00A41E;')
                  |  Confirmed
                td
                  form(name='buy-item', action='/confirm/54e65140798e5', method='post')
                    button.btn.btn-sm.btn-success.disabled(type='submit')
                      i.glyphicon.glyphicon-ok
                td
                  form(name='buy-item', action='/delorder/54e65140798e5', method='post')
                    button.btn.btn-sm.btn-danger(type='submit')
                      i.glyphicon.glyphicon-remove
        .row
          .pages
            nav
              ul.pagination
                li.disabled
                  a(aria-label='Previous', href='/adminbar/showorders/0/all')
                    span(aria-hidden='true') «
                li.active
                  a(href='/adminbar/showorders/1/all')
                    | 1
                li
                  a(href='/adminbar/showorders/2/all')
                    | 2
                li
                  a(aria-label='Next', href='/adminbar/showorders/2/all')
                    span(aria-hidden='true') »

| @endsection

