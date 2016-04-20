doctype html
html(lang='en')
  head
    <title>Hello</title>
    meta(charset='utf-8')
    meta(name='description', content='My Cases')
    meta(name='author', content='my.cases')
    meta(http-equiv='Cache-Control', content='no-cache, no-store, must-revalidate')
    link(rel='stylesheet', href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css')
    link(rel='stylesheet', type='text/css', href='/css/app.css')
    link(rel='stylesheet', type='text/css', href='/css/cart.css')
    link(href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300', rel='stylesheet', type='text/css')
    script(src='https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js')
  body
    .header__gradient
    .page__wrapper    
        .container
            | @yield('content')
            .page__wrapper_center
                footer.footer
                  a.footer_a(href='mailto:s.buharow@gmail.com')
                    span.footer_span s.buharow@gmail.com            