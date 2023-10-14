<div class="container-fluid bg-dark text-light footer wow fadeIn mt-5" data-wow-delay="0.1s">
    <div class="container pb-5">
        <div class="row g-5">
            <div class="col-md-3">
                <h6 class="section-title text-start text-primary text-uppercase mb-4">Contact</h6>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>route raven, douala, cameroun</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+237 656064154</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>raven@dev.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href=""><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i
                            class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row gy-5 g-4">
                    <div class="col-md-6">
                        <h6 class="section-title text-start text-primary text-uppercase mb-4">
                            {{ $hotel }}</h6>
                        <a class="btn btn-link" href="{{ route('about') }}">About Us</a>
                        <a class="btn btn-link" href="{{ route('contact') }}">Contact Us</a>
                        <a class="btn btn-link" href="{{ route('about') }}">Privacy Policy</a>
                        <a class="btn btn-link" href="{{ route('about') }}">Terms & Condition</a>
                        <a class="btn btn-link" href="{{ route('about') }}">Support</a>
                    </div>
                    <div class="col-md-6">
                        <h6 class="section-title text-start text-primary text-uppercase mb-4">Services</h6>
                        <a class="btn btn-link" href="{{ route('service') }}">Food & Restaurant</a>
                        <a class="btn btn-link" href="{{ route('service') }}">Spa & Fitness</a>
                        <a class="btn btn-link" href="{{ route('service') }}">Sports & Gaming</a>
                        <a class="btn btn-link" href="{{ route('service') }}">Event & Party</a>
                        <a class="btn btn-link" href="{{ route('service') }}">GYM & Yoga</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h6 class="section-title text-start text-primary text-uppercase mb-4">pages</h6>
                <a class="btn btn-link" href="{{ route('team') }}">our team</a>
                <a class="btn btn-link" href="{{ route('temoin') }}">testimonial</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">{{ $hotel }}</a>, All Right
                    Reserved.</a>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="">Home</a>
                        <a href="">Cookies</a>
                        <a href="">Help</a>
                        <a href="">FQAs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
