<form method="post" id="FeatureForm" name="FeatureForm" enctype="multipart/form-data">
    @csrf
    <div class="form-floating mb-2">
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name')}}">
        <label for="name" class="form-label">name :</label>
        @error("name")
        {{ $message }}
        @enderror
    </div>
</form>


