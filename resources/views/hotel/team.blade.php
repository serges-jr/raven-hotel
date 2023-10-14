@extends('layout.base')
@section('title','nos Employe')
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
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Nos Employes</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Nos Employes</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Booking Start -->
        @include('include.booking')
        <!-- Booking End -->


        <!-- Team Start -->
        <div class="container-xxl py-5">
            <div class="container">

                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Notre équipe</h6>
                    <h1 class="mb-5">Découvrez notre <span class="text-primary text-uppercase">personnel</span></h1>
                </div>
                <div class="row g-4">
                    @php $nb = 0.1 @endphp
                @foreach ($users as $user)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="{{$nb}}s">
                    <div class="rounded shadow overflow-hidden">
                        <div class="position-relative">
                            @if ($user->avatar)
                            <img class="img-fluid" style="width: 100%;height: 300px;object-fit: cover;" src="{{$user->imageUrl()}}" alt="">
                            @else
                                @if ($user->sexe == 1)
                                <img class="img-fluid" style="width: 100%;height: 300px;object-fit: cover;" src="image/boy.jpeg" alt="">
                                @else
                                <img class="img-fluid" style="width: 100%;height: 300px;object-fit: cover;" src="image/girl.jpeg" alt="">
                                @endif
                            @endif
                            {{-- <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div> --}}
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">{{$user->name.' '.$user->lastname}}</h5>
                            <small>{{$user->fonction}}</small>
                        </div>
                    </div>
                </div>
                @php $nb += 0.2 @endphp
                @endforeach
                </div>
            </div>
        </div>
        <!-- Team End -->
            <!-- Newsletter Start -->
            @include('layout.newletter')
            <!-- Newsletter Start -->


            <!-- Footer Start -->
            @include('layout.footer')
            <!-- Footer End -->
@endsection
