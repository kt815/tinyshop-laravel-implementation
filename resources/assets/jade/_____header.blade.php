.navbar.navbar-default.navbar-static-top
  .container
    .navbar-header
      button.navbar-toggle(type='button', data-toggle='collapse', data-target='#responsive-menu')
        span.sr-only Open-navigation
        span.icon-bar
        span.icon-bar
        span.icon-bar
      a.navbar-brand(href='/')
        img(src='/images/TinyShopLogoW3.png', height='40')
    #responsive-menu.collapse.navbar-collapse
      ul.nav.navbar-nav.navigation.navmenu
        li
          a(href='/') Home
        li.dropdown
          a.dropdown-toggle(href='/catalog', data-toggle='dropdown')
            | Catalog 
            b.caret
          ul.dropdown-menu
            li
              a(href='/catalog/smartphones') smartphones
            li
              a(href='/catalog/accessories') accessories
        li
          a(href='/reviews') Reviews
      ul.nav.navbar-nav.navbar-right.navigation
        li
          a(href='/adminbar')
            i.fa.fa-wrench
            |  Administrator
        li.disabled
          a.cart(href='/cart')
            i.fa.fa-shopping-cart
            |  Cart: 2
