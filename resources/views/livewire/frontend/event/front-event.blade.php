<div>
    <style>
        .page-header {
background: linear-gradient(rgba(145, 48, 48, 0.1), rgba(0, 0, 0, .1)), url({{ asset('frontend/event/IMG1.jpg') }}) center center no-repeat;
background-size: cover; background-position:100% 30%;
}

</style>
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4 animated slideInDown">Event</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary" aria-current="page">Events</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


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
        <div class="col-md-8">
           <div class="row">
            @if($lastestEvents->isEmpty())
            <p>No Records</p>
            @else
            @foreach ($lastestEvents as $value)
           <div class="col-md-6 mb-3 wow fadeInUp" data-wow-delay="0.5s">
            <div class="car service-item position-relative ">
                <a href="events/view/{{ $value->id }}">
                    <img src="{{ Storage::url($value->image) }}" class="card-img-top" style="height:300px; object-fit:cover; object-position: 100% 0%" alt="...">
                </a>
                <div class="card-body">
                    <h5 class="mb-3" style="font-size: 15px">{{ Str::limit($value->title, 100, '...') }}</h5>
                </div>
                    <div class="card-link">
                        <a class="text-primary fw-medium"
                            href="events/view/{{ $value->id }}">Read More<i
                                class="bi bi-chevron-double-right ms-2"></i></a>
                    </div>
            </div>
           </div>

        @endforeach
        @endif
           </div>
           <div class='my-2'>
            {{ $lastestEvents->links() }}
           </div>
        </div>
        <div class="col-md-4">

            <div class="card my-3">

                <div class="card-body">
                    <h5 class="card-title">Past Events</h5>

                    <div class="col-md-12">
                        @if($past->isEmpty())
                        <p>No Records</p>
                        @else
                        @foreach ($past as $value)
                        <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="servic-item positio-relative ">
                                <div class="row my-2">
                                    <div class="col-md-6">
                                        <a href="events/view/{{ $value->id }}">
                                            <img class="card-img-top img-fluid rounded"
                                            style="width: 100%; height: 150px; object-fit:cover; object-position:100% 0%"
                                            src="{{ Storage::url($value->image) }}" alt="past event">
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-2" style="font-size:12px;"> <a class="text-primary fw-medium"
                                            href="events/view/{{ $value->id }}">{{ Str::limit($value->title, 100, '...') }}</a> </p>
                                        <p class="mb-2" style="font-size:12px;"> {{ $value->date }}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <hr>
                    @endforeach
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


            </div>


        </div>





    </div>
    <!-- Event End -->




</div>
