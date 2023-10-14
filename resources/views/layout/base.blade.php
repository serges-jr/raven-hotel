<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">-->

    <!-- Favicon -->
    <link href="" rel="icon">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    {{-- <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> --> --}}

    <!-- Vendor CSS Files -->
    <link href="{{ asset('dashboard/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    {{-- <!-- <link href="{{ asset('dashboard/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('dashboard/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('dashboard/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('dashboard/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('dashboard/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('dashboard/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet"> --> --}}

    <!-- Template Main CSS File -->
    {{-- <!-- <link href="{{ asset('dashboard/assets/css/style.css') }}" rel="stylesheet"> --> --}}
    <link rel="stylesheet" href="{{ asset('FortAwesome/css/all.css') }}">

    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('sweetalert/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('DataTables/DataTables-1.13.6/css/dataTables.bootstrap5.min.css') }}">

    {{-- script --}}
     {{-- <script src="{{ asset('dashboard/assets/vendor/apexcharts/apexcharts.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('dashboard/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('dashboard/assets/vendor/chart.js/chart.umd.js') }}"></script> --}}
    {{-- <script src="{{ asset('dashboard/assets/vendor/echarts/echarts.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('dashboard/assets/vendor/quill/quill.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('dashboard/assets/vendor/simple-datatables/simple-datatables.js') }}"></script> --}}
    {{-- <script src="{{ asset('dashboard/assets/vendor/tinymce/tinymce.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('dashboard/assets/vendor/php-email-form/validate.js') }}"></script> --> --}}
    <script src="{{ asset('sweetalert/dist/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('FortAwesome/js/all.js') }}"></script>
    <!-- css manuel -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <script src="{{ asset('jquery/jquery-3.7.0.js') }}"></script>

</head>
@php
    $hotel = 'raven-hotel';
    $route = request()
        ->route()
        ->getName();
@endphp
<style>
    .testimonial {
        background: linear-gradient(rgba(15, 23, 43, .7), rgba(15, 23, 43, .7)), url(image/carousel-2.jpg);
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<body>

    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->

        <!-- Header Start -->
        <div class="container-fluid bg-dark px-0">
            {{-- <div class="row gx-0 bg-white d-none d-lg-flex">
                <div class="col-lg-7 px-3 text-start">
                    <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                        <i class="fa fa-map-marker-alt text-primary me-2"></i>
                        <p class="mb-0">route raven, douala, cameroun</p>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                        <i class="fa fa-phone-alt text-primary me-2"></i>
                        <p class="mb-0">+237 656064154</p>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                        <i class="fa fa-envelope text-primary me-2"></i>
                        <p class="mb-0">raven@dev.com</p>
                    </div>
                </div>
                <div class="col-lg-5 px-3 text-end">
                    <div class="d-inline-flex align-items-center py-2">
                        <a class="me-3" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="me-3" href=""><i class="fab fa-twitter"></i></a>
                        <a class="me-3" href=""><i class="fab fa-linkedin-in"></i></a>
                        <a class="me-3" href=""><i class="fab fa-instagram"></i></a>
                        <a class="" href=""><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div> --}}
            <div class="row gx-0">
                <div class="col-lg-3 bg-dark d-none d-lg-block">
                    <a href="index.html"
                        class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                        <h4 class="m-0 text-primary text-uppercase">{{ $hotel }}</h4>
                    </a>
                </div>
                <div class="col-lg-9">
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                            data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav py-0 d-flex align-items-center">
                                <a href="{{ route('hotel') }}" @class([
                                    'nav-item',
                                    'nav-link',
                                    'active' => str_starts_with($route, 'hotel'),
                                ])
                                    aria-current="page">Accueil</a>
                                <a href="{{ route('about') }}" @class([
                                    'nav-item',
                                    'nav-link',
                                    'active' => str_starts_with($route, 'about'),
                                ])
                                    aria-current="page">Apropos</a>
                                <a href="{{ route('service') }}" @class([
                                    'nav-item',
                                    'nav-link',
                                    'active' => str_starts_with($route, 'service'),
                                ])
                                    aria-current="page">Services</a>
                                <a href="{{ route('chambres') }}" @class([
                                    'nav-item',
                                    'nav-link',
                                    'active' => str_starts_with($route, 'chambres'),
                                ])
                                    aria-current="page">Chambres</a>
                                <div class="nav-item dropdown">
                                    <a href="#" @class([
                                        'nav-link',
                                        'dropdown-toggle',
                                        'active' => str_starts_with($route, 'team'),
                                        'active' => str_starts_with($route, 'temoin'),
                                    ]) data-bs-toggle="dropdown">Pages</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a href="{{ route('team') }}" class="dropdown-item">Mon Equipe</a>
                                        <a href="{{ route('temoin') }}" class="dropdown-item">Commentaire</a>
                                    </div>
                                </div>
                                <a href="{{ route('contact') }}" @class([
                                    'nav-item',
                                    'nav-link',
                                    'active' => str_starts_with($route, 'contact'),
                                ])
                                    aria-current="page">Contact</a>
                            </div>
                            <div class="navbar-nav py-0 d-flex align-items-center ms-auto px-3">
                                @auth
                                    <style>
                                        .logo-icon {
                                            border: 2px solid white;
                                            width: 40px;
                                            height: 40px;
                                            border-image-slice: fill;
                                            border-radius: 50%;
                                        }
                                    </style>
                                    <li class="nav-item dropdown pe-3">

                                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                                            @if (\Illuminate\Support\Facades\Auth::user()->avatar)
                                            <img src="{{ \Illuminate\Support\Facades\Auth::user()->imageUrl()}}" alt="Profile" class="rounded-circle" style="max-height: 36px;">
                                            @else
                                            <img src="{{ asset('image/avatar.jpg')}}" alt="Profile" class="rounded-circle" style="max-height: 36px;">
                                            @endif
                                          <span class="d-none d-md-block dropdown-toggle ps-2 text-capitalize" style="font-size: 14px;font-weight: 600;">{{ \Illuminate\Support\Facades\Auth::user()->name[0].'.'.\Illuminate\Support\Facades\Auth::user()->lastname }}</span>
                                        </a><!-- End Profile Iamge Icon -->

                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                                          <li class="dropdown-header">
                                            <h6>{{ \Illuminate\Support\Facades\Auth::user()->name.' '.\Illuminate\Support\Facades\Auth::user()->lastname }}</h6>
                                          </li>
                                          <li>
                                            <hr class="dropdown-divider">
                                          </li>

                                          <li>
                                            <a class="dropdown-item d-flex align-items-center" href="{{route('profile')}}">
                                              <i class="bi bi-person me-1"></i>
                                              <span> Mon Compte</span>
                                            </a>
                                          </li>
                                          <li>
                                            <hr class="dropdown-divider">
                                          </li>

                                          <li>
                                            <a class="dropdown-item d-flex align-items-center" href="{{route('profile')}}">
                                              <i class="bi bi-gear me-1"></i>
                                              <span> Parametre</span>
                                            </a>
                                          </li>
                                          <li>
                                            <hr class="dropdown-divider">
                                          </li>

                                          <li>
                                            <a class="dropdown-item d-flex align-items-center" href="{{route('contact')}}">
                                              <i class="bi bi-question-circle me-1"></i>
                                              <span> Besoin D'aide?</span>
                                            </a>
                                          </li>
                                          <li>
                                            <hr class="dropdown-divider">
                                          </li>

                                          <li>
                                            <form action="javascript:void" method="post" name="Logout" id="Logout">

                                                @method('post')
                                                @csrf
                                                <input type="hidden" name="id" id="id" value="{{\Illuminate\Support\Facades\Auth::user()->id }}">
                                                <button type="submit" class="dropdown-item d-flex align-items-center logout"><i class="bi bi-box-arrow-right me-1"></i>Deconnexion</button>
                                            </form>
                                          </li>

                                        </ul><!-- End Profile Dropdown Items -->
                                      </li><!-- End Profile Nav -->
                                @endauth
                                @guest
                                <a href="{{ route('login') }}" class="btn btn-primary btn-sm me-3">connexion</a>
                                <a href="{{route('sign')}}" class="btn btn-light btn-sm">s'incrire</a>
                                @endguest
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Header End -->



        @yield('content')




        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>


    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('DataTables/DataTables-1.13.6/js/dataTables.bootstrap5.min.js') }}"></script>

    <!-- JavaScript Libraries -->
    <script src="{{ asset('bootstrap/bootstrap-5.2.3/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->

    {{-- <!-- <script src="{{ asset('js/app.js') }}"></script> --> --}}
    <script src="{{ asset('js/main.js') }}"></script>
    {{-- <!-- <script src="{{ asset('dashboard/assets/js/main.js') }}"></script> --> --}}

</body>

</html>
