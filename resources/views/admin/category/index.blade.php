@extends('layout.board')
@section('title','liste chambre')
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
                <button class="btn btn-primary btn-sm me-3" data-bs-toggle="modal" data-bs-target="#createModal"><i
                        class="fas fa-folder-plus"></i> Nouveau
                </button>
                <a href="#" class="btn btn-success btn-sm" id="export"><i class="fas fa-table"></i>Exporter</a>
            </div>
        </div>
    </div>
    <div class="dropdown-divider border-bottom border-warning mb-2"></div>
    <div class="row mt-2">
        {{--        create category--}}
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="createModalLabel">nouveau category</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('admin.category.form')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-primary" name="createCategory" id="createCategory">Ajouter
                            <i
                                class="fas fa-plus"></i></button>
                    </div>
                </div>
            </div>
        </div>


        {{--        update category--}}
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="updateModalLabel">modifier category</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="UpdateForm" name="UpdateForm" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="category_id">
                            <div class="form-floating mb-2">
                                <input type="text" name="name" id="nom" class="form-control"
                                       value="">
                                <label for="name" class="form-label">name :</label>
                                @error("name")
                                {{ $message }}
                                @enderror
                            </div>
                            <div class="form-floating mb-2">
                                <textarea name="detail" id="description" class="form-control" value="">
                                </textarea>
                                <label for="detail" class="form-label">detail :</label>
                                @error("detail")
                                {{ $message }}
                                @enderror
                            </div>

                        </form>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-primary" name="updateCategory" id="updateCategory">modifier
                            <i
                                class="fas fa-sync"></i></button>
                    </div>
                </div>
            </div>
        </div>


        <table id="table" class="table table-striped category" style="width:100%">

            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">content</th>
                <th scope="col">detail</th>
                <th scope="col">action</th>
            </tr>
            </thead>
            <tbody>
            @php $nb = 1 @endphp
            @foreach($categorys as $category)
                <tr>
                    <td>{{  $nb }}</td>
                    <td>{{ $category->name }}</td>
                    @if($category->detail)
                        <td>{{ $category->detail }}</td>
                    @else
                        <td>...</td>
                    @endif
                    <td>
                        <a href="#" class="text-info me-2 infoBtn" data-id="{{ $category->id }}" title="Voir les detais">
                            <i class="fas fa-info-circle"></i>
                        </a>
                        <a href="#" class="text-primary me-2 editBtn" title="Modifier" data-id="{{ $category->id }}">
                            <i class="fa fa-edit" data-bs-toggle="modal" data-bs-target="#updateModal"></i>
                        </a>
                        <a href="#" class="text-danger me-2 deleteBtn" title="supprimer" data-id="{{ $category->id }}">
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
