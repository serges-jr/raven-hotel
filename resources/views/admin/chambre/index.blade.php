@extends('layout.board')
@section('title','les chambres')
@section('content')
<div class="row mt-2">
    <div class="col-lg-8 col-sm mb-5 mx-auto">
        <h1 class="fs-4 text-center lead text-primary text-uppercase">raven Hotel</h1>
    </div>
</div>
<div class="dropdown-divider border-bottom border-warning mb-2"></div>
<div class="row">
    <div class="col-md-6">
        <h1 class="fs-4 lead">liste des chambres</h1>
    </div>
    <div class="col-md-6">
        <div class="d-flex justify-content-end align-items-center">
            <button class="btn btn-primary btn-sm me-3" data-bs-toggle="modal" data-bs-target="#createModal"><i class="bi bi-folder-plus"></i> Nouveau
            </button>
            <a href="#" class="btn btn-success btn-sm" id="export"><i class="bi bi-table"></i>Exporter</a>
        </div>
    </div>
</div>
<div class="dropdown-divider border-bottom border-warning mb-2"></div>
<div class="row mt-2">
    {{-- create chambre--}}
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createModalLabel">new chambre</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('admin.chambre.form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" name="createChambre" id="createChambre">Ajouter
                        <i class="bi bi-plus"></i></button>
                </div>
            </div>
        </div>
    </div>


    <table id="table" class="table table-striped room" style="width:100%">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">surface</th>
                <th scope="col">invite</th>
                <th scope="col">prix</th>
                <th scope="col">quantite</th>
                <th scope="col">status</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
        @php $nb = 1 @endphp
            @foreach($chambres as $chambre)
            <tr>
                <td>{{ $nb }}</td>
                <td>{{ $chambre->category->name }}</td>
                <td>{{ $chambre->surface }}</td>
                <td>Adulte :{{ $chambre->adulte }} <br>
                    Enfant :{{ $chambre->enfant }}
                 </td>
                <td>{{ $chambre->prix }}</td>
                <td>{{ $chambre->capacite }}</td>
                <td>
                    @if($chambre->status == 1)
                    <span class="text-bg-danger rounded-2 px-1">occuper ...</span>
                    @else
                    <span class="text-bg-primary rounded-2 px-1">libre ...</span>
                    @endif
                </td>
                <td>
                    <a href="#" class="text-info me-2 infoBtn" data-id="{{ $chambre->id }}" title="Voir les detais">
                        <i class="fas fa-info-circle"></i>
                    </a>
                    <a href="#" class="text-primary me-2 editBtn" title="Modifier" data-id="{{ $chambre->id }}">
                        <i class="fa fa-edit" data-bs-toggle="modal" data-bs-target="#updateModal"></i>
                    </a>
                    <a href="#" class="text-danger me-2 deleteBtn" title="supprimer" data-id="{{ $chambre->id }}">
                        <i class="fa fa-trash-alt"></i>
                    </a>
                    <a href="{{ route('addImageRoom', ['id' => $chambre->id]) }}" class="text-success me-2"
                        title="ajouter l'image {{$chambre->id}}">
                        <img src="{{asset('image/add-image.png')}}" alt="#" class="img" style="width: 20px;">
                    </a>
                </td>
            </tr>
            @php $nb++ @endphp
            @endforeach
        </tbody>
    </table>
</div>
@endsection
