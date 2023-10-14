<form method="post" id="EquipmentForm" name="EquipmentForm" enctype="multipart/form-data" >
    @csrf
    <div class="form-floating mb-2">
        <input type="text" name="icon" id="icon" class="form-control">
        <label for="icon" class="form-label">une iconne pour l'equipment</label>
        @error("icon")
        {{ $message }}
        @enderror
    </div>
    <div class="form-floating mb-2">
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
        <label for="name" class="form-label">name :</label>
        @error("name")
        {{ $message }}
        @enderror
    </div>
    <div class="form-floating mb-2">
        <textarea name="description" id="description" class="form-control" value="{{old('description')}}">
        </textarea>
        <label for="description" class="form-label">description :</label>
        @error("description")
        {{ $message }}
        @enderror
    </div>

</form>


