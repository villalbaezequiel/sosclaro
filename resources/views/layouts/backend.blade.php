<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SosClaro Backend">
    <meta name="author" content="Ezequiel Villalba">
    <title>Admin SosClaro - @yield('title')</title>
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('assets/backend/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <!-- plugin CSS-->
    <link href="{{ asset('assets/backend/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/css/sb-admin.css') }}" rel="stylesheet">
    
    @yield('css')
</head>

<body class="fixed-nav sticky-footer bg-dark" id="body-admin">
    <!-- Navigation / Sidebar -->
    @include('backend.components.sidebar')
  
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Header -->
            @include('backend.components.header')

            <div class="row">
                <div class="col-xl-12">@yield('message')</div>
            </div>
            
            @yield('nav-button')
            
            <!-- Content -->
            <div class="card mb-3">
                <div class="card-header">@yield('title')</div>
                <div class="card-body">@yield('content')</div>
                <div id="card-footer-info" class="card-footer small text-muted">@yield('content-footer')</div>
            </div>

        </div>

        @include('backend.components.footer')

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#body-admin">
            <i class="fa fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        @yield('modal')

        <!-- loading -->
        <div class="loading" style="display: none"></div>
        
        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('assets/backend/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/backend/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Core plugin JavaScript-->
        <script src="{{ asset('assets/backend/js/jquery.easing.min.js') }}"></script>
        <!-- Page level plugin JavaScript-->
<!--        <script src="{{ asset('assets/backend/js/Chart.min.js') }}"></script>-->
        <script src="{{ asset('assets/backend/js/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('assets/backend/js/dataTables.bootstrap4.js') }}"></script>
        <!-- Custom scripts for all pages-->
        <script src="{{ asset('assets/backend/js/sb-admin.min.js') }}"></script>
        <!-- Custom scripts for this page-->
        <script src="{{ asset('assets/backend/js/sb-admin-datatables.min.js') }}"></script>
<!--        <script src="{{ asset('assets/backend/js/sb-admin-charts.min.js') }}"></script>-->
        @yield('javascript')
    </div>
</body>

</html>
