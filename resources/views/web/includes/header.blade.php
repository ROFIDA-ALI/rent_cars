<header class="site-navbar site-navbar-target" role="banner">

    <div class="container">

      <div class="row align-items-center position-relative">
        <div class="col-3">
          <a href="{{ route('users') }}" class="btn btn-primary rounded-pill px-3 d-none d-lg-block">Join Us<i class="fa fa-arrow-right ms-3"></i></a>

          <div class="site-logo">

            <a href="index.html"><strong>CarRental</strong></a>

          </div>

        </div>

        <div class="col-9  text-right">

          <span class="d-inline-block d-lg-none"><a href="#" class=" site-menu-toggle js-menu-toggle py-5 "><span class="icon-menu h3 text-black"></span></a></span>

          <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">

            <ul class="site-menu main-menu js-clone-nav ml-auto ">

              <li class="active"><a href="{{route('index')}}" class="nav-link {{ request()->is('index') ? 'active' : '' }}">Home</a></li>
              <li><a href="{{route('listings')}}" class="nav-link {{ request()->is('listings') ? 'active' : '' }}">Listing</a></li>
              <li><a href="{{route('testimonials')}}" class="nav-link {{ request()->is('testimonials') ? 'active' : '' }}">Testimonials</a></li>
              <li><a href="{{route('blog')}}" class="nav-link {{ request()->is('blog') ? 'active' : '' }}">Blog</a></li>
              <li><a href="{{route('about')}}" class="nav-link {{ request()->is('about') ? 'active' : '' }}">About</a></li>
              <li><a href="{{route('addContact')}}" class="nav-link {{ request()->is('addContact') ? 'active' : '' }}">Contact</a></li>
            </ul>
          </div>



          </nav>

        </div>

  </header>
