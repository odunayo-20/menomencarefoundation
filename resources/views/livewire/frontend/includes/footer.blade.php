<div>
    <!-- Footer Start -->
    <div class="container-fluid footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s" style="background: #3050AB">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-white mb-4">Our Office</h4>
                    <p class="mb-2 text-capitalize"><i class="fa fa-map-marker-alt me-1"></i>033 unity avenue, andrealiz
                        lane, sheda hill side quarters, gbessa, abuja.</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-2"></i>+2348139694827</p>
                    <p class="mb-2"><i class="fa fa-envelope me-1"></i>manomancarefoundation@gmail.com</p>
                    <div class="d-flex pt-3">
                        <a class="btn btn-square btn-light rounded-circle me-2" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-light rounded-circle me-2" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-light rounded-circle me-2" href=""><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-light rounded-circle me-2" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <h4 class="text-white mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="{{ route('about') }}">About Us</a>
                    <a class="btn btn-link" href="{{ route('contact') }}">Contact Us</a>
                    <a class="btn btn-link" href="{{ route('service') }}">Our Services</a>
                    <a class="btn btn-link" href="{{ route('event_front') }}">Our Events</a>
                    <a class="btn btn-link" href="{{ route('gallery') }}">Our Gallery</a>
                </div>

                <div class="col-lg-4 col-md-6">
                    <h4 class="text-white mb-4">Newsletter</h4>
                    <p class="fs-6 fw-medium">Please Enter Your Email For Newsletters Subscriptions</p>
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fa fa-exclamation-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="position-relative w-100">
                        <form wire:submit='store'>
                            <input wire:model='email' class="form-control bg-transparent w-100 py-3 ps-4 pe-5"
                                type="email" placeholder="Your email">
                            @error('email')
                            <span class='text-danger'>{{$message}}</span>
                            @enderror
                            <button type="submit" style="background: #4e7af5"
                                class="btn btn-danger py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                        </form>
                    </div>

                    <!-- Sponsorship -->
                    <div class="mt-3">
                        <h6 class="text-white mb-2">Sponsorship</h6>

                        <div class="d-flex align-items-center">
                            <a href="#" rel="noopener noreferrer"
                                class="d-flex align-items-center text-decoration-none">
                                <img src="{{ asset('frontend/img/sponsorship/youth.jpg') }}"
                                    alt="Youth Rescue Mission" class="img-fluid rounded" style="width:64px;height:64px;object-fit:cover;">
                                <div class="ms-3">
                                    <p class="mb-0 text-white fw-semibold">Youth Rescue Mission</p>
                                    <small class="text-light">Partner supporting youth rescue and rehabilitation</small>
                                </div>
                            </a>
                        </div>

                        <!-- Optional: additional sponsors (uncomment and add assets) -->
                        {{-- <div class="mt-2 d-flex">
                            <a href="#" class="me-3">
                                <img src="{{ asset('frontend/img/sponsorship/sponsor2.jpg') }}" alt="Sponsor 2" class="img-fluid rounded" style="width:48px;height:48px;object-fit:cover;">
                            </a>
                            <a href="#">
                                <img src="{{ asset('frontend/img/sponsorship/sponsor3.jpg') }}" alt="Sponsor 3" class="img-fluid rounded" style="width:48px;height:48px;object-fit:cover;">
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4" style="background: #0e2258">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; {{ date('Y') }} <a class="fw-medium text-light" href="{{ route('admin_login') }}">Menoman
                        Care Foundation</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    Designed By <a class="fw-medium text-light" href="#">Winatech Solutions</a>
                    {{-- Distributed By <a class="fw-medium text-light" href="#">NGO's</a> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-dark btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

</div>
