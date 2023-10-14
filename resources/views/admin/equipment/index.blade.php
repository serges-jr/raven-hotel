@extends('layout.board')
@section('title','les equipements')
@section('content')
<div class="row mt-2">
    <div class="col-lg-8 col-sm mb-5 mx-auto">
        <h1 class="fs-4 text-center lead text-primary text-uppercase">raven Hotel</h1>
    </div>
</div>
<div class="dropdown-divider border-bottom border-warning mb-2"></div>
<div class="row">
    <div class="col-md-6">
        <h1 class="fs-4 lead">liste des equipements</h1>
    </div>
    <div class="col-md-6">
        <div class="d-flex justify-content-end align-items-center">
            <button class="btn btn-primary btn-sm me-3" data-bs-toggle="modal" data-bs-target="#createModal"><i class="bi bi-folder-plus"></i> Nouveau
            </button>
            <a href="#" class="btn btn-success btn-sm" id="export"><i class="bi bi-table me-1"></i>Exporter</a>
        </div>
    </div>
</div>
<div class="dropdown-divider border-bottom border-warning mb-2"></div>
<div class="row mt-2">
    {{-- create equipment--}}
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createModalLabel">nouveau equipment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('admin.equipment.form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" name="createEquipment" id="createEquipment">
                        Ajouter
                        <i class="fas fa-plus"></i></button>
                </div>
            </div>
        </div>
    </div>
    {{-- update equipment--}}
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateModalLabel">modifier equipment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="EquipmentUpdate" name="EquipmentUpdate" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="form-floating mb-2">
                            <input type="text" name="icon" id="image" class="form-control">
                            <label for="icon" class="form-label">une iconne pour l'equipment</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" name="name" id="nom" class="form-control">
                            <label for="name" class="form-label">name :</label>
                        </div>
                        <div class="form-floating mb-2">
                            <textarea name="description" id="detail" class="form-control">
                            </textarea>
                            <label for="description" class="form-label">description :</label>
                        </div>

                    </form>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" name="updateEquipment" id="updateEquipment">modifier
                        <i class="fas fa-sync"></i></button>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table id="table" class="table table-striped Equipment" style="width:100%">

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">icon</th>
                    <th scope="col">content</th>
                    <th scope="col">detail</th>
                    <th scope="col">status</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @php $nb = 1@endphp

                @foreach($equipments as $equipment)
                <tr>
                    <td>{{ $nb }}</td>
                    <td><i class="{{$equipment->icon}} fa-lg"></i></td>
                    <td>{{ $equipment->name }}</td>
                    <td>{{ $equipment->description }}</td>
                    <td>
                        @if($equipment->status == 0)
                            <span  class="text-bg-danger rounded-2 px-1">desactiver ...</span>
                        @else
                            <span  class="text-bg-primary rounded-2 px-1">activer ...</span>
                        @endif
                    </td>
                    <td>
                        <a href="#" class="text-info me-2 infoBtn" data-id="{{ $equipment->id }}" title="Voir les detais">
                            <i class="fas fa-info-circle"></i>
                        </a>
                        <a href="#" class="text-primary me-2 editBtn" title="Modifier" data-id="{{ $equipment->id }}">
                            <i class="fa fa-edit" data-bs-toggle="modal" data-bs-target="#updateModal"></i>
                        </a>
                        <a href="#" class="text-danger me-2 deleteBtn" title="supprimer" data-id="{{ $equipment->id }}">
                            <i class="fa fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                @php $nb++ @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
