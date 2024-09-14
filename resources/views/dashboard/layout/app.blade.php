<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashbord</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dashboard/dist/css/adminlte.min.css') }}">

    <!-- Toastr -->
    <link rel="stylesheet" href=" {{ asset('dashboard/plugins/toastr/toastr.min.css') }}">

    @stack('css')

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @include('dashboard.layout.partials.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('dashboard.layout.partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        {{-- breadCrumb --}}
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-12">
                        <div class="col-sm-12 text-center">
                            <h1 class="m-0">@yield('page_name')</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>

        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        @include('dashboard.layout.partials.sidebar')
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include('dashboard.layout.partials.footer')
    </div>
    <!-- ./wrapper -->

    @include('dashboard.layout.partials.scripts')

</body>

</html>
