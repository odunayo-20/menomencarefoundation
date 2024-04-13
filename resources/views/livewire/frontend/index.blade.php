<div>
    <!-- Carousel Start -->
    <div class="container-fluid px-0 mb-2">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">

                    <img class="w-100" style="height: 600px; width:100%; object-fit:cover; object-position:100% 50%;"
                        src="{{ asset('frontend/event/IMG1.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7 text-start">
                                    <p class="fs-4 text-white animated slideInRight">Welcome to
                                        <strong>Menoman Care Foundation</strong>
                                    </p>
                                    <h1 class="display-1 text-white mb-4 animated slideInRight">Help Others By Rendering
                                        Selfless Services</h1>
                                    <a href="{{route('donate')}}" class="btn text-white rounded-pill py-3 px-5 animated slideInRight"
                                        style="background: #00989F">Donate</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">

                    <img class="w-100" style="height: 600px; width:100%; object-fit:cover; object-position:100% 50%;"
                        src="{{ asset('frontend/event/IMG2.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-lg-7 text-end">
                                    <p class="fs-4 text-white animated slideInLeft">Welcome to <strong>Menoman Care
                                            Foundation</strong>
                                    </p>
                                    <h1 class="display-1 text-white mb-5 animated slideInLeft">Ready To Grow and Help
                                        The Charity</h1>
                                    <a href="{{route('donate')}}" class="btn text-white rounded-pill py-3 px-5 animated slideInLeft"
                                        style="background: #00989F">Donate</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">

                    <img class="w-100" style="height: 600px; width:100%; object-fit:cover; object-position:100% 50%;"
                        src="{{ asset('frontend/event/IMG15.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-lg-7 text-end">
                                    <p class="fs-4 text-white animated slideInRight">Welcome to <strong>Menoman Care
                                            Foundation</strong>
                                    </p>
                                    <h1 class="display-1 text-white mb-5 animated slideInRight">Ready To Grow and Help
                                        The Charity</h1>
                                    <a  href="{{route('donate')}}" class="btn text-white rounded-pill py-3 px-5 animated slideInRight"
                                        style="background: #00989F">Donate</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start second-->

    <div class="container-fluid container-service">
        <div class="container p-5">


            <div class="row g-5">
                <div class='col-md-6 wow fadeInUp' data-wow-delay="0.5s">
                    <h6 class="display-6 fs-2 fw-medium ">VISION</h6>
                    <p>TO INCREASE PEOPLES HEALTH CONSCIOUSNESS THROUGH PUBLIC HEALTH EDUCATION AIMED AT DISEASE
                        REDUCTION, IMPROVING ACCESS TO MATERNAL & CHILD HEALTH CARE, IMPROVE WELLNESS AND HEALTH SEEKING
                        BEHAVIOUR OF THE PEOPLE TO ENHANCE THEIR QUALITY OF LIFE AND PRODUCTIVITY</p>



                </div>
                <div class='col-md-6 wow fadeInUp' data-wow-delay="0.5s">
                    <h6 class="display-6 fs-2 fw-medium">MISSION</h6>
                    <p>TO DEVELOP AND PROMOTE THE WELL-BEING OF THE PEOPLE IN COMMUNITIES IN AFRICA, NIGERIA, BY
                        INCREASING ACCESS TO HEALTH CARE SERVICES THROUGH COMMUNITY MEDICAL OUTREACH, HEALTH TALK IN
                        SCHOOLS AND RURAL AREAS, PROMPT REFERRAL SERVICES TO HOSPITAL WHERE NECCESORY WITH SUPPORT
                        SYSTEM AND ENGAGING THEM IN ACTIVITY THAT IMPROVE HEALTHY LIVING.</p>
                </div>
            </div>
            <div class="text-center mx-auto wow fadeInUp mt-3" data-wow-delay="0.1s" style="max-width: 600px;">
                <a href="{{ route('about') }}" class="btn btn-lg btn-primary">Read More<i
                        class="bi bi-chevron-double-right ms-2"></i></a>

            </div>

        </div>
    </div>

    <!-- About End second-->




    <!-- Service Start -->
    <div class="container-fluid container-service py-5">
        <div class="container py-5">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="display-5 mb-5 fw-medium">Our Services</h1>

            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <div class="icon-box-primary mb-4">
                            <i class="bi bi-heart-pulse text-dark"></i>
                        </div>
                        <h5 class="mb-3">Medical Expert</h4>
                            <p class="mb-4">This is an avenue where our team of Medical expect move to rural settle to
                                administer treatment to the no help.</p>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item">
                        <div class="icon-box-primary mb-4">
                            <i class="bi bi-lungs text-dark"></i>
                        </div>
                        <h5 class="mb-3">First Aid Empowerment</h4>
                            <p class="mb-4">First Aid certification empowers individuals to respond confidently in
                                emergencies by providing immediate response and initial care, teaching basic life-saving
                                techniques in a rural environment.
                            </p>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item">
                        <div class="icon-box-primary mb-4">
                            <i class="bi bi-virus text-dark"></i>
                        </div>
                        <h5 class="mb-3">Health and Disease Awareness education</h4>
                            <p class="mb-4"> This help to create awareness on diseases outbreak and government
                                intervention to circumvent the spread.
                            </p>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item">
                        <div class="icon-box-primary mb-4">
                            <i class="bi bi-capsule-pill text-dark"></i>
                        </div>
                        <h5 class="mb-3">Human Capital Development</h4>
                            <p class="mb-4">Being unhealthy depressed give us inability to be counter productive, need
                                for us to train or educate our rural audience on how to live and eat healthy food, also
                                to take their personal hygiene seriously.

                            </p>

                    </div>
                </div>

            </div>
            <div class="text-center mx-auto wow fadeInUp mt-3" data-wow-delay="0.1s" style="max-width: 600px;">
                <a href="{{ route('service') }}" class="btn btn-lg btn-primary">Read More<i
                        class="bi bi-chevron-double-right ms-2"></i></a>

            </div>
        </div>
    </div>
    <!-- Service End -->



    <!-- Event Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-5 fw-medium">Our Events</h1>
            </div>
            <div class="row g-4">
                <div class="col-md-12">
                    <h4 class="my-2">Latest Events</h4>
                </div>
                <div class="col-md-12">
                    <div class="row">

                        @if($lastestEvents->isEmpty())
                        <p>No Records</p>
                        @else
                        @foreach ($lastestEvents as $value)
                        <div class="col-md-4 mb-3 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="car service-item position-relative ">
                                <a href="events/view/{{ $value->id }}">
                                    <img src="{{ Storage::url($value->image) }}" class="card-img-top"
                                        style="height:300px; object-fit:cover; object-position: 100% 0%" alt="...">
                                </a>
                                <div class="card-body">
                                    <h5 class="mb-3" style="font-size: 15px">{!! Str::limit($value->title, 100,
                                        '...') !!}</h4>
                                        
                                </div>
                                <div class="card-link">
                                    <a class="text-primary fw-medium" href="events/view/{{ $value->id }}">Read
                                        More<i class="bi bi-chevron-double-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>

                        @endforeach
                        @endif


                    </div>
                    @if($lastestEvents->isNotEmpty())

                    <div class="text-center mx-auto wow fadeInUp mt-3" data-wow-delay="0.1s" style="max-width: 600px;">
                        <a href="{{ route('event_front') }}" class="btn btn-lg btn-primary">Read More <i
                                class="bi bi-chevron-double-right ms-2"></i></a>

                    </div>
                    @endif
                </div>


            </div>


        </div>





    </div>
    <!-- Event End -->




    <!-- Report Start -->
    <div class="container-xxl py-5">
        <div class="container">

            <div class="text-center mx-auto wow fadeInUp py-4 my-4" data-wow-delay="0.1s" style="max-width: 500px;">

                <h1 class="display-5 mb-5 fw-medium">Our Report</h1>
            </div>
            <div class="row g-4">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa fa-exclamation-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if(session('error'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="fa fa-exclamation-circle me-2"></i>{{ session('warning') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if($report->isEmpty())
                <p>No Records</p>
                @else
                @foreach ($report as $value)

                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded overflow-hidden pb-4">
                        <div class="card-body p-3">
                            <div class="card-title">
                                <h1 class="display-5 fs-6 text-capitalize">{{$value->title}}</h1>
                            </div>
                            <p class="card-text fw-medium"
                                style="text-transform: capitalize; text-align: justify; font-size:14px">{!! $value->summary   !!}
                                </h5>
                        </div>
                        <button wire:click='downloadFile({{$value->id}})' class="btn btn-primary my-2">Download
                            Here</button>
                    </div>
                </div>
                @endforeach
                @endif

            </div>
            @if($report->isNotEmpty())
            <div class="text-center mx-auto wow fadeInUp mt-3" data-wow-delay="0.1s" style="max-width: 600px;">
                <a href="{{ route('report') }}" class="btn btn-lg btn-primary">Read More <i
                    class="bi bi-chevron-double-right ms-2"></i></a>
                </div>
                @endif
        </div>
    </div>
    <!-- Report End -->


    <!-- Testimonial Start -->
    <div class="container-xxl pt-5">
        <div class="container">
            <div class="text-center text-md-start pb-5 pb-md-0 wow fadeInUp" data-wow-delay="0.1s"
                style="max-width: 500px;">
                <h1 class="display-5 fs5 fw-medium">Testimonial</h1>
                <p class="fs-6 fw-medium mb-5 text-capitalize">Testimonial from people we impacted their lives</p>
            </div>
            @if($testimonial->isEmpty())
            <p>No Records</p>
            @else
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                @foreach ($testimonial as $value)

                <div class="testimonial-item rounded p-4 p-lg-5 mb-5">
                    <p class="mb-4" style="font-size:14px; text-align:justify">{!!  $value->content !!}</p>
                    <h5 class="text-capitalize">{{$value->name}}</h5>
                    <span class="text-primary text-capitalize">{{ $value->profession }}</span>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
</div>
