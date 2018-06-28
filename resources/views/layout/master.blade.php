<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin - Start Bootstrap Template</title>
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('my/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('my/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="{{ asset('my/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('my/css/sb-admin.css') }}" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
@include('layout.navigation')

<div class="content-wrapper">
    <div class="container-fluid">
        @yield('content')
    </div>

   @include('layout.footer')

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('my/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('my/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('my/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Page level plugin JavaScript-->
    <script src="{{ asset('my/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('my/vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('my/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('my/js/sb-admin.min.js') }}"></script>
    <!-- Custom scripts for this page-->
    <script src="{{ asset('my/js/sb-admin-datatables.min.js') }}"></script>
    <script src="{{ asset('my/js/sb-admin-charts.min.js') }}"></script>
</div>
</body>
</html>