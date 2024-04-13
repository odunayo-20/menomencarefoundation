<div>
    <style>
                    .page-header {
    background: linear-gradient(rgba(145, 48, 48, 0.1), rgba(0, 0, 0, .1)), url({{ asset('frontend/event/IMG9.jpg') }}) center center no-repeat;
    background-size: cover;
}

    </style>
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-2 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4 animated slideInDown">About Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary" aria-current="page">About Us</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->




    <!-- About Start second-->
    <div class="container-fluid container-team py-5">
        <div class="container pb-5">
            <div class="row g-5 align-items-center mb-5">
                <div class="col-md-6 wow fadeIn" data-wow-delay="0.3s">
                    <img class="img-fluid w-100" style='height:400px; object-fit:cover; object-position:100% 55%;' src="{{ asset('frontend/img/about/chairman.jpg') }}" alt="">
                </div>
                <div class="col-md-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-6 mb-3">Mr Abitogun Olagbemi
                    </h1>
                    <p class="mb-1 text-capitalize">Chairman and visionary</p>
                    {{-- <p class="mb-5">Labsky, New York, USA</p> --}}

                    <div class="d-flex">
                        <a class="btn btn-lg-square btn-primary me-2" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-lg-square btn-primary me-2" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-lg-square btn-primary me-2" href=""><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-lg-square btn-primary me-2" href=""><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="row g-5 align-items-center mb-5">
                <div class="col-md-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-6 mb-3">Mrs Olagbemi Abitogun Blessing</h1>
                    <p class="mb-1  text-capitalize"> Co-visionary and Secretary.</p>
                    {{-- <p class="mb-5">Labsky, New York, USA</p> --}}

                    <div class="d-flex">
                        <a class="btn btn-lg-square btn-primary me-2" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-lg-square btn-primary me-2" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-lg-square btn-primary me-2" href=""><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-lg-square btn-primary me-2" href=""><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-md-6 wow fadeIn" data-wow-delay="0.3s">
                    <img class="img-fluid w-100" style='height:400px; object-fit:cover; object-position:100% 20%;' src="{{ asset('frontend/img/about/co-visionary.jpg') }}" alt="">
                </div>

            </div>
        </div>
    </div>
    <!-- About End second-->


<div class="container-fluid container-service py-3">
    <div class="container">

       <div class="row g-5">
        <div class='col-md-6 wow fadeInUp' data-wow-delay="0.5s">
            <h6 class="display-6">VISION</h6>
            <p>TO INCREASE PEOPLES HEALTH CONSCIOUSNESS THROUGH PUBLIC HEALTH EDUCATION AIMED AT DISEASE REDUCTION, IMPROVING ACCESS TO MATERNAL & CHILD HEALTH CARE, IMPROVE WELLNESS AND HEALTH SEEKING BEHAVIOUR OF THE PEOPLE TO ENHANCE THEIR QUALITY OF LIFE AND PRODUCTIVITY</p>
            <h6 class="display-6">MISSION</h6>
            <p>TO DEVELOP AND PROMOTE THE WELL-BEING OF THE PEOPLE IN COMMUNITIES IN AFRICA, NIGERIA, BY INCREASING ACCESS TO HEALTH CARE SERVICES THROUGH COMMUNITY MEDICAL OUTREACH, HEALTH TALK IN SCHOOLS AND RURAL AREAS, PROMPT REFERRAL SERVICES TO HOSPITAL WHERE NECCESORY WITH SUPPORT SYSTEM AND ENGAGING THEM IN ACTIVITY THAT IMPROVE HEALTHY LIVING.</p>

            <h1 class="display-6">GOALS</h1>
            <p>CREATING LIMITLESS OPPORTUNITIES THROUGH BETTER HEALTH.</p>
        </div>
        <div class='col-md-6 wow fadeInUp' data-wow-delay="0.5s">
            <h1 class="display-6">AIMS AND OBJECTIVES</h1>
            <ol class="list" style='font-size:15px;'>
                <li>TO CONTRIBUTE TO THE STRENGHTNING OF HEALTH-SEEKING BEHAVIOUR OF THE PUBLIC AND THE HEALTH CARE DELIVERY SYSTEM.</li>
                <li>TO DEVELOP AND PROMOTE INNOVATIVE WAYS OF ENGAGING PEOPLE TO CONTRIBUTE TO AFRICA AND NIGERIA’S SUSTAINABLE DEVELOPMENT ESPECIALLY IN THE AREAS OF HEALTH THROUGH COLLECTIVE COLLABORATIVE AND ACTIVE PARCITIPATION.</li>
                <li>TO IMPROVE THE QUALITY OF LIFE AND HEALTH OF THE RURAL POPULATIONS.</li>
                <li>TO CREAT AWARENESS, INFORM, EDUCATE AND EMPOWER PEOPLE ABOUT HEALTH RELATED ISSUES.</li>
                <li>TO PROMOTE ENVIRONMENTAL FRIENDLY ACTIVITITIES AIMED AT REDUCTION OF DEGREDATION AND WASTE MANAGEMNET.</li>
                <li>TO DEVELOP AND MAINTAIN NETWORK AND PATNERSHIP WITH ALL THE TIERS OF GOVERNMNET, NON GOVERNMENT ORGANISATIONS AND INTERNATIONAL ORGANISATIONS FOR PUBLIC HEALTH PROMOTION.</li>
                <li>TO INCREASE PEOPLES HEALTH CONSCIOUSNESS THROUGH PUBLIC HEALTH EDUCATION AIMED AT DISEASE REDUCTION, IMPROVED WELLNESS AND AN ENHANCED QUALITY OF LIFE AND PRODUCTIVITY.</li>
            </ol>
        </div>
       </div>

    </div>
</div>
{{-- vision end --}}

<!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-5 fw-medium text-dark">Our Team</h1>
            </div>
            <div class="row g-4">
                @if($teams->isEmpty())
                    <p>No Record</p>
                @endif
                @foreach ($teams as $team)

                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded overflow-hidden pb-4">
                        <img class="img-fluid mb-4" style="height: 200px; width:100%; object-fit:cover; object-position:100% 50%;" src="{{ Storage::url($team->image) }}" alt="">
                        <h5 style="text-transform: capitalize">{{ $team->name }}</h5>
                        <span title="Profession" class="d-block fw-bold" style="text-transform: capitalize">{{ $team->profession }}</span>
                        <span title="Position" class="text-primary" style="text-transform: capitalize">{{ $team->position }}</span>
                      
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </div>
    <!-- Team End -->

</div>
