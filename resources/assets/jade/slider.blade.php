#carousel.carousel.slide
  // sliders indicators
  ol.carousel-indicators
    li(calss='active', data-target='#carousel', data-slide-to='0')
    li(data-target='#carousel', data-slide-to='1')
    li(data-target='#carousel', data-slide-to='2')
  // slide
  .carousel-inner
    .item.active
      a(href='/item/50')
        img(src='/images/LenovoS660PW.png', alt='')
    .item
      a(href='/item/19')
        img(src='/images/HTC_Desire_EyePW.png', alt='')
    .item
      a(href='/item/43')
        img(src='/images/Nokia_Lumia635PW.png', alt='')
  // sliding arrows
  a.left.carousel-control(href='#carousel', data-slide='prev')
    span.glyphicon.glyphicon-chevron-left
  a.right.carousel-control(href='#carousel', data-slide='next')
    span.glyphicon.glyphicon-chevron-right
br
br
br