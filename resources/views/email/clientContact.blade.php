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
                    <h1 class="text-primary teal text-uppercase">raven-hotel</h1>
                   <p>apres verification votre reservation du {{ $data['dateDebut'] }} au {{ $data['dateFin'] }} a ete valider. </p>
                     <p>veuillez passer a la reception avec ce code
                       <strong><u> {{ $data['code'] }}</u></strong>
                        pour avoir acces a votre chambre.
                     </p>

                     <div class="alert alert-danger">
                        <div class="container">
                            <p>vous avez jusqu'a la fin du {{ $data['dateDebut'] }} a passer a la reception. Passer ce delais votre reservation sera annuler.</p>
                            <p class="text-primary"><u>raven-hotel</u></p>
                        </div>
                     </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <script src="{{ asset('bootstrap/bootstrap-5.2.3/dist/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
