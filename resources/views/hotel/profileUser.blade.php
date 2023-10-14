@extends('layout.base')
@section('title', \Illuminate\Support\Facades\Auth::user()->name)
@section('content')

    <div class="container mt-4 h-100">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            @if(\Illuminate\Support\Facades\Auth::user()->avatar)
                            <img src="{{ asset(\Illuminate\Support\Facades\Auth::user()->imageUrl()) }}" alt="Profile"
                            class="rounded-circle" style="height: 250px">
                            @else
                            <img src="{{ asset('image/avatar.jpg')}}" alt="Profile" class="rounded-circle"  style="height: 250px">
                            @endif
                            <span style="position: absolute;top: 60%;left: 64%"><i
                                    class="fa fa-camera fa-lg text-info"></i></span>
                            <h2>{{ \Illuminate\Support\Facades\Auth::user()->name . ' ' . \Illuminate\Support\Facades\Auth::user()->lastname }}
                            </h2>
                            <h3>{{ \Illuminate\Support\Facades\Auth::user()->fonction }}</h3>
                            {{-- <div class="social-links mt-2">
                            <a href="#" class="twitter me-1"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook me-1"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram me-1"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin me-1"><i class="bi bi-linkedin"></i></a>
                        </div> --}}
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Panorama</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Modifier le
                                        Profil</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-settings">Réglages</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">Mot De Passe</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-reservation">Reservations</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">About</h5>
                                    <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores
                                        cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure
                                        rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at
                                        unde.</p>

                                    <h5 class="card-title">Détails du Profil</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Nom Complet</div>
                                        <div class="col-lg-9 col-md-8">
                                            {{ \Illuminate\Support\Facades\Auth::user()->name . ' ' . \Illuminate\Support\Facades\Auth::user()->lastname }}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Société</div>
                                        <div class="col-lg-9 col-md-8">Douala ange rafael campus II</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">emploi</div>
                                        <div class="col-lg-9 col-md-8">
                                            {{ \Illuminate\Support\Facades\Auth::user()->fonction }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Pays</div>
                                        <div class="col-lg-9 col-md-8">CAMEROUN</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Adresse</div>
                                        <div class="col-lg-9 col-md-8">
                                            {{ \Illuminate\Support\Facades\Auth::user()->adresse }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">N- Téléphone</div>
                                        <div class="col-lg-9 col-md-8">(+237)
                                            {{ \Illuminate\Support\Facades\Auth::user()->phone }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">{{ \Illuminate\Support\Facades\Auth::user()->email }}
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <form
                                        action="{{ route('editprofile', ['id' => \Illuminate\Support\Facades\Auth::user()->id]) }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                                Image</label>
                                            <div class="col-md-8 col-lg-9">
                                                <img src="assets/img/profile-img.jpg" alt="Profile">
                                                <div class="pt-2">
                                                    <a href="#" class="btn btn-primary btn-sm"
                                                        title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                                    <a href="#" class="btn btn-danger btn-sm"
                                                        title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nom
                                                Complet</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="name" type="text" class="form-control" id="fullName"
                                                    value="{{ \Illuminate\Support\Facades\Auth::user()->name }}">
                                                <input name="lastname" type="text" class="form-control" id="fullName"
                                                    value="{{ \Illuminate\Support\Facades\Auth::user()->lastname }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Job" class="col-md-4 col-lg-3 col-form-label">Emploi</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="fonction" type="text" class="form-control"
                                                    id="Job"
                                                    value="{{ \Illuminate\Support\Facades\Auth::user()->fonction }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Address" class="col-md-4 col-lg-3 col-form-label">Adresse</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="adresse" type="text" class="form-control" id="Address"
                                                    value="{{ \Illuminate\Support\Facades\Auth::user()->adresse }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Phone"
                                                class="col-md-4 col-lg-3 col-form-label">N-Téléphone</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="phone" type="text" class="form-control" id="Phone"
                                                    value="{{ \Illuminate\Support\Facades\Auth::user()->phone }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="email" type="email" class="form-control" id="Email"
                                                    value="{{ \Illuminate\Support\Facades\Auth::user()->email }}">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button class="btn btn-primary btn-sm">Modifier</button>
                                        </div>
                                    </form><!-- End Profile Edit Form -->

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-settings">

                                    <!-- Settings Form -->

                                    <div class="row mb-3">
                                        {{-- <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                                        <div class="col-md-8 col-lg-9">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="changesMade" checked>
                                                <label class="form-check-label" for="changesMade">
                                                    Changes made to your account
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="newProducts" checked>
                                                <label class="form-check-label" for="newProducts">
                                                    Information on new products and services
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="proOffers">
                                                <label class="form-check-label" for="proOffers">
                                                    Marketing and promo offers
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                                                <label class="form-check-label" for="securityNotify">
                                                    Security alerts
                                                </label>
                                            </div>
                                        </div> --}}
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">deconnexion</label>
                                        <div class="col-md-8 col-lg-9">
                                            <div class="form-check">
                                                <form action="javascript:void" method="post" name="Logout"
                                                    id="Logout">
                                                    @method('post')
                                                    @csrf
                                                    <input type="hidden" name="id" id="id"
                                                        value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
                                                    <button type="submit" class="btn btn-primary btn-sm px-1 logout"
                                                        title="deconnection">deconnection</button>
                                                </form>
                                            </div>
                                        </div>
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Supprimer Le
                                            Compte</label>
                                        <div class="col-md-8 col-lg-9">
                                            <div class="form-check">
                                                <form action="javascript:void" method="post"
                                                    enctype="multipart/form-data" name="Supprimer" id="Supprimer">
                                                    @method('delete')
                                                    @csrf
                                                    <input type="hidden" name="id" id="id"
                                                        value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
                                                    <button type="submit" class="btn btn-primary btn-sm px-1 delete"
                                                        title="suppression">suppression</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div> --}}
                                    <!-- End settings Form -->

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form
                                        action="{{ route('editpassword', ['id' => \Illuminate\Support\Facades\Auth::user()->id]) }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Mot De
                                                Passe Actuel</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="current" type="password" class="form-control"
                                                    id="currentPassword">
                                                @error('current')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nouveau Mot
                                                De Passe</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="new" type="password" class="form-control"
                                                    id="newPassword">
                                                @error('new')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="renewPassword"
                                                class="col-md-4 col-lg-3 col-form-label">Confirmation Mot De Passe</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="confirm" type="password" class="form-control"
                                                    id="renewPassword">
                                                @error('confirm')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-sm">Modifier</button>
                                        </div>
                                    </form><!-- End Change Password Form -->

                                </div>
                                <div class="tab-pane fade pt-3" id="profile-reservation">
                                    <!-- reservation -->
                                    <div class="row px-4">
                                        @foreach ($reservations as $reservation)
                                            <div class="col-md-5 card shadow me-3 mb-2">
                                                <h3 class="fw-bold fs-4"> {{ $reservation->chambre->category->name }}
                                                </h3>
                                                <p>{{ $reservation->chambre->prix }}Fcfa par nuit</p>
                                                <p><strong>Date Debut :</strong> {{ $reservation->dateDebut }} </p>
                                                <p><strong>Date Fin :</strong> {{ $reservation->dateFin }} </p>
                                                <p class="mt-1"><strong>Montant : {{ $reservation->montant }}</strong>
                                                </p>
                                                <p class="mt-1"><strong>Date : {{ $reservation->created_at }}</strong>
                                                </p>
                                                <p class="mt-1"><strong>Code : {{ $reservation->code }}</strong>
                                                </p>

                                                <div class="mb-2 text-center">
                                                    @if ($reservation->status == 1)

                                                        @if ($reservation->payer == 'payer')
                                                        <div class="row pe-1">
                                                            <span class="col btn btn-sm btn-success w-50 me-1">en cours</span>
                                                            <button class="col btn btn-primary btn-sm"
                                                                data-bs-toggle="modal" data-bs-target="#createModal"><i
                                                                    class="bi bi-folder-plus"></i> prolonger
                                                            </button>
                                                        </div>
                                                        @else
                                                        <div class="row pe-1">
                                                            <span class="col btn btn-sm btn-success w-100 me-1">en attente</span>
                                                        </div>
                                                        @endif
                                                    @else
                                                        <span
                                                            class="btn btn-sm btn-danger w-50 text-center">terminer</span>
                                                    @endif

                                                    {{-- prolonger une reservation --}}
                                                    <div class="modal fade" id="createModal" tabindex="-1"
                                                        aria-labelledby="createModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="createModalLabel">prolonger ma reservation</h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row g-2">
                                                                        <div class="col">
                                                                                <label for="" class="form-label">Ancienne Date Fin :</label>
                                                                                <input type="date" class="form-control radius" name="dateE" value="{{ $reservation->dateFin }}"/>
                                                                        </div>
                                                                        <div class="col">
                                                                                <label for="" class="form-label">Nouvel Date Fin :</label>
                                                                                <input type="date" class="form-control radius" name="dateF" id="dateFin" min="{{ $reservation->dateFin }}"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Annuler</button>
                                                                    <button type="button" class="btn btn-primary"
                                                                        name="createChambre" id="createChambre">prolonger
                                                                        <i class="bi bi-plus"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
