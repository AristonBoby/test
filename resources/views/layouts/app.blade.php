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
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  @livewireStyles
</head>
<body class="sidebar-mini sidebar-collapse footer-fixed layout-fixed" style="height: auto;">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="{{Route('home')}}" class="brand-link">
        <span class="brand-text font-weight-light">Puskesmas Segiri</span>
      </a>
      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
           
          </div>
        </div>
        @include('layouts.nav')
      </div>
    </aside>
    <div class="content-wrapper" style="min-height: 1000.8px;">
      <div class="container-fluid">
        @yield('breadcrumb')
        <section class="content-header">
          @yield('header')
        </section>
        <section class="content-fluid">
                  @yield('content')
        </section>
      </div>
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
<script src="{{ asset('AdminLTE/jquery-ui.min.js') }} "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>

<script type="text/javascript">
        $(document).ready(function(){
          $('#datepicker').datepicker('getDate','altFormat','')
        });

      // Inputan Number//
      $(function(){
        $(".number").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
              return false;
            }
          });
      });
    //----//
</script>

@livewireScripts
</body>
</html>
<!--
  { defaultDate : new Date(),
            format:'yyyy-mm-dd',
            autoclose:true,
          }