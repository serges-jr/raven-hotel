<form method="post" id="CommentForm" name="CommentForm" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" id="id">
    <div class="form-floating mb-2">
        <textarea name="content" id="content" cols="30" rows="10" value="{{ old('content') }}" ></textarea>
        <label for="name" class="form-label">name :</label>
    </div>
</form>


