@extends('layout.board')
@section('title', 'etat chambres')
@section('content')
    <div class="row mt-2">
        <div class="col-lg-8 col-sm mb-5 mx-auto">
            <h1 class="fs-4 text-center lead text-primary text-uppercase">raven Hotel</h1>
        </div>
    </div>
    <div class="dropdown-divider border-bottom border-warning mb-2"></div>
    <div class="row">
        <div class="col-md-6">
            <h1 class="fs-4 lead">Etat des chambres</h1>
        </div>
        <div class="col-md-6">
            <div class="d-flex justify-content-end align-items-center">
                <a href="#" class="btn btn-success btn-sm" id="export"><i class="bi bi-table"></i>Exporter</a>
            </div>
        </div>
    </div>
    <div class="dropdown-divider border-bottom border-warning mb-2"></div>
    <div class="row mt-2">

        <table id="table" class="table table-striped menage" style="width:100%">

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">chambre</th>
                    <th scope="col">etat</th>
                    <th scope="col">status</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @php $nb = 1 @endphp
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $nb }}</td>
                        <td>{{ $post->reservation->chambre->category->name }}</td>
                        <td>
                            @if ($post->etat == 1)
                                <span class="text-bg-danger rounded-2 px-1">reserve ...</span>
                            @else
                                <span class="text-bg-primary rounded-2 px-1">libre ...</span>
                            @endif
                        </td>
                        <td>
                            @if ($post->status == 1)
                                <span class="text-bg-danger rounded-2 px-1">en utilisation ...</span>
                            @else
                                <span class="text-bg-danger rounded-2 px-1">sale ...</span>
                            @endif

                        </td>
                        <td>
                            @if ($post->status == 0)
                                <a href="#" class="btn btn-warning btn-sm px-2 text-light me-2 infoBtn"
                                    title="netoyer" data-id="{{ $post->id }}">
                                    netoyage
                                </a>
                            @endif
                        </td>
                    </tr>
                    @php $nb++ @endphp
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
