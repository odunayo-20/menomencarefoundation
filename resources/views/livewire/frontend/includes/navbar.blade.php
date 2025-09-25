    <!-- Navbar Start -->
    <div class="container-fluid bg-primry sticky-top" style="background: #3050AB">
        <style>

.page-header .breadcrumb-item+.breadcrumb-item::before {
    color: var(--light);
}

.page-header .breadcrumb-item,
.page-header .breadcrumb-item a {
    font-size: 18px;
    color: var(--light);
}


/*** About ***/
.about {
    background: linear-gradient(rgba(0, 0, 0, .1), rgba(0, 0, 0, .1)), url({{ asset('event/IMG17.jpg') }}) left center no-repeat;
    background-size: cover;
}
        </style>
        <div class="container">
            <nav class="navbar navbar-expand-lg text-white navbar-light p-lg-0" style="background: #3050AB">
                <a href="{{ route('index') }}" class="navbar-brand d-lg-none">
                    {{-- <h1 class="fw-bold m-0">NGO's</h1> --}}
                    <img class="rounded" style="width: 100px; height:70px; object-fit:contain; object-position:50% 50%;" src="{{ asset('frontend/img/logo/name.png') }}" alt="">
                </a>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <style>
                    .navbar-nav a{
                        font-size: 14px !important;
                    }
                </style>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="{{ route('index') }}" class="nav-item nav-link active text-white">Home</a>
                        <a href="{{ route('about') }}" class="nav-item nav-link text-white">About</a>
                        <a href="{{ route('contact') }}" class="nav-item nav-link text-white">Contact</a>
                        <a href="{{ route('service') }}" class="nav-item nav-link text-white">Services</a>
                        <a href="{{route('event_front')}}" class="nav-item nav-link text-white">Events</a>
                        <a href="{{route('memberships')}}" class="nav-item nav-link text-white">Membership</a>
                        <a href="{{route('volunteers')}}" class="nav-item nav-link text-white">Volunteers</a>

                        <a href="{{route('gallery')}}" class="nav-item nav-link text-white">Gallery</a>
                        <a href="{{route('testimonial')}}" class="nav-item nav-link text-white">Testimonial</a>
                        <a href="{{route('bible_quote')}}" class="nav-item nav-link text-white">Bible Quote</a>
                        <a href="{{route('medical_advice')}}" class="nav-item nav-link text-white">Medical Advice</a>
                        <a href="{{ route('donate') }}" class="nav-item nav-link text-white d-lg-none">Donate</a>

                        </div>
                    </div>
                    <div class="ms-auto d-none d-lg-block">
                        <a href="{{ route('donate') }}" class="btn rounded-pill py-2 px-3 text-white" style="background: #00989F">Donate</a>
                    </div>
                </div>
            </nav>
        </div>
        {{-- style="background: #4e7af5" --}}
    </div>
    <!-- Navbar End -->
