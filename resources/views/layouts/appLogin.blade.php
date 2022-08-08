<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}" rel="stylesheet">

</head>
<body class="login-page" style="min-height: 466px;">
    <div class="login box">
        <div class=" card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{route('login')}}" class="h1">UPTD Puskesmas <b>Segiri</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Login</p>
                <form  method="POST" action="{{ route('login') }}">
                    @csrf`
                    <div class="input-group mb-3">
                        <input type="email"  class="form-control" id="email" name="email" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="far fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                        <div class="input-group mb-3">
                        <input type="Password" class="form-control"  name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="far fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                        <div class="social-auth-links text-center mt-2 mb-3">
                            <button type="submit" class="btn btn-block btn-primary">Login</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
    $('#a').click(function (){
        $('#email').attr('disabled', 'disabled');
    });
<script>
