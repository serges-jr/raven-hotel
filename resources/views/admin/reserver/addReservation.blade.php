@extends('layout.board')
@section('title', 'add reservataion')
@section('content')
    <div class="container">
        <div class="text-center">
            <h1 class="teal text-primary">ajouter une reservation</h1>
        </div>
        <form class="vstack gap-2" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="admin_id" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow p-2">
                        <h2 class="text-center text-uppercaze">information du client</h2>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-2">
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ old('name') }}">
                                    <label for="name" class="form-label">name :</label>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="email" name="email" id="email" class="form-control"
                                        value="{{ old('email') }}">
                                    <label for="email" class="form-label">email :</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-2">
                                    <input type="text" name="lastname" id="lastname" class="form-control"
                                        value="{{ old('lastname') }}">
                                    <label for="lastname" class="form-label">lastname :</label>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="number" name="phone" id="phone" class="form-control"
                                        value="{{ old('phone') }}">
                                    <label for="phone" class="form-label">phone number :</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group my-2">
                                    <input type="radio" name="sexe" id="sexe"
                                        value="{{ old('adresse', 1) }}">homme <br>
                                    <input type="radio" name="sexe" id="sexe"
                                        value="{{ old('adresse', 0) }}">femme
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-2">
                                    <textarea name="adresse" id="adresse" cols="30" rows="10" value="{{ old('adresse') }}" class="form-control"></textarea>
                                    <label for="adresse">adresse :</label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow p-2">
                        <h2 class="text-center text-uppercaze">information de la reservation</h2>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-2">
                                    <select name="chambre_id" id="room" class="form-control">
                                        <option value="">type chambre</option>
                                        @foreach ($posts as $post)
                                            <option value="{{ $post->id }}" id="id">
                                                {{ $post->category->name . ' ' . $post->numero }}</option>
                                        @endforeach
                                    </select>
                                    <label for="" class="form-label">choix d'une chambre</label>
                                </div>
                                <script>
                                    $('#room').change(function() {
                                        let id = this.value;
                                        $.ajax({
                                            type: 'get',
                                            url: "addReservation" + "/" + id,
                                            data: {
                                                id: id
                                            },
                                            success: function(data) {
                                                $('#prix').attr('value', data.prix);

                                            }
                                        })
                                    });

                                </script>
                                <div class="form-floating mb-2">
                                    <input type="date" class="form-control radius" name="dateDebut" id="dateDebut" />
                                    <label for="" class="form-label">date Debut :</label>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="text" name="nbjour" id="nbNuit" class="form-control">
                                    <label for="" class="form-label">Nombre de nuit :</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-2">
                                    <input type="text" name="" id="prix" class="form-control">
                                    <label for="" class="form-label">Prix :</label>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="date" class="form-control radius" name="dateFin" id="dateFin" />
                                    <label for="" class="form-label">date Fin :</label>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="text" name="montant" id="Montant" class="form-control">
                                    <label for="" class="form-label">Montant total :</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-2">
                    <button class="btn btn-primary">ajouter</button>
                </div>
            </div>
        </form>
    </div>
    <script>
                                            // 
                                            $("#dateDebut").change(function() {
                                        let date = new Date(this.value);
                                        let year = String(date.getFullYear());
                                        let month = "";
                                        let day = "";
                                        if (String(date.getMonth() + 1) < 10) {
                                            month = "0" + String(date.getMonth() + 1);
                                        } else {
                                            month = String(date.getMonth() + 1);
                                        }
                                        if (String(date.getDate() + 1) < 9) {
                                            day = "0" + String(date.getDate() + 1);
                                        } else {
                                            day = String(date.getDate() + 1);
                                            if (String(date.getDate()) == 30 || String(date.getDate()) == 31) {
                                                month = parseInt(month) + 1;
                                                month = String(month);
                                                if (month == 13) {
                                                    month = "01";
                                                    year = String(date.getFullYear() + 1);
                                                }
                                                day = "01";
                                            }
                                        }

                                        let jour = year + "-" + month + "-" + day;
                                        $("#dateFin").attr("min", jour);
                                    });
                                    //function de calcul du nombre de jour du client
                                    $("#nbNuit").click(function() {
                                        //recupperation puis convertion de la date choisir par le client
                                        let date1 = $("#dateDebut").val();
                                        date1 = new Date(date1);
                                        let date2 = $("#dateFin").val();
                                        //recupperation puis convertion de la date choisir par le client
                                        date2 = new Date(date2);
                                        let date3 = date2.getTime() - date1.getTime();
                                        date3 = date3 / (1000 * 3600 * 24);
                                        $("#nbNuit").val(date3);
                                        console.log(date3);
                                    })
                                    //function de calcul le montant total suite au nombre de jour que va occuper le client
                                    $("#Montant").click(function() {
                                        let prix = $("#prix").val();
                                        let nb = $("#nbNuit").val();

                                        let montant = prix * nb;
                                        $("#Montant").val(montant);
                                    })
    </script>
@endsection
