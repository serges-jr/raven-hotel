<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>

    <div class="contaner">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card shadow p-3">
                    <h1 class="text-primary teal">Nouvelle demande de reservation</h1>
                    <div class="row">
                        <div class="col">
                            <p class="fw-bold text-capitalize"><strong>--- Detail clients ---</strong> </p>
                            <p class="px-2"> - Prenom: {{ $user['lastname'] }}</p>
                            <p class="px-2"> - Nom: {{ $user['name'] }}</p>
                            <p class="px-2"> - Phone number: {{ $user['phone'] }}</p>
                            <p class="px-2"> - Email: {{ $user['adresse'] }}</p>
                        </div>
                        <div class="col">
                            <p class="fw-bold text-capitalize"> <strong>--- Detail reservation ---</strong></p>
                            <p class="px-2"> - Chambre : {{ $catgs['name'] . ' ' . $room['numero'] }}</p>
                            <p class="px-2"> - Date Debut : {{ $data['dateDebut'] }}</p>
                            <p class="px-2"> - Date FIn : {{ $data['dateFin'] }}</p>
                            <p class="px-2"> - Nombre nuit : {{ $data['nbjour'] }}nuit</p>
                            <p class="px-2"> - Montant : {{ $data['montant'] }}fcfa</p>
                        </div>
                        <div class="my-3">

                           <strong> **Message : **</strong><br>
                            {{ $data['message'] }}
                        </div>
                    </div>
                    <p class="px-2">
                        une nouvelle demande de reservation a ete faite pour la chambre <a
                            href="{{ route('reserver') }}"> {{ $catgs['name'] }} </a>.
                    </p>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>




    <script src="{{ asset('bootstrap/bootstrap-5.2.3/dist/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
