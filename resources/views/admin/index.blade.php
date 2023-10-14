@extends('layout.board')
@section('title','dashboard')
@section('content')
<div class="row mt-2">
    <div class="col-lg-8 col-sm mb-5 mx-auto">
        <h1 class="fs-4 text-center lead text-uppercase">raven Hotel</h1>
    </div>
</div>
<div class="dropdown-divider border-bottom border-warning mb-2"></div>
    <h1 class="text-uppercase">dashboard</h1>
<div class="dropdown-divider border-bottom border-warning mb-3"></div>
<div class="container">
    <div class="row mb-5">
        <div class="col border border-1 d-flex flex-column justify-content-center align-items-center rounded-2 pt-1">
            <h3 class="text-capitalize fs-5">client présent</h3>
            <span class="fs-2">{{count($users)}}</span>
        </div>
        <div class="col border border-1 d-flex flex-column justify-content-center align-items-center rounded-2 ms-2">
            <h3 class="text-capitalize fs-5">nouvelle réservations</h3>
            <span class="fs-2">{{count($users)}}</span>
        </div>
        <div class="col border border-1 d-flex flex-column justify-content-center align-items-center rounded-2 ms-2">
            <h3 class="text-capitalize fs-5 text-center">nouvelle requêtes</h3>
            <span class="fs-2">{{count($nrequetes)}}</span>
        </div>
        <div class="col border border-1 d-flex flex-column justify-content-center align-items-center rounded-2 ms-2">
            <h3 class="text-capitalize fs-5">nouveau commentaires</h3>
            <span class="fs-2">{{count($nComments)}}</span>
        </div>
    </div>
</div>
<div class="dropdown-divider border-bottom border-warning mt-4"></div>
<h3 class="text-capitalize fw-light my-1">analyse des réservations</h3>
<div class="dropdown-divider border-bottom border-warning mb-1"></div>
<div class="container">
    <div class="row mt-5">
        <div class="col border border-1 d-flex flex-column justify-content-center align-items-center rounded-2">
            <h3 class="text-capitalize fs-5">total réservation</h3>
            <span class="fs-2">{{count($treservations)}}</span><br>
            <span class="fs-2">{{$sommeR}}fcfa</span>
        </div>
        <div class="col border border-1 d-flex flex-column justify-content-center align-items-center rounded-2 ms-2">
            <h3 class="text-capitalize fs-5">réservations actives</h3>
            <span class="fs-2">{{count($Areservation)}}</span>
        </div>
        <div class="col border border-1 d-flex flex-column justify-content-center align-items-center rounded-2 ms-2">
            <h3 class="text-capitalize fs-5 text-center">réservations annulées</h3>
            <span class="fs-2">{{count($users)}}</span>
        </div>
        <div class="col"></div>
    </div>
</div>
<div class="dropdown-divider border-bottom border-warning mt-1"></div>
<h3 class="text-capitalize fw-light my-1">clients,requêtes,commentaires</h3>
<div class="dropdown-divider border-bottom border-warning mb-1"></div>
<div class="container">
    <div class="row mt-5">
        <div class="col border border-1 d-flex flex-column justify-content-center align-items-center rounded-2">
            <h3 class="text-capitalize fs-5">total clients</h3>
            <span class="fs-2">{{count($tUsers)}}</span>
        </div>
        <div class="col border border-1 d-flex flex-column justify-content-center align-items-center rounded-2 ms-2">
            <h3 class="text-capitalize fs-5">clients présent</h3>
            <span class="fs-2">{{count($users)}}</span>
        </div>
        <div class="col border border-1 d-flex flex-column justify-content-center align-items-center rounded-2 ms-2">
            <h3 class="text-capitalize fs-5">total requêtes</h3>
            <span class="fs-2">{{count($trequetes)}}</span>
        </div>
        <div class="col border border-1 d-flex flex-column justify-content-center align-items-center rounded-2 ms-2">
            <h3 class="text-capitalize text-dark fs-5 text-center">total commentaires</h3>
            <span class="text-dark fs-2">{{count($tComments)}}</span>
        </div>
    </div>
</div>
@endsection
