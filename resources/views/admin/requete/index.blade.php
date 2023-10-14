@extends('layout.board')
@section('title','les requêtes')
@section('content')
<div class="row mt-2">
    <div class="col-lg-8 col-sm mb-5 mx-auto">
        <h1 class="fs-4 text-center lead text-primary text-uppercase">raven Hotel</h1>
    </div>
</div>
<div class="dropdown-divider border-bottom border-warning mb-2"></div>
<div class="row">
    <div class="col-md-6">
        <h1 class="fs-4 lead">liste des requêtes</h1>
    </div>
    <div class="col-md-6">
        <div class="d-flex justify-content-end align-items-center">
            <a href="#" class="btn btn-success btn-sm" id="export"><i class="bi bi-table"></i>Exporter</a>
        </div>
    </div>
</div>
<div class="dropdown-divider border-bottom border-warning mb-2"></div>
<div class="row mt-2">

    <table id="table" class="table table-striped" style="width:100%">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">client</th>
                <th scope="col">sujet</th>
                <th scope="col">message</th>
                <th scope="col">status</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @php $nb = 1 @endphp
            @foreach($requetes as $requete)
            <tr>
                <td>{{ $nb }}</td>
                <td>{{ $requete->user->name.' '.$requete->user->lastname }}</td>
                <td>{{ $requete->sujet }}</td>
                <td>{{ $requete->message }}</td>
                <td>
                    @if($requete->status == 0)
                    <span class="text-bg-danger rounded-2 px-1">desactiver ...</span>
                    @else
                    <span class="text-bg-primary rounded-2 px-1">vue ...</span>
                    @endif
                </td>
                <td>
                    <a href="#" class="text-danger me-2 deleteBtn @if ($requete->status === 1) disabled @endif" title="activer" data-id="{{ $requete->id }}">
                        <i class="fa fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            @php $nb++ @endphp
            @endforeach
        </tbody>
    </table>
</div>
@endsection
