@extends('layout.board')
@section('title','addImageUser')
@section('content')
<div class="container">
    <form method="post" enctype="multipart/form-data" class="vstack gap-3">
        @csrf
        <input type="hidden" name="id" id="id" value="{{$post->id}}">
        <div class="form-floating">
            <input type="file" name="avatar" id="avatar" class="form-control">
            <label for="avatar" class="form-label">image :</label>
        </div>
        <button type="submit" class="btn btn-primary">ajouter</button>
    </form>
</div>
@endsection
