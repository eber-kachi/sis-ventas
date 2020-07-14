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
  <link type="text/css" href="{{ asset('css/argon.css')}}" rel="stylesheet">
  <link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
</head>

<body>
<!-- Sidenav -->

<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header  align-items-center">
      <a class="navbar-brand" href="javascript:void(0)">
        <img src="{{'/img/brand/blue.png'}}" class="navbar-brand-img" alt="...">
      </a>
    </div>
    <div class="navbar-inner">
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('categories.category.index')}}">
              <i class="fa fa-list-alt text-primary"></i>
              <span class="nav-link-text">Categoria</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="icons.html">
              <i class="fa fa-list-alt text-orange"></i>
              <span class="nav-link-text">SubCategoria</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="map.html">
              <i class="fa fa-shopping-basket text-primary"></i>
              <span class="nav-link-text">Producto</span>
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
  <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
    <div class="container-fluid">
      <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
        <!-- Navbar links -->
        <ul class="d-xl-block d-none">
{{--         DONT DELETE FOR THE GRID  --}}
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle font-weight-bolder" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
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
        </ul>
        <ul class="navbar-nav d-lg-block d-xl-none">
          <li class="nav-item">
            <button class="btn btn-primary" id="hideOrShow">
              <i class="fas fa-bars"></i>
            </button>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Header -->
  <div class="header bg-primary pb-6" >
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                <li class="breadcrumb-item active" aria-current="page">Default</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--6">
      @yield('content')
  </div>
</div>

</body>

</html>

<!-- Argon Scripts -->
<!-- Core -->
<script src="{{asset('vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{asset('vendor/js-cookie/js.cookie.js') }}"></script>
<script src="{{asset('vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
<script src="{{asset('vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
<!-- Argon JS -->
<script src="{{asset('js/argon.js') }}"></script>
<script>
    $(document).ready(function () {
        let sidenav = $('body');
        $("#hideOrShow").click(function () {
            if (sidenav.attr('class') === 'g-sidenav-hidden' || sidenav.attr('class') === 'g-sidenav-show g-sidenav-hidden') {
                sidenav.attr('class', 'g-sidenav-show nav-open g-sidenav-hidden');
            } else {
                sidenav.attr('class', 'g-sidenav-show g-sidenav-hidden');
            }
            // g-sidenav-show g-sidenav-hidden
        });
    });
</script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
@yield('script')

