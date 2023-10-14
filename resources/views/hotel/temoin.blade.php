@extends('layout.base')
@section('title','temoignage')
@section('content')
@php
    $hotel = 'raven-hotel';
    $route = request()
        ->route()
        ->getName();
@endphp

        <!-- Page Header Start -->
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url(image/carousel-1.jpg);">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Témoignage</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Témoignage</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Booking Start -->
        @include('include.booking')
        <!-- Booking End -->


        <!-- Testimonial Start -->
        @include('include.temoin')
        <!-- Testimonial End -->

            <!-- Newsletter Start -->
            @include('layout.newletter')
            <!-- Newsletter Start -->


            <!-- Footer Start -->
            @include('layout.footer')
            <!-- Footer End -->
@endsection
