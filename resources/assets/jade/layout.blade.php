doctype html
html(lang='en')
  head
    meta(charset='utf-8')
    meta(http-equiv='X-UA-Compatible', content='IE=edge')
    meta(name='viewport', content='width=device-width, initial-scale=1')
    title LenovoShop
    link(rel='stylesheet', href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css')
    link(rel='stylesheet', href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css')        
    link(href='/css/bootstrap-theme.css', rel='stylesheet')
    link(href='/css/cart.css', rel='stylesheet')
  body
    script(src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js')
    script(src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js')
    script(src='/js/navbar_tab_activator.js')
    script(src='/js/admin_bar_tab_activator.js')
    script(src='/js/file_input.js')
    script(src='/js/catalog_div_height.js')
    script(src='/js/registration_form.js')
    script(src='/js/admin_orders_activator.js')
    script(src='/js/starplugin.js')
    | @include('header')
    | @yield('content')
    | @include('footer')
