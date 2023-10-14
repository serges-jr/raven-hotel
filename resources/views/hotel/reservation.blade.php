@extends('layout.base')
@section('title', 'reservation')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(image/carousel-1.jpg);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">reservation</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Raven-Hotel</a></li>
                        <li class="breadcrumb-item"><a href="#">Chambre</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Confirmation</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->



    <!-- Booking Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">confirmer la reservation</h6>
            </div>
            <div class="row g-5 mt-2">
                <div class="col-lg-6">
                    <div class="card shadow p-3 rounded-2">
                        <img src="{{ $post->imageUrl() }}" class="img-fluid w-100 rounded-2">
                        <h3 class="text-capitalize fs-3 mt-3">{{ $post->category->name }}</h3>
                        <span>{{ $post->prix }}nuit</span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card shadow p-2 rounded-2">
                        <div class="card-title">
                            <h3 class="text-uppercase fw-light fs-4">détail réservation</h3>
                        </div>
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <form method="post" enctype="multipart/form-data">
                                @csrf
                                @include('include.flashe')
                                <div class="row g-3">
                                    @auth
                                        <div class="col-md-6">
                                            <input type="hidden" name="user_id"
                                                value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
                                            <div class="form-floating">
                                                <input type="text" class="form-control radius" id="name"
                                                    value="{{ \Illuminate\Support\Facades\Auth::user()->name }}">
                                                <label for="name">Your Name :</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="email" class="form-control radius" id="email"
                                                    value="{{ \Illuminate\Support\Facades\Auth::user()->email }}">
                                                <label for="email">Your Email :</label>
                                            </div>
                                        </div>
                                    @endauth
                                    @guest
                                        <input type="hidden" name="user_id" value="0">
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" name="name" class="form-control radius" id="name"
                                                    placeholder="Your Name">
                                                <label for="name">Your Name :</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="email" name="email" class="form-control radius" id="email"
                                                    placeholder="Your Email">
                                                <label for="email">Your Email :</label>
                                            </div>
                                        </div>
                                    @endguest
                                    <div class="col-md-6">
                                        <div class="col form-floating">
                                            <input type="date" class="form-control radius" name="dateDebut"
                                                id="dateDebut" />
                                            <label for="" class="form-label">date Debut :</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col form-floating">
                                            <input type="date" class="form-control radius" name="dateFin"
                                                id="dateFin" />
                                            <label for="" class="form-label">date Fin :</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="hidden" name="chambre_id" value="{{ $post->id }}">
                                        <div class="form-floating">
                                            @if ($post->id)
                                                <input type="text" name="" id=""
                                                    class="form-control radius"
                                                    value="{{ $post->category->name . ' ' . $post->numero }}">
                                            @endif
                                            <label for="select3">Nom/Numero de chambre</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            @if ($post->id)
                                                <input type="text" name="" id="prix"
                                                    class="form-control radius" value="{{ $post->prix }}">
                                            @endif
                                            <label for="" class="from-label">prix de nuit</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" name="nbjour" id="nbNuit" class="form-control">
                                            <label for="" class="form-label">Nombre de nuit :</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" name="montant" id="Montant" class="form-control">
                                            <label for="" class="form-label">Montant total :</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control radius" placeholder="Special Request" name="message" id="message"
                                                style="height: 100px"></textarea>
                                            <label for="message">Requette Specialle</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">Reserver</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->
@endsection
