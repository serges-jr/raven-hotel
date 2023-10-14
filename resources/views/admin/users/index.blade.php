@extends('layout.board')
@section('title', 'liste users')
@section('content')
    <div class="row mt-2">
        <div class="col-lg-8 col-sm mb-5 mx-auto">
            <h1 class="fs-4 text-center lead text-primary text-uppercase">raven Hotel</h1>
        </div>
    </div>
    <div class="dropdown-divider border-bottom border-warning mb-2"></div>
    <div class="row">
        <div class="col-md-6">
            <h1 class="fs-4 lead">liste des users</h1>
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
        {{-- create users --}}
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="createModalLabel"><i class="bi bi-person-lines-fill"></i> nouveau users</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('admin.users.form')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-primary" name="createUser" id="createUser">Ajouter
                            <i class="fas fa-plus"></i></button>
                    </div>
                </div>
            </div>
        </div>


        {{-- update users --}}
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="updateModalLabel">modifier users <span id="span"></span></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form name="UserUpdate" method="post" id="UserUpdate" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="id">
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-2">
                                        <input type="text" name="name" id="nom" class="form-control"
                                            value="{{ old('name') }}">
                                        <label for="name" class="form-label">name :</label>
                                    </div>
                                    <div class="form-floating mb-2">
                                        <input type="email" name="email" id="mail" class="form-control"
                                            value="{{ old('email') }}">
                                        <label for="email" class="form-label">email :</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-2">
                                        <input type="text" name="lastname" id="prenom" class="form-control"
                                            value="{{ old('lastname') }}">
                                        <label for="lastname" class="form-label">lastname :</label>
                                    </div>
                                    <div class="form-floating mb-2">
                                        <input type="number" name="phone" id="tel" class="form-control"
                                            value="{{ old('phone') }}">
                                        <label for="phone" class="form-label">phone number :</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group my-2">
                                        <input type="radio" name="sexe" id="sex">homme <br>
                                        <input type="radio" name="sexe" id="sex">femme
                                    </div>
                                    <div class="form-floating mb-2">
                                        <input type="password" name="password" id="pass" class="form-control"
                                            value="{{ old('password') }}">
                                        <label for="password" class="form-label">password :</label>
                                    </div>
                                    <div class="form-floating mb-2">
                                        <input type="text" name="fonction" id="function" class="form-control"
                                            value="{{ old('fonction') }}">
                                        <label for="fonction" class="form-label">fonction :</label>
                                    </div>
                                    <div class="form-floating mb-2">
                                        <input type="number" name="salaire" id="salair" class="form-control"
                                            value="{{ old('salaire') }}">
                                        <label for="salaire" class="form-label">salaire :</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-2">
                                        <input type="date" name="date" id="dat" class="form-control"
                                            value="{{ old('date') }}">
                                        <label for="date" class="form-label">date of birth :</label>
                                    </div>
                                    <div class="form-floating mb-2">
                                        <input type="password" name="confirm_password" id="confirm_password"
                                            class="form-control" value="{{ old('confirm_password') }}">
                                        <label for="confirm_password" class="form-label">confirm password :</label>
                                    </div>
                                    <div class="form-floating mb-2">
                                        <input type="date" name="dateEmbauche" id="dateEmboche" class="form-control"
                                            value="{{ old('dateEmbauche') }}">
                                        <label for="dateEmbauche" class="form-label">date Embauche :</label>
                                    </div>
                                    <div class="form-floating mb-2">
                                        <input type="text" name="role" id="rol" class="form-control"
                                            value="{{ old('role') }}">
                                        <label for="role" class="form-label">role :</label>
                                    </div>
                                </div>
                                <div class="form-floating mb-2">
                                    <textarea name="adresse" id="adrese" cols="30" rows="10" value="{{ old('adresse') }}"
                                        class="form-control"></textarea>
                                    <label for="adresse">adresse :</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-primary" name="UpdateUser" id="UpdateUser">modifier
                            <i class="fas fa-sync"></i></button>
                    </div>
                </div>
            </div>
        </div>


        <table id="table" class="table table-striped users" style="width:100%">

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">image</th>
                    <th scope="col">nom</th>
                    <th scope="col">prenom</th>
                    <th scope="col">email</th>
                    <th scope="col">date of birth</th>
                    <th scope="col">adresse</th>
                    <th scope="col">phone number</th>
                    <th scope="col">function</th>
                    <th scope="col">salaire</th>
                    <th scope="col">date embauche</th>
                    <th scope="col">sexe</th>
                    <th scope="col">role</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @php $nb = 1 @endphp
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $nb }}</td>
                        <td class="position-relative">
                            @if ($user->avatar)
                                <img src="{{ $user->imageUrl() }}" alt="##"  style="width: 50px;height: 50px;border-radius: 50%">
                            @else
                                <img src="{{ asset('image/team-2.jpg') }}" alt=""
                                    style="width: 50px;height: 50px;border-radius: 50%">
                            @endif
                            @if ($user->online == 1)
                            <span class="rounded-circle bg-info position-absolute" style="width: 10px;top: 50px;left: 45px;content: '';height: 10px"></span>
                            @endif
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->lastname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->date }}</td>
                        <td>{{ $user->adresse }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>
                            @if ($user->fonction == true)
                                {{ $user->fonction }}
                            @else
                                ...
                            @endif
                        </td>
                        <td>
                            @if ($user->salaire == true)
                                {{ $user->salaire }}
                            @else
                                ...
                            @endif
                        </td>
                        <td>
                            @if ($user->dateEmbauche == true)
                                {{ $user->dateEmbauche }}
                            @else
                                ...
                            @endif
                        </td>
                        <td>
                            @if ($user->sexe == 0)
                                femme
                            @else
                                homme
                            @endif
                        </td>
                        <td>{{ $user->role }}</td>
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
