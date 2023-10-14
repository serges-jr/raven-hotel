@extends('layout.base')
@section('title', 'nos chambres')
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
                <h1 class="display-3 text-white mb-3 animated slideInDown">Nos Chambres</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Rooms</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Booking Start -->
    @include('include.booking')
    <!-- Booking End -->


    <!-- Room Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Nos Chambres</h6>
                <h1 class="mb-5">Explorer Nos <span class="text-primary text-uppercase">Chambres</span></h1>
            </div>
            <div class="row g-4 bookRoom">
                @php $nb = 0.1 @endphp
                @foreach ($rooms as $room)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ $nb }}s">
                            <div class="room-item shadow rounded overflow-hidden">
                                <div class="position-relative">
                                    <img class="img-fluid" src="{{ $room->imageUrl() }}" alt="">
                                    <small
                                        class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">{{ $room->prix }}Fcfa/nuit</small>
                                </div>
                                <div class="p-4 mt-2">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h5 class="mb-0">{{ $room->category->name }}</h5>
                                        <div class="ps-2">
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                            <small class="fa fa-star text-primary"></small>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-3">
                                            @foreach ($equipments as $equipment)
                                            @php
                                                $p = explode(',', $room->equipments);
                                            @endphp
                                            @foreach ($p as $ps)
                                                @if ($ps == $equipment->id)
                                                    <small class="border-end me-3 pe-1"><i
                                                            class="{{ $equipment->icon }} text-primary me-2"></i>{{ $equipment->name }}</small>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </div>
                                    <p class="text-body mb-3">Erat ipsum justo amet duo et elitr dolor, est duo duo eos
                                        lorem sed
                                        diam stet diam sed stet lorem.</p>
                                    <div class="d-flex justify-content-between">
                                        <a class="btn btn-sm btn-primary rounded py-2 px-4"
                                            href="{{ route('chambre', ['id' => $room->id]) }}">Voir
                                            détails</a>
                                        <a class="btn btn-sm btn-dark rounded py-2 px-4"
                                            href="{{ route('bookOne', ['id' => $room->id]) }}" title="reserver"
                                            data-id="{{ $room->id }}">réservez</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @php $nb+=0.2 @endphp
                @endforeach
            </div>
        </div>
    </div>
    <!-- Room End -->


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
