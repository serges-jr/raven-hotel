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
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <img src="assets/img/logo.png" alt="">
            <span class="d-none d-lg-block text-uppercase">raven-hotel</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('room.index')}}">
                <i class="bi bi-menu-button-wide"></i><span>chambres</span>
            </a>
        </li><!-- End chambres Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('reserver')}}">
                <i class="bi bi-menu-button-wide"></i><span>reservation</span>
            </a>
        </li><!-- End reservation Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('menage')}}">
                <i class="bi bi-menu-button-wide"></i><span>Etat des chambres</span>
            </a>
        </li><!-- End Etat des chambres Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('users') }}">
                <i class="bi bi-people"></i><span>users</span>
            </a>
        </li><!-- End users Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('equipment') }}">
                <i class="bi bi-journal-text"></i><span>equipement</span>
            </a>
        </li><!-- End equipement Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('feature') }}">
                <i class="bi bi-journal-text"></i><span>installation</span>
            </a>
        </li><!-- End installation Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('requetes') }}">
                <i class="bi bi-layout-text-window-reverse"></i><span>requêtes</span>
            </a>
        </li><!-- End requêtes Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('comments') }}">
                <i class="bi bi-layout-text-window-reverse"></i><span>commentaire</span>
            </a>
        </li><!-- End commentaire Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>plats dejeuner/dîner</span>
            </a>
        </li><!-- End plats dejeuner/dîner Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('category') }}">
                @php $g= 'bi bi-gem' @endphp
                <i class="bi bi-gem"></i><span>category</span>
            </a>
        </li><!-- End category Nav -->

        <li class="nav-item">
                <form action="javascript:void" method="post" name="Logout" id="Logout" class="nav-link collapsed">

                    @method('post')
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{\Illuminate\Support\Facades\Auth::user()->id }}">
                    <button type="submit" class="dropdown-item d-flex align-items-center logout"><i class="bi bi-box-arrow-right"></i><span>logout</span></button>
                </form>
        </li><!-- End logout Nav -->
    </ul>

</aside><!-- End Sidebar-->
<main id="main" class="main">
    @include('include.flashe')
    @yield('content')
</main>

<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>Raven@Dev</span></strong>. All Rights Reserved
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<script src="{{ asset('jquery/jquery-3.7.0.js') }}"></script>
<script src="{{ asset('DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('DataTables/DataTables-1.13.6/js/dataTables.bootstrap5.min.js') }}"></script>

<script src="{{ asset('js/app.js') }}"></script>
{{-- <script src="{{ asset('dashboard/assets/js/main.js') }}"></script> --}}

</body>
</html>
