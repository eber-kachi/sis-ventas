<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>{{config('app.name')}} | @yield('title')</title>
  <!-- Favicon -->
  <link href="{{ asset('img/brand/favicon.png')}}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{ asset('vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
  <link href="{{ asset('vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="{{ asset('css/argon.css?v=1.0.0')}}" rel="stylesheet">
</head>

<body>
<!-- Sidenav -->

<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header  align-items-center">
      <a class="navbar-brand" href="javascript:void(0)">
        <img src='img/brand/blue.png' class="navbar-brand-img" alt="...">
      </a>
    </div>
    <div class="navbar-inner">
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('categories.category.index')}}">
              <i class="ni ni-tv-2 text-primary"></i>
              <span class="nav-link-text">Category</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="icons.html">
              <i class="ni ni-planet text-orange"></i>
              <span class="nav-link-text">Subcategory</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="map.html">
              <i class="ni ni-pin-3 text-primary"></i>
              <span class="nav-link-text">Product</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.html">
              <i class="ni ni-single-02 text-yellow"></i>
              <span class="nav-link-text">New Product</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tables.html">
              <i class="ni ni-bullet-list-67 text-default"></i>
              <span class="nav-link-text">Tables</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.html">
              <i class="ni ni-key-25 text-info"></i>
              <span class="nav-link-text">Login</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.html">
              <i class="ni ni-circle-08 text-pink"></i>
              <span class="nav-link-text">Register</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="upgrade.html">
              <i class="ni ni-send text-dark"></i>
              <span class="nav-link-text">Upgrade</span>
            </a>
          </li>
        </ul>
        <!-- Divider -->
{{--        <hr class="my-3">--}}
        <!-- Heading -->
{{--        <h6 class="navbar-heading p-0 text-muted">--}}
{{--          <span class="docs-normal">Documentation</span>--}}
{{--        </h6>--}}
        <!-- Navigation -->
      </div>
    </div>
  </div>
</nav>
<!-- Main content -->
<div class="main-content" id="panel">
  <!-- Topnav -->
  <nav class="navbar navbar-top navbar-expand navbar-dark bg-default border-bottom">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar links -->
        <ul class="navbar-nav align-items-center  ml-md-auto ">

        </ul>
        <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
          @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
            @endif
          @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>
  <!-- Header -->
<!-- Header -->
@yield('content')
  <!-- Footer -->
{{--    <footer class="footer pt-0">--}}
{{--      <div class="row align-items-center justify-content-lg-between">--}}
{{--        <div class="col-lg-6">--}}
{{--          <div class="copyright text-center  text-lg-left  text-muted">--}}
{{--            &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <div class="col-lg-6">--}}
{{--          <ul class="nav nav-footer justify-content-center justify-content-lg-end">--}}
{{--            <li class="nav-item">--}}
{{--              <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--              <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--              <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--              <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>--}}
{{--            </li>--}}
{{--          </ul>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </footer>--}}
  </div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="{{asset('vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!-- Argon JS -->
<script src="{{asset('js/argon.js?v=1.0.0') }}"></script>
</body>

</html>

