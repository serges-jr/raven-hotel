<form method="post" id="ChambreForm" name="ChambreForm" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col col-md-8">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-floating mb-2">
                        <select name="category_id" id="category_id" class="form-control">
                            <option value=""></option>
                            @foreach ($categorys as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <label for="category_id" class="form-label">Name :</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating mb-2">
                        <input type="number" name="surface" id="surface" class="form-control">
                        <label for="surface" class="form-label">surface :</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating mb-2">
                        <input type="number" name="prix" id="prix" class="form-control">
                        <label for="prix" class="form-label">prix :</label>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-2">
                        <input type="number" name="adulte" id="adulte" class="form-control">
                        <label for="adulte" class="form-label">Adult(Max) :</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-2">
                        <input type="number" name="enfant" id="enfant" class="form-control">
                        <label for="enfant" class="form-label">Enfant(Max) :</label>
                    </div>

                </div>
            </div>
            <div class="mb-2">
                <label for="" class="form-label d-block">installation :</label>
                @foreach ($features as $feature)
                    <span>
                        <input type="checkbox" name="feature[]" class="form-check-input feature" i={{ $feature->id }} state value="{{$feature->id}}">
                        <label for="" class="form-checklabel"> {{$feature->name}} </label>
                    </span>
                @endforeach
            </div>
            <div class="mb-2">
                <label for="" class="form-label d-block">Equipment :</label>
                @foreach ($equipments as $equipment)
                <input type="checkbox" name="equipments[]" id="equipment_id" class="form-check-input" value="{{$equipment->id}}">
                <label for="" class="form-checklabel">
                    {{$equipment->name}}
                </label>
                @endforeach
            </div>
            <div class="form-floating mb-2">
                <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                <label for="description" class="form-label">description :</label>
            </div>
        </div>
        <div class="col col-md-4">
            <div>
                <img src="{{ asset('image/about-1.jpg') }}" alt="#" class="img w-100" style="height: 250px">
            </div>
            <div class="form-group mb-2">
                <label for="image" class="form-label">image</label>
                <input type="file" name="image" id="image" class="form-control">
                @error('image')
                    {{ $message }}
                @enderror
            </div>
        </div>
    </div>
</form>
