<div>
    <style>
        .page-header {
background: linear-gradient(rgba(145, 48, 48, 0.1), rgba(0, 0, 0, .1)), url({{ asset('frontend/event/IMG5.jpg') }}) center center no-repeat;
background-size: cover; background-position:100% 30%;
}

</style>
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4 animated slideInDown">Our Gallery</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary" aria-current="page">Our Gallery</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Project Start -->
    <div class="container-xxl pt-5">
        <div class="container">
            <div class="text-center text-md-start pb-5 pb-md-0 wow fadeInUp" data-wow-delay="0.1s"
                style="max-width: 600px;">
                <h1 class=" display-5 fw-medium">Our Gallery</h1>
                <h1 class="display-5 fs-5 fw-medium mb-5">We've Some Images Captured Doing Our Events</h1>
            </div>
            <div class="container-fluid">
                <div class="row">
                    @if ($gallery->isEmpty())
                    <p>No Record</p>
                    @else
                    @foreach ($gallery as $value)
                    <div class="col-md-3">
                        <div class="project-item mb-5">
                            <div class="position-relative">
                                <img src="{{ Storage::url($value->image) }}" alt="" class="img-fluid rounded"
                                    style="height:200px; width:100%; object-fit:cover; object-position:100% 0%;">
                                <div class="project-overlay">
                                    <div class="row">

                                        <p class='col-12' style="margin:0px auto">

                                            <a class="btn btn-sm-square  text-center  btn-light rounded-circle m-1"
                                                href="{{ Storage::url($value->image) }}" data-lightbox="project"><i
                                                    class="fa fa-eye "></i></a>
                                        </p>
                                        <p class="text-white col-12 m-2" style='font-size:12px;'>
                                            {{ $value->title }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
{{ $gallery->links() }}
                </div>
            </div>

        </div>
    </div>
    <!-- Project End -->

</div>
