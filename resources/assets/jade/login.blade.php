| @extends('layout')
| @section('content')
.container.content
  .container
    div
      form.form-signin(action='/login', method='post')
        h2.form-signin-heading Please sign in
        input#inputEmail.form-control(name='email', type='email', autofocus='', required='', placeholder='Email address')
        label.sr-only(for='inputPassword') Password
        input#inputPassword.form-control(name='password', type='password', required='', placeholder='Password', autocomplete='off')
        br
        button.btn.btn-lg.btn-primary.btn-block(type='submit') Sign in
        .panel.panel-warning(role='alert') You will redirect to "/" upon login
| @endsection

