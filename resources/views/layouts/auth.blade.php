<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Login </title>
        <!-- Font -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <!-- General CSS Files -->
        <link rel="stylesheet" href="{{asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/modules/fontawesome/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/modules/bootstrap-social/bootstrap-social.css')}}">
        <!-- Template CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/custom.css?v='.time())}}">
        <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
    </head>
    <body>
        <div id="app">
            @yield('content')
        </div>
        <!-- General JS Scripts -->
        <script src="{{asset('assets/modules/jquery.min.js')}}"></script>
        <script src="{{asset('assets/modules/popper.js')}}"></script>
        <script src="{{asset('assets/modules/tooltip.js')}}"></script>
        <script src="{{asset('assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
        <script src="{{asset('assets/modules/moment.min.js')}}"></script>
        <script src="{{asset('assets/js/stisla.js')}}"></script>
        
        <!-- JS Libraies -->

        <!-- Page Specific JS File -->
        
        <!-- Template JS File -->
        <script src="{{asset('assets/js/scripts.js')}}"></script>
        <script src="{{asset('assets/js/custom.js')}}"></script>
        <script>
            var notif = function(){
                $("#notif").fadeOut('slow');
            };
            setTimeout(notif, 5000);
        </script>
        @yield('javascript')
    </body>
</html>
