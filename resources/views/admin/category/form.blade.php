<form method="post" id="CategoryForm" name="CategoryForm" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" id="id" value="{{ $category->id }}">
    <div class="form-floating mb-2">
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}">
        <label for="name" class="form-label">name :</label>
        @error("name")
        {{ $message }}
        @enderror
    </div>
    <div class="form-floating mb-2">
        <textarea name="detail" id="detail" class="form-control" value="{{old('detail', $category->detail)}}">
        </textarea>
        <label for="detail" class="form-label">detail :</label>
        @error("detail")
        {{ $message }}
        @enderror
    </div>

</form>


