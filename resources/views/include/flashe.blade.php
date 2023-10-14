@if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif
{{-- 
@if ($erros->any())
    <div class="alert alert-danger">
        <ul class="my-0">
            @foreach ($errors->allt() as $error)
                <li> {{$error}} </li>
            @endforeach
        </ul>
    </div>
@endif --}}
