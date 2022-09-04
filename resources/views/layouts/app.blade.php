<!DOCTYPE html>
<html lang="en" style="height: auto;">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Puskesmas Segiri</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE/jquery-ui.min.css') }}">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{asset('jquery.js')}}"></script>
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
  @livewireStyles
</head>
<body class="sidebar-mini sidebar- footer-fixed layout-fixed" style="height: auto;">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <div class="col-md-11 ">
        <div class="float-right">
          <a class="text-dark " href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </div>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="{{Route('home')}}" class="brand-link">
        <img src="{{url('pkmlogo.png')}}" alt="PKM LOGO" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Puskesmas Segiri</span>
      </a>
      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
             <b class="text-white">{{Auth::user()->name}}</b>
          </div>
        </div>
        @include('layouts.nav')
      </div>
    </aside>
    <div class="content-wrapper" style="min-height: 1000.8px;">
        <div class="content-header">
          @yield('breadcrumb')
        </div>
        <section class="content-fluid">
                  @yield('content')
        </section>
    </div>
  
    <footer class="main-footer ">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.0
      </div>
      <strong>Copyright &copy; 2022 <a href="/">UPTD Puskesmas</a>.</strong> SEGIRI 
    </footer>

<!-- jQuery -->
<script src=" {{asset('AdminLTE/plugins/jquery/jquery.min.js')}} "></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>

<script type="text/javascript">
        $(document).ready(function(){
          $(".number").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
              return false;
            }
          });
        });
       
</script>



@livewireScripts
</body>
</html>