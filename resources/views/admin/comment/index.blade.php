@extends('layout.board')
@section('title','les commentaires')
@section('content')
<div class="row mt-2">
    <div class="col-lg-8 col-sm mb-5 mx-auto">
        <h1 class="fs-4 text-center lead text-primary text-uppercase">raven Hotel</h1>
    </div>
</div>
<div class="dropdown-divider border-bottom border-warning mb-2"></div>
<div class="row">
    <div class="col-md-6">
        <h1 class="fs-4 lead">liste des commentaires</h1>
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
    {{-- create commentaire--}}
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createModalLabel">new commentaire</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('admin.comment.form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" name="createComment" id="createComment">Ajouter
                        <i class="bi bi-plus"></i></button>
                </div>
            </div>
        </div>
    </div>

    {{-- update equipment--}}
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateModalLabel">modifier comment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="CommentUpdate" name="CommentUpdate" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="comment_id">
                        <input type="hidden" name="user_id" id="comment_user">
                        <div class="form-floating mb-2">
                            <textarea name="content" id="comment" cols="30" rows="10" value="{{ old('content') }}" class="form-control"></textarea>
                            <label for="name" class="form-label">name :</label>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary" name="updateComment" id="updateComment">modifier
                        <i class="fas fa-sync"></i></button>
                </div>
            </div>
        </div>
    </div>
    <table id="table" class="table table-striped comments" style="width:100%">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">content</th>
                <th scope="col">status</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @php $nb = 1 @endphp
            @foreach($comments as $comment)
            <tr>
                <td>{{ $nb }}</td>
                <td>{{ $comment->content }}</td>
                <td>
                    @if($comment->status == 0)
                    <span class="text-bg-danger rounded-2 px-1">desactiver ...</span>
                    @else
                    <span class="text-bg-primary rounded-2 px-1">activer ...</span>
                    @endif
                </td>
                <td>
                    <a href="#" class="text-info me-2 infoBtn" data-id="{{ $comment->id }}" title="Voir les detais">
                        <i class="fas fa-info-circle"></i>
                    </a>
                    <a href="#" class="text-primary me-2 editBtn" title="Modifier" data-id="{{ $comment->id }}">
                        <i class="fa fa-edit" data-bs-toggle="modal" data-bs-target="#updateModal"></i>
                    </a>
                    <a href="#" class="text-danger me-2 deleteBtn @if ($comment->status === 1) disabled @endif" title="activer" data-id="{{ $comment->id }}">
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