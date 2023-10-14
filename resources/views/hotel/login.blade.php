@extends('layout.base')
@section('title', 'login')
@section('content')
<style>
    .radius {
        border-radius: 0.375rem;
    }

    .page-header {
        padding: 0;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        background-size: cover;
        background-position: 50%;
        height: 80vh;
    }

    .page-header .container {
        z-index: 1;
    }

    .oblique {
        transform: skewX(-10deg);
        overflow: hidden;
        width: 60%;
        right: -10rem;
        border-bottom-left-radius: 0.75rem;
    }

    .oblique .oblique-image {
        transform: skewX(10deg);
    }

    .bg-cover {
        background-size: cover;
    }
</style>

@if(session('status'))
<div class="alert alert-danger">
    {{ session('status') }}
</div>
@endif

    <section>
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                        <div class="card card-plain mt-5">
                            <div class="card-header pb-0 text-left bg-transparent">
                                <h3 class="font-weight-bolder text-primary">Bienvenue à nouveau</h3>
                                <p class="mb-0">Entrez votre Email et votre mot de passe pour vous connecter</p>
                            </div>
                            <div class="card-body">
                                <form method="post" class="gap-3">
                                    @csrf
                                    <div class="form-group mb-2">
                                        <label for="email" class="form-label">Nom :</label>
                                        <input type="text" name="name" id="email" class="form-control radius"
                                            value="@if (session('email')) {{ session('email') }} @endif @if (session('name')) {{ session('name') }} @endif">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="password" class="form-label">Mot De Passe :</label>
                                        <input type="password" name="password" id="password"
                                            class="form-control radius"
                                            value="@if (session('password')) {{ session('password') }} @endif">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">se connecter</button>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="my-2 text-sm mx-auto">
                                    je n'ai pas de compte?
                                    <a href="{{route('sign')}}" class="text-primary font-weight-bold">créer un compte</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n5">
                            <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n5"
                                style="background-image:url({{ asset('image/carousel-1.jpg') }})">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
