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
        form.form-new-user(action='/registrate', method='post')
          label Name
          input.form-control.input-xlarge(name='name', type='text', value='', required='')
          label Email
          input.form-control.input-xlarge(name='email', type='text', value='', required='')
          label(for='select1') User rights:
          select#select1.form-control(name='role')
            option(value='user') user
            option(value='admin') admin
          label Password
          input.form-control.input-xlarge(name='password', type='text', value='', required='')
          label Salt
          input.form-control.input-xlarge(name='salt', type='text', value='', placeholder='not required field', required='')
          label Iterations
          input.form-control.input-xlarge(name='iterations', type='text', value='', maxlength='3', placeholder='not required field; max value = 100', required='')
          label Telephone
          input.form-control.input-xlarge(name='telephone', type='text', value='', required='')
          label Address
          textarea.form-control.input-xlarge(name='address', rows='3', required='')
          div
            button.btn.btn-lg.btn-primary.pull-right.btn-adminbar(type='submit') Add user
| @endsection

