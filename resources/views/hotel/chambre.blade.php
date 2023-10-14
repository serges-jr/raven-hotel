@extends('layout.base')
@section('title', $room->category->name)
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-8">
                <img src="{{ $room->imageUrl() }}" alt="#" class="img-fluid w-100 h-75 rounded">
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-title w-100 h-25 bg-primary text-center mt-3 rounded-2 text-light">
                        {{ $room->prix }}Fcfa/nuit</div>
                    <div class="card-body px-2">
                        <span class="mb-1 fw-semi-bolt">Installation</span>
                        <div class="d-flex mb-3 ps-3">
                            @foreach ($features as $feature)
                                @php
                                    $p = explode(',', $room->feature);
                                @endphp
                                @foreach ($p as $ps)
                                    @if ($ps == $feature->id)
                                        <small class="border-end me-3 pe-1">{{ $feature->name }}</small>
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                        <span class="mb-1 fw-semi-bolt">Equipements</span>
                        <div class="d-flex mb-3 ps-3">
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
                        <div class="mb-3">
                            <span class="mb-1 fw-semi-bolt">invites</span>
                            <div class="d-flex">
                                <small class="border-end me-3 pe-3">{{ $room->adulte }}-
                                    Adulte</small>
                                <small class="border-end me-3 pe-3">{{ $room->enfant }}-
                                    Enfant</small>
                            </div>
                        </div>
                        <p>
                            <span class="d-block fw-semi-bolt">Surface</span>
                            {{ $room->surface }}m²
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <h3>Description</h3>
                <p>
                    {{ $room->description }}
                </p>
            </div>
        </div>

        @include('include.temoin')
        <div class="card p-3 shadow rounded-2">
            <div class="card-title">
                <h3 class="text-uppercase fw-light">laisser un commentaire</h3>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    @auth
                    <div class="row">
                        <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                        <div class="col mb-3">
                            <div class="form-floating">
                                <input type="text" name="" id="" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                                <label for="" class="form-label text-capitalize">votre nom :</label>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <div class="form-floating">
                                <input type="text" name="" id="" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                                <label for="" class="form-label text-capitalize">votre email :</label>
                            </div>
                        </div>
                    </div>
                    @endauth
                    @guest
                    <div class="row">
                        <div class="col mb-3">
                            <div class="form-floating">
                                <input type="text" name="" id="" class="form-control">
                                <label for="" class="form-label text-capitalize">votre nom :</label>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <div class="form-floating">
                                <input type="text" name="" id="" class="form-control">
                                <label for="" class="form-label text-capitalize">votre email :</label>
                            </div>
                        </div>
                    </div>
                    @endguest
                    <div class="form-floating mb-3">
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                        <label for="" class="form-label">commentaire</label>
                        @error('content')
                            {{$message}}
                        @enderror
                    </div>
                    <div class="d-flex justify-content-center align-items center">
                        <button type="submit" class="btn btn-sm btn-primary">commenter</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
