<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? config('app.name') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    {{-- Flaticon --}}
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}">
    {{-- Bootstrap 4.6 --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dist/css/bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- jQuery UI -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-ui/jquery-ui.css') }}">
    {{-- script-head --}}
    @yield('script-head')
    {{-- ./script-head --}}
    @livewireStyles
</head>

{{-- <body class="hold-transition layout-top-nav layout-fixed layout-navbar-fixed text-sm"> --}}
<body class="hold-transition layout-fixed sidebar-mini">
    <div class="wrapper">
        <x-backsite.navbar></x-backsite.navbar>
        <div class="content-wrapper">
            <x-backsite.header>
                <x-slot name="welcome">
                {{isset($welcome) ? $welcome : ''}}
                </x-slot>
                <x-slot name="breadcrumb">
                {{isset($breadcrumb) ? $breadcrumb : ''}}
                </x-slot>
            </x-backsite.header>
            <section class="content">
                <div class="container-fluid">
                    {{-- content --}}
                    @yield('content')
                    {{-- end content --}}
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <x-backsite.footer></x-backsite.footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>$.widget.bridge('uibutton', $.ui.button);</script>
    <!-- Bootstrap 4.6.1-->
    <script type="text/javascript" src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <!-- Bootstrap 4-->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.js?v=3.2.0') }}"></script>
    <!-- init bootstrap tooltip -->
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
          })
    </script>
    {{-- script tambahan --}}
    @yield('script-foot')
    {{-- ./script tambahan --}}
    @livewireScripts
</body>

</html>
