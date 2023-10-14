v<x-mail::message>
    # Nouvelle requêtte soumise

    une nouvelle requete a ete soumit <a href="{{ route('requetes') }}"> {{$user['name']}} </a>.

    - Prenom: {{$user['lastname']}}
    - Nom: {{$user['name']}}
    - Phone number: {{$user['phone']}}
    - Email: {{$user['email']}}


    **Message : **<br>
    {{$data['message']}}

</x-mail::message>
