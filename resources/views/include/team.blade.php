<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">Notre équipe</h6>
            <h1 class="mb-5">Découvrez notre <span class="text-primary text-uppercase">personnel</span></h1>
        </div>
        <div class="row g-4">
            @php $nb = 0.1 @endphp
            @foreach ($emplois as $emploi)
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="{{$nb}}s">
                <div class="rounded shadow overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid" src="{{ $emploi->imageUrl() }}" alt="" style="width: 100%;height: 300px;">
                        <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                            <a class="btn btn-square btn-primary mx-1" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary mx-1" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-primary mx-1" href=""><i
                                    class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4 mt-3">
                        <h5 class="fw-bold mb-0">{{$emploi->name.' '.$emploi->lastname}}</h5>
                        <small>{{$emploi->fonction}}</small>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
