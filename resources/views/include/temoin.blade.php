<div class="container-xxl testimonial my-5 py-5 bg-dark wow zoomIn" data-wow-delay="0.1s">
    <div class="container">
        <div class="owl-carousel testimonial-carousel py-5">
            @foreach ($comments as $comment)
            <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                <p>{{$comment->content}}</p>
                <div class="d-flex align-items-center">
                    @if($comment->user->imageUrl())
                        <img class="img-fluid flex-shrink-0 rounded" src="{{ $comment->user->imageUrl() }}"
                        style="width: 45px; height: 45px;">
                    @endif
                    <div class="ps-3">
                        <h6 class="fw-bold mb-1">{{$comment->user->name.' '.$comment->user->lastname}}</h6>
                        <small>Profession</small>
                    </div>
                </div>
                <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
            </div>
            @endforeach

        </div>
    </div>
</div>
