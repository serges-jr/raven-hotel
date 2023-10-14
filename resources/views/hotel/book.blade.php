@extends('layout.base')
@section('title', 'les chambres')
@section('content')
    <!-- Room Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp mb-3" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Nos Chambres</h6>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card p-2 rounded-3 shadow">
                        <div class="card-title">
                            <h3 class="ms-3 fs-4 fw-light text-uppercase">filtres</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('book') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-2 p-2" style="background-color: #f1f8ff;">
                                    <h3 class="fs-6 fw-light text-uppercase">Verifier la Disponibiliter</h3>
                                    <div class="col mb-2">
                                        <label for="dateE" class="form-label">date debut :</label>
                                            <div class="date" id="date1" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input radius" name="dateE"
                                                    placeholder="date Debut :" data-target="#date1" data-toggle="datetimepicker"  value="{{ $post['dateE'] }}"/>
                                            </div>
                                    </div>
                                    <div class="col mb-2">
                                        <label for="dateF" class="form-label">date fin :</label>
                                            <div class="date" id="date2" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-inpu radiust" name="dateF" placeholder="date Fin :" data-target="#date2" data-toggle="datetimepicker" value="{{ $post['dateF'] }}"/>
                                            </div>
                                    </div>
                                </div>
                                <div class="mb-2 rounded-1 p-2" style="background-color: #f1f8ff;">
                                    <h3 class="fs-6 fw-light text-uppercase">installation</h3>
                                    @foreach ($features as $feature)
                                        <span>
                                            <input type="checkbox" name="feature[]" class="form-check-input feature"
                                                i={{ $feature->id }} state value="{{ $feature->id }}">
                                            <label for="" class="form-checklabel"> {{ $feature->name }} </label>
                                        </span><br>
                                    @endforeach
                                </div>
                                <div class="mb-2 rounded-1 p-2" style="background-color: #f1f8ff;">
                                    <h3 class="fs-6 fw-light text-uppercase">Equipment :</h3>
                                    @foreach ($equipments as $equipment)
                                        <span>
                                            <input type="checkbox" name="equipments[]" id="equipment_id"
                                                class="form-check-input" value="{{ $equipment->id }}">
                                            <label for="" class="form-checklabel">
                                                {{ $equipment->name }}
                                            </label>
                                        </span><br>
                                    @endforeach
                                </div>
                                <div class="mb-2 rounded-1 p-2" style="background-color: #f1f8ff;">
                                    <h3 class="fs-6 fw-light text-uppercase">guests</h3>
                                    <div class="row">
                                        <div class="col">
                                            <label for="Adulte" class="form-label">Adulte :</label>
                                            <input type="number" name="Adulte" id="Adulte" class="form-control"
                                                value="{{ $post['Adulte'] }}" min="1">
                                        </div>
                                        <div class="col">
                                            <label for="Enfant" class="form-label">Enfant :</label>
                                            <input type="number" name="Enfant" id="Enfant" class="form-control"
                                                value="{{ $post['Enfant'] }}" min="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2 d-flex justify-content-center align-items-center">
                                    <button type="submit" class="btn btn-sm btn-primary">Valider</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    @if (count($filters) >= 1)
                        <div class="row g-4 filter">
                            @foreach ($filters as $filter)
                                <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="room-item shadow rounded overflow-hidden">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                @if ($filter->image !== null)
                                                    <img class="img-fluid w-100 h-100" src="{{ $filter->imageUrl() }}"
                                                        alt="">
                                                @else
                                                    <img src="..." class="img-thumbnail" alt="...">
                                                @endif

                                            </div>
                                            <div class="col-md-8 col-sm-12">
                                                <div class="mt-2">
                                                    <div class="row">
                                                        <div class="col-md-7 col-sm-12">
                                                            <div class="d-flex justify-content-between mb-3">
                                                                <h5 class="mb-0">{{ $filter->category->name }}</h5>
                                                            </div>
                                                            <h5 class="mb-1">Installation</h5>
                                                            <div class="d-flex mb-3 ps-3">
                                                                @foreach ($features as $feature)
                                                                    @php
                                                                        $p = explode(',', $filter->feature);
                                                                    @endphp
                                                                    @foreach ($p as $ps)
                                                                        @if ($ps == $feature->id)
                                                                            <small
                                                                                class="border-end me-3 pe-1">{{ $feature->name }}</small>
                                                                        @endif
                                                                    @endforeach
                                                                @endforeach
                                                            </div>
                                                            <h5 class="mb-1">Equipements</h5>
                                                            <div class="d-flex mb-3 ps-3">
                                                                @foreach ($equipments as $equipment)
                                                                    @php
                                                                        $p = explode(',', $filter->equipments);
                                                                    @endphp
                                                                    @foreach ($p as $ps)
                                                                        @if ($ps == $equipment->id)
                                                                            <small class="border-end me-3 pe-1"><i
                                                                                    class="{{ $equipment->icon }} text-primary me-2"></i>{{ $equipment->name }}</small>
                                                                        @endif
                                                                    @endforeach
                                                                @endforeach
                                                            </div>
                                                            <div class="mb-3">
                                                                <h4>guests</h4>
                                                                <div class="d-flex">
                                                                    <small
                                                                        class="border-end me-3 pe-3">{{ $filter->adulte }}-
                                                                        Adulte</small>
                                                                    <small
                                                                        class="border-end me-3 pe-3">{{ $filter->enfant }}-
                                                                        Enfant</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5 col-sm-12 position-relative">
                                                            <div class="d-flex flex-column align-items-center justify-content-center text-center px-1 position-absolute" style="top: 20%;width: 85%;">
                                                                <small
                                                                    class="start-0 translate-middle-y text-dark rounded py-1">{{ $filter->prix.' '.' '.$intvl->days }}Fcfa/nuit</small>
                                                                <a class="btn-primary text-light w-100 text-center rounded mb-2 filterBtn"
                                                                    href="{{ route('bookOne', ['id' => $filter->id]) }}">réservez</a>
                                                                <a class="btn-dark text-light w-100 text-center rounded"
                                                                    href="{{ route('chambre', ['id' => $filter->id]) }}">Voir
                                                                    détails</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="container wow fadeInUp" data-wow-delay="0.1s">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h1 class="bg-danger text-light rounded-2 px-2">aucunne chambre trouver avec ses
                                        critéres veuillez refaire le filtre pour une nouvel recherche</h1>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Room End -->
@endsection
