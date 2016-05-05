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
      .col-lg-6.col-md-6.col-sm-6
        form.form-new-category(name='addcategory', action='/addcategory', method='post')
          label New category
          input.form-control.input-xlarge(name='category', type='text', value='', autocomplete='off', required='')
          div
            button.btn.btn-lg.btn-primary.pull-right.btn-adminbar(type='submit') Add category
| @endsection

