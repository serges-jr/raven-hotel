@extends('layout.board')
@section('title', 'reservations')
@section('content')
    @include('include.flashe')

    <div class="row mt-2">
        <div class="col-lg-8 col-sm mb-5 mx-auto">
            <h1 class="fs-4 text-center lead text-primary text-uppercase">raven Hotel</h1>
        </div>
    </div>
    <div class="dropdown-divider border-bottom border-warning mb-2"></div>
    <div class="row">
        <div class="col-md-6">
            <h1 class="fs-4 lead">liste des reservation</h1>
        </div>

        <div class="col-md-6">
            <div class="d-flex justify-content-end align-items-center">
                <a class="btn btn-primary btn-sm me-3" href="{{ route('add-book') }}"><i class="fas fa-folder-plus"></i>
                    ajouter
                </a>
                <a href="#" class="btn btn-success btn-sm checkCode" id="export"><i
                        class="fa-solid fa-magnifying-glass"></i> Check Code</a>
            </div>
        </div>

    </div>
    <div class="dropdown-divider border-bottom border-warning mb-4"></div>
    <div class="row mt-2 ReserverBook">
        {{-- validation --}}
        @foreach ($post as $reservation)
            <div class="col-md-4">
                <div class="card shadow  p-2">
                    <h3 class="fw-bold fs-4"> {{ $reservation->chambre->category->name }}
                    </h3>
                    <p><strong>Nom Client: </strong>{{ $reservation->user->name . ' ' . $reservation->user->lastname }}
                    </p>
                    <p>{{ $reservation->chambre->prix }}Fcfa par nuit</p>
                    <p id="debut"><strong>Date Debut:</strong> {{ $reservation->dateDebut }} </p>
                    <p><strong>Date Fin:</strong> {{ $reservation->dateFin }} </p>
                    <p class="mt-1"><strong>Montant: {{ $reservation->montant }}</strong>
                    </p>
                    <p class="mt-1"><strong>Date: {{ $reservation->created_at }}</strong>
                    </p>

                    <div class="mb-2 text-center">
                        @if ($reservation->status == 1)
                            <div class="row px-1">
                                <a href="#" class="col btn btn-sm btn-success valideBtn me-1"
                                    title="{{ $reservation->id }}" data-id="{{ $reservation->id }}">valider</a>
                                <a href="#" class="col btn btn-danger btn-sm deleteBtn" title="annuller"
                                    data-id="{{ $reservation->id }}">Annuler
                                </a>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        @endforeach
        {{-- payement --}}
        @foreach ($books as $reservation)
            <div class="col-md-4">
                <div class="card shadow  p-2">
                    <h3 class="fw-bold fs-4"> {{ $reservation->chambre->category->name }}
                    </h3>
                    <p><strong>Nom Client: </strong>{{ $reservation->user->name . ' ' . $reservation->user->lastname }}
                    </p>
                    <p>{{ $reservation->chambre->prix }}Fcfa par nuit</p>
                    <p id="debut"><strong>Date Debut:</strong> {{ $reservation->dateDebut }} </p>
                    <p><strong>Date Fin:</strong> {{ $reservation->dateFin }} </p>
                    <p class="mt-1"><strong>Montant: {{ $reservation->montant }}</strong>
                    </p>
                    <p class="mt-1"><strong>Date: {{ $reservation->created_at }}</strong>
                    </p>

                    <div class="mb-2 text-center">
                        @if ($reservation->status == 1)
                            <div class="row px-1">
                                <a href="#" class="col btn btn-sm btn-success payerBtn me-1"
                                    title="{{ $reservation->id }}" data-id="{{ $reservation->id }}">payer</a>
                                <a href="#" class="col btn btn-danger btn-sm deleteBtn" title="annuller"
                                    data-id="{{ $reservation->id }}">Annuler
                                </a>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        @endforeach
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">rechercher la reservation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" name="Check" id="Check" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating">
                                <input type="text" name="code" id="code" class="form-control">
                                <label for="" class="form-label">Code :</label>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">annuler</button>
                        <button type="button" class="btn btn-primary Search">recherche</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- payement Modal -->
        <div class="modal fade" id="payementModal" tabindex="-1" aria-labelledby="payementModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="payementModalLabel">information sur la reservation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h1>--- information du client ---</h1>
                        <p class="px-2"> <strong> - Nom: </strong><span id="nom"></span></p>
                        <p class="px-2"> <strong> - Prenom: </strong><span id="prenom"></span></p>
                        <p class="px-2"> <strong> - Phone number: </strong><span id="phone"></span></p>
                        <p class="px-2"> <strong> - Email: </strong><span id="email"></span></p>

                        <h1 class="mt-3">--- information du reservation ---</h1>
                        <p class="px-2"><strong> - Chambre : </strong><span id="room"></span></p>
                        <p class="px-2"><strong> - status : </strong><span id="status"></span></p>
                        <p class="px-2"><strong> - Date Debut : </strong><span id="dateDebut"></span></p>
                        <p class="px-2"><strong> - Date FIn : </strong><span id="fin"></span></p>
                        <p class="px-2"><strong> - Nombre nuit : </strong><span id="nbjour"></span></p>
                        <p class="px-2"><strong> - Montant : </strong><span id="montant"></span></p>
                        <p class="px-2"><strong> - Code : </strong><span id="CoDe"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">annuler</button>
                        <button type="button" class="btn btn-primary Payer">payer</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="my-2">

        <table id="table" class="table table-striped users" style="width:100%">

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">nom chambre</th>
                    <th scope="col">nom client</th>
                    <th scope="col">nb jour</th>
                    <th scope="col">montant</th>
                    <th scope="col">faire par</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @php $nb = 1 @endphp
                @foreach ($posts as $reservation)
                    <tr>
                        <td>{{ $nb }}</td>
                        <td>
                            {{ $reservation->chambre->category->name . ' ' . $reservation->chambre->numero }}
                        </td>
                        <td>{{ $reservation->user->name . ' ' . $reservation->user->lastname }}</td>
                        <td>{{ $reservation->nbjour }} Nuit</td>
                        <td>{{ $reservation->montant }}Fcfa</td>
                        <td>
                            @foreach ($users as $user)
                                @if ($user->id === $reservation->admin_id)
                                    {{ $user->name . ' ' . $user->lastname }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <a href="#" class="text-info me-2 infoBtn" data-id="{{ $user->id }}"
                                title="Voir les detais">
                                <i class="fas fa-info-circle"></i>
                            </a>
                            <a href="#" class="text-primary me-2 editBtn" title="Modifier"
                                data-id="{{ $user->id }}">
                                <i class="fa fa-edit" data-bs-toggle="modal" data-bs-target="#updateModal"></i>
                            </a>
                            <a href="#" class="text-danger me-2 deleteBtn" title="supprimer"
                                data-id="{{ $user->id }}">
                                <i class="fa fa-trash-alt"></i>
                            </a>
                            <a href="{{ route('addImageUser', ['id' => $user->id]) }}" class="text-success me-2"
                                title="ajouter l'image">
                                <img src="{{ asset('image/add-image.png') }}" alt="#" class="img"
                                    style="width: 20px;">
                            </a>
                        </td>
                    </tr>
                    @php $nb++ @endphp
                @endforeach
            </tbody>
        </table>
    </div>


@endsection
