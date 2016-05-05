| @extends('layout')
| @section('content')
.container.content
  .container
    .registration-form
      form.form-signin(action='/registrate', method='post')
        label Name
        input.form-control.input-xlarge(name='name', type='text', value='', required='')
        label Email
        input.form-control.input-xlarge(name='email', type='text', value='', required='')
        label Password
        input#password1.form-control.input-xlarge(type='password', name='password', value='', autocomplete='off', required='')
        label Repeat Password
        input#password2.form-control.input-xlarge(type='password', name='password2', value='', autocomplete='off', required='')
        .row
          .col-sm-12
            span#pwmatch.glyphicon.glyphicon-remove(style='color:#FF0004;')
            |  Passwords Match
        label Telephone
        input.form-control.input-xlarge(name='telephone', type='text', value='', required='')
        label Address
        textarea.form-control.input-xlarge(name='address', rows='3', required='')
        br
        div
          button.btn.btn-lg.btn-primary.btn-block(type='submit') Sign Up
| @endsection

