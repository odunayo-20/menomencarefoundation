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
                    <li class="breadcrumb-item text-primary" aria-current="page">Event</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center text-capitalize  mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-5 fw-medium">Our Event Details</h1>
            </div>
            <div class="row g-4">




                <div class="car p-2 text-whit" >
                    {{-- <p><strong>Posted at</strong>: {{ $event->created_at->format('j F, Y, h : iA' ) }}</p> --}}

                    <p><strong>Posted</strong>: {{ $event->created_at->diffForHumans() }}</p>
                    <h5 class="card-title text-whit" style="text-align: justify">{{ $event->title }}</h5>
                    <img src="{{ Storage::url($event->image) }}" class="card-im img-responsive h-5" style="width: 100%; height:500px; object-fit:cover; object-position:50% 20%;" alt="...">

                        <p class="card-text"  style="text-align: justif">{!! $event->content !!}</p>

                        <p class="card-text" style='text-align:justify'><strong>Location: </strong>{{ $event->location }}</p>
                        <p class="card-text "> <span>Date: {{$event->date}}</span> <span class='float-end'>Time: {{ \Carbon\Carbon::createFromFormat('H:i:s', $event->time)->format('h:i A') }}</span></p>

                    <div class="row">
                        @foreach ($imageUpload as $value)
                            <div class="col-md-3 mb-2">
                                <img src="{{ Storage::url($value->images) }}" class="img-fluid img-thumbnail" style="width: 100%; height:200px; object-fit:cover; object-position:100% 20%;" alt="" srcset="">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->




</div>
