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
                    <h1 class="text-primary teal">reservation effectuer</h1>
                   <p class="fw-bold text-capitalize"> <strong >--- Detail reservation ---</strong></p>
                    <p class="px-2"> - Chambre : {{ $catgs['name'].' '.$room['numero'] }}</p>
                    <p class="px-2"> - Date Debut : {{ $data['dateDebut'] }}</p>
                    <p class="px-2"> - Date FIn : {{ $data['dateFin'] }}</p>
                    <p class="px-2"> - Nombre nuit : {{ $data['nbjour'] }}nuit</p>
                    <p class="px-2"> - Montant : {{ $data['montant'] }}fcfa</p>
                    <p class="px-2">
                        verifier votre reservation en untilisant comme mot de passe "{{ $users['name'] }}"  <a href="{{ route('profile') }}"
                        class="btn btn-primary btn-sm mx-2"> ici </a>
                    </p>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <script src="{{ asset('bootstrap/bootstrap-5.2.3/dist/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
