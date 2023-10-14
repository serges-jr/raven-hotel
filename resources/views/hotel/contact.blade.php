@extends('layout.base')
@section('title','contact')
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
                    <h1 class="display-3 text-white mb-3 animated slideInDown">nous Contacter</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Booking Start -->
        @include('include.booking')
        <!-- Booking End -->


        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Nous contacter</h6>
                    <h1 class="mb-5"><span class="text-primary text-uppercase">contacter</span> pour toute demande</h1>
                </div>
                <div class="row g-4">
                    <div class="col-12">
                        <div class="row gy-4">
                            <div class="col-md-4">
                                <h6 class="section-title text-start text-primary text-uppercase">Réservation</h6>
                                <p><i class="fa fa-envelope-open text-primary me-2"></i>bookRaven@dev.com</p>
                            </div>
                            <div class="col-md-4">
                                <h6 class="section-title text-start text-primary text-uppercase">général</h6>
                                <p><i class="fa fa-envelope-open text-primary me-2"></i>raven@dev.com</p>
                            </div>
                            <div class="col-md-4">
                                <h6 class="section-title text-start text-primary text-uppercase">TECHNIQUE</h6>
                                <p><i class="fa fa-envelope-open text-primary me-2"></i>raven@hightech.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                        <iframe class="position-relative rounded w-100 h-100"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                            frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                            tabindex="0"></iframe>
                    </div>
                    <div class="col-md-6">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <form method="post" enctype="multipart/form-data">
                                @csrf
                                @include('include.flashe')
                                <div class="row g-3">
                                    @auth
                                    <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                                    <div class="col-md-6">
                                        @include('include.input',['class'=>'form-floating','label'=>'Your Name :','name'=>'name','value'=>\Illuminate\Support\Facades\Auth::user()->name])
                                    </div>
                                    <div class="col-md-6">
                                        @include('include.input',['class'=>'form-floating','label'=>'Your Email :','name'=>'email','value'=>\Illuminate\Support\Facades\Auth::user()->email])
                                    </div>
                                    @endauth
                                    @guest
                                    <div class="col-md-6">
                                        @include('include.input',['class'=>'form-floating','label'=>'Your Name :','name'=>'name'])
                                    </div>
                                    <div class="col-md-6">
                                        @include('include.input',['class'=>'form-floating','label'=>'Your Email :','name'=>'email'])
                                    </div>
                                    @endguest
                                    <div class="col-md 12">
                                        <div class="form-floating">
                                            <input type="text" name="sujet" id="sujet" class="form-control">
                                            <label for="" class="form-label text-capitalize">sujet requête :</label>
                                            @error('sujet')
                                                {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" name="message" id="message" style="height: 150px"></textarea>
                                            <label for="message" class="form-label">Message :</label>
                                            @error('message')
                                                {{ $message}}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">valider</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

            <!-- Newsletter Start -->
            @include('layout.newletter')
            <!-- Newsletter Start -->


            <!-- Footer Start -->
            @include('layout.footer')
            <!-- Footer End -->
@endsection
