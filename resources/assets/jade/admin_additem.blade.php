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
        form.form-new-item(name='additem', action='/additem', enctype='multipart/form-data', method='post')
          label(for='select1') Category:
          select#select1.form-control(name='category')
            option(value='') -
            option(value='1') smartphones
            option(value='2') accessories
          label(for='select2') Brand:
          select#select2.form-control(name='brand')
            option(value='') -
            option(value='4') Acer
            option(value='9') Apple
            option(value='3') Asus
            option(value='5') Fly
            option(value='1') HTC
            option(value='2') Lenovo
            option(value='6') Nokia
            option(value='10') Samsung
            option(value='7') Sony
          label Model
          input.form-control.input-xlarge(name='model', type='text', value='', autocomplete='off', required='')
          label Characteristics
          textarea.form-control.input-xlarge(name='characteristics', value='', rows='3', required='')
          label Description
          textarea.form-control.input-xlarge(name='description', value='h', rows='3', required='')
          label Price
          input.form-control.input-xlarge(name='price', type='text', value='', autocomplete='off', required='')
          label Instock
          input.form-control.input-xlarge(name='instock', type='text', value='', max='3', autocomplete='off', required='')
          label Photo
          br
          .upload-file
            .input-group
              span.input-group-btn
                span.btn.btn-primary.btn-file
                  | Browse… 
                  input(type='file', name='file')
              input.form-control(type='text', readonly='')
            span.help-block
              | *.jpg only! Will resize your image to square proportion + adding white background!
          div
                button.btn.btn-lg.btn-primary.pull-right.btn-adminbar(type='submit') Add product
| @endsection

