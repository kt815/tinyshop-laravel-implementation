
<div class="navbar navbar-default navbar-static-top">
  <div class="container">
    <!-- navbar-->
    <div class="navbar-header">
      <button type="button" data-toggle="collapse" data-target="#responsive-menu" class="navbar-toggle"><span class="sr-only">Open-navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      <!-- <a href="/" class="navbar-brand"><i class="fa fa-arrows-v"></i>Tiny Shop</a>--><a href="/" class="navbar-brand"><img src="/images/TinyShopLogoW3.png" height="40"/></a>
    </div>
    <div id="responsive-menu" class="collapse navbar-collapse">
      <ul class="nav navbar-nav navigation navmenu">
        <li><a href="/">Home</a></li>
        <!-- <li><a href="/catalog"></a></li>-->
        <li class="dropdown"><a href="/catalog" data-toggle="dropdown" class="dropdown-toggle">Catalog <b class="caret"></b></a>
          <ul class="dropdown-menu">
              @foreach ($categories as $category)
                <li><a href="/catalog/{{ $category->category }}">{{ $category->category }}</a></li>
              @endforeach
          </ul>
        </li>
        <li><a href="/reviews">Reviews</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right navigation">


  @if(Auth::check())

      @if (Auth::user()->isAdmin())

        <li>
          <a href="/adminbar"><i class="fa fa-wrench"></i> Administrator</a>
        </li>

      @elseif (Auth::user()->isUser())

        <li class="dropdown">
          <a href="/logreg" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-sign-in"></i> {{ Auth::user()->email }}</a>
          <ul class="dropdown-menu">
            <li><a href="/logout">Logout</a></li>
          </ul>
        </li>

      @endif

  @else

        <li class="dropdown">
          <a href="/logreg" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-sign-in"></i> Login / Registrate</a>
          <ul class="dropdown-menu">
            <li><a href="/login">Login</a></li>
            <li class="divider"></li>
            <li><a href="/registration">Registrate</a></li>
          </ul>
        </li>


  @endif

        <li><a href="/cart" class="cart"><i class="fa fa-shopping-cart"></i> Cart: {{ cart_cout() }}</a></li>
      </ul>
    </div>
  </div>
</div>