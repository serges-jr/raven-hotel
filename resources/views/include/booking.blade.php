<div class="container-fluid booking wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <div class="bg-white shadow p-4" style="border-radius: 10px">
            <form action="{{ route('book') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="row g-2">
                <div class="col-md-10">
                    <div class="row g-2">
                        <div class="col-md-3">
                                <label for="" class="form-label">date Debut :</label>
                                <input type="date" class="form-control radius" name="dateE"  id="dateDebut"/>
                                @error('dateE')
                                    {{$message}}
                                @enderror
                        </div>
                        <div class="col-md-3">
                                <label for="" class="form-label">date Fin :</label>
                                <input type="date" class="form-control radius" name="dateF" id="dateFin"/>
                                @error('dateF')
                                    {{$message}}
                                @enderror
                        </div>
                        <div class="col-md-3">
                                <label for="" class="form-label">Adulte :</label>
                                <input type="number" name="Adulte" id="Adulte" class="form-control" min="1">
                                @error('Adulte')
                                    {{$message}}
                                @enderror
                        </div>
                        <div class="col-md-3">
                                    <label class="form-label">Enfant :</label>
                                    <input type="number" class="form-control" name="Enfant" id="Enfant" min="1">
                                @error('Enfant')
                                    {{$message}}
                                @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-2 pt-4">
                    <button class="btn btn-primary w-100" style="border-radius: 5px;margin-top: 5px" type="submit">valider</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
