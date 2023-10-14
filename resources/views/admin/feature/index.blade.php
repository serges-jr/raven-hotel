@extends('layout.board')
@section('title','installation')
@section('content')

<div class="row mt-2">
    <div class="col-lg-8 col-sm mb-5 mx-auto">
        <h1 class="fs-4 text-center lead text-primary text-uppercase">raven Hotel</h1>
    </div>
</div>
<div class="dropdown-divider border-bottom border-warning mb-2"></div>
<div class="row">
    <div class="col-md-6">
        <h1 class="fs-4 lead">liste des instalation</h1>
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
    {{-- create feature--}}
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createModalLabel">new feature</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('admin.feature.form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" name="createFeature" id="createFeature">Ajouter
                        <i class="bi bi-plus"></i></button>
                </div>
            </div>
        </div>
    </div>


    <table id="table" class="table table-striped" style="width:100%">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">status</th>
            </tr>
        </thead>
        <tbody>
            @php $nb = 1 @endphp
            @foreach($features as $feature)
            <tr>
                <td>{{ $nb }}</td>
                <td>{{ $feature->name }}</td>
                <td>
                    @if($feature->status == 0)
                    <a href="{{ route('editFeature', ['id' => $feature->id]) }}" class="text-bg-danger rounded-2 px-1">desactiver ...</a>
                    @else
                    <a href="{{ route('editFeature', ['id' => $feature->id]) }}" class="text-bg-primary rounded-2 px-1">activer ...</a>
                    @endif
                </td>
            </tr>
            @php $nb++ @endphp
            @endforeach
        </tbody>
    </table>
</div>
@endsection
