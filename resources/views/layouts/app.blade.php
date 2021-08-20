<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>
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
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css?v='.time())}}">
    <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
    @livewireStyles
</head>
<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @include('components.app.navbar')
            @include('components.app.sidebar')
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1><i class="{{$icon}} mr-2" style="font-size:15pt;"></i> {{ $title }}</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active">
                                <a href="{{url('dashboard')}}">Home</a>
                            </div>
                            <div class="breadcrumb-item">{{ $title }}</div>
                        </div>
                    </div>
                </section>
                @yield('content')
            </div>
            @include('components.app.footer')
        </div>
    </div>
    <!-- General JS Scripts -->
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <x-livewire-alert::scripts />
    <script src="{{asset('assets/modules/jquery.min.js')}}"></script>
    <script src="{{asset('assets/modules/popper.js')}}"></script>
    <script src="{{asset('assets/modules/tooltip.js')}}"></script>
    <script src="{{asset('assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('assets/modules/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/stisla.js')}}"></script>
    <!-- JS Libraries -->
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
    <script>
        function remove_form(judul, string, url){
            event.preventDefault(); // prevent form submit
            var linkURL = url;
            swal({
                title: judul,
                text: string,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = linkURL;
                } else {
                    swal({
                        title: "Dibatalkan !",
                        icon: "success",
                    })
                }
            });
        }
    </script>
    @yield('javascript')
</body>
</html>
