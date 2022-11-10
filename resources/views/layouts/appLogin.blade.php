<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LOGIN</title>

    <!-- Scripts -->
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/jquery-ui.min.css') }}">  
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('AdminLTE/dist/css/adminlte.min.css')}}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('jquery.js')}}"></script>
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">

</head>
<body class="login-page" style="min-height: 466px;">
    <div class="login box">
        <div>
            <img src="{{url('pkmlogo.png')}}" alt="PKM LOGO" width='180' class="d-block mx-auto my-auto" style="opacity: 2">
        </div>
            <h3 class="h1">UPTD Puskesmas <b>Segiri</b></h3>
        <div class=" card">
            <div class="card-header text-center">
                <h5 class="login-box-msg"><b>Login</b></h5>
                <form  method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email"  class="form-control" id="email" name="email" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                        <div class="input-group mb-3">
                        <input type="Password" class="form-control"  name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-key"></span>
                            </div>
                        </div>
                    </div>
                        <div class="social-auth-links text-center mt-2 mb-3">
                            <button type="submit" class="btn btn-block btn-primary">Login</button>
                        </div>
                </form>
            </div>
            <div class="card-footer">
                <p class="float-right mb-1"><b>Versi :</b> 1.0</p>
            </div>
    </div>
</body>
</html>
<script type="text/javascript">
    $('#a').click(function (){
        $('#email').attr('disabled', 'disabled');
    });
<script>
