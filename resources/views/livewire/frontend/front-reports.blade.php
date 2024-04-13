<div>
    <style>
        .page-header {
background: linear-gradient(rgba(145, 48, 48, 0.1), rgba(0, 0, 0, .1)), url({{ asset('frontend/event/IMG12.jpg') }}) center center no-repeat;
background-size: cover; background-position:100% 20%;
}

</style>
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-2 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4 animated slideInDown">Our Reports</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary" aria-current="page">Our Reports</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    
     <!-- Service Start -->
     <div class="container-fluid container-service py-5">
        <div class="container py-5">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="display-5 mb-5 fw-medium">Our Reports</h1>
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
        
            @foreach ($report as $value)

            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item rounded overflow-hidden pb-4">
                    <div class="card-body p-3">
                    <div class="card-title">
                        <h1 class="display-6 fs-6 fw-bold" style="text-transform: capitalize; text-align: justify; font-size:14px">{{$value->title}}</h1>
                    </div>
                    <p class="card-text fw-medium" style="text-transform: capitalize; text-align: justify; font-size:14px">{!! $value->summary !!}</h5>
                </div>
                   <button wire:click='downloadFile({{$value->id}})' class="btn btn-primary my-2">Download Here</button>
                </div>
            </div>
            @endforeach

        </div>
        <div class="text-center mx-auto wow fadeInUp mt-3" data-wow-delay="0.1s" style="max-width: 600px;">
            {{ $report->links() }}

        </div>
        </div>
    </div>
    <!-- Service End -->
    




</div>
