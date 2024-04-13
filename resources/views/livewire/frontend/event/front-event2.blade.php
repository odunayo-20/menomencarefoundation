<div>
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4 animated slideInDown">Event</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary" aria-current="page">Event</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium text-primary">Our Event Section</p>
                {{-- <h1 class="display-5 mb-5">Digital Marketing Services that We Offer</h1> --}}
            </div>
            <div class="row g-4">
                <div class="col-md-12">
                    <h4>Lastest Events</h4>
                </div>

                @if($lastestEvents->isEmpty())
                    <p>No Records</p>
                    @else
                    @foreach ($lastestEvents as $value)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item position-relative h-100">
                            <div class="service-text rounded p-5">
                                <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                    style="width: 100px; height: 100px;">
                                    <img class="img-fluid rounded-circle "
                                        style="width: 100px; height: 100px; object-fit:cover; object-position:100% 0%"
                                        src="{{ Storage::url($value->image) }}" alt="Icon">
                                </div>
                                <h5 class="mb-3">{{ Str::limit($value->title, 50, '...') }}</h4>
                                    <p class="mb-0">{{ Str::limit($value->content, 50, '...') }}</p>
                            </div>
                            <div class="service-btn rounded-0 rounded-bottom">
                                <a class="text-primary fw-medium"
                                    href="view/{{ $value->id }}/{{ $value->uid }}">Read More<i
                                        class="bi bi-chevron-double-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif

            </div>
            <div class="row g-4">
                <div class="col-md-12">
                    <h4>Past Events</h4>
                </div>

                @if($pastEvents->isEmpty())
                    <p>No Record</p>
                @else

                @endif
                @foreach ($pastEvents as $value)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item position-relative h-100">
                            <div class="service-text rounded p-5">
                                <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                    style="width: 100px; height: 100px;">
                                    <img class="img-fluid rounded-circle "
                                        style="width: 100px; height: 100px; object-fit:cover; object-position:100% 0%"
                                        src="{{ Storage::url($value->image) }}" alt="Icon">
                                </div>
                                <h5 class="mb-3">{{ Str::limit($value->title, 50, '...') }}</h4>
                                    <p class="mb-0">{{ Str::limit($value->content, 50, '...') }}</p>
                            </div>
                            <div class="service-btn rounded-0 rounded-bottom">
                                <a class="text-primary fw-medium"
                                    href="view/{{ $value->id }}/{{ $value->uid }}">Read More<i
                                        class="bi bi-chevron-double-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Service End -->




</div>
