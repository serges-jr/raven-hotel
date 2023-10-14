<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">-->

    <!-- Favicon -->
    <link href="" rel="icon">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> -->

    <!-- Vendor CSS Files -->
    <link href="{{asset('dashboard/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('dashboard/assets/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('FortAwesome/css/all.css') }}">

    <link rel="stylesheet" href="{{ asset('sweetalert/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('DataTables/DataTables-1.13.6/css/dataTables.bootstrap5.min.css') }}">

    {{--    script--}}
    <script src="{{ asset('jquery/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('sweetalert/dist/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('FortAwesome/js/all.js') }}"></script>

</head>
<body>
<!-- ======= Header ======= -->

<main>
    @yield('content')
</main>


<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<script src="{{ asset('jquery/jquery-3.7.0.js') }}"></script>
<script src="{{ asset('DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('DataTables/DataTables-1.13.6/js/dataTables.bootstrap5.min.js') }}"></script>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/main.js') }}"></script>

</body>
</html>
