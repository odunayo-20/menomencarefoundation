<div>

    <style>
        .page-header {
background: linear-gradient(rgba(145, 48, 48, 0.1), rgba(0, 0, 0, .1)), url({{ asset('frontend/event/IMG14.jpg') }}) center center no-repeat;
background-size: cover; background-position:100% 20%;
}

</style>


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4 animated slideInDown">Testimonial</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary" aria-current="page">Testimonial</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Testimonial Start -->
    <div class="container-xxl pt-5">
        <div class="container">
            <div class="text-center text-md-start pb-5 pb-md-0 wow fadeInUp" data-wow-delay="0.1s"
                style="max-width: 500px;">
                <h1 class="display-5 mb-5 fw-medium">Testimonials</h1>
            </div>
            <div class="row g-4">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                @if($testimonial->isEmpty())
        <p>No Record</p>
                @else
                @foreach ($testimonial as $value)

                <div class="col-lg-6 col-md-6 my-2 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded overflow-hidden pb-4">
                        <video class=" mb-4" style="height: 300px; width:100%;" controls>
                            <source src="{{ Storage::url($value->video) }}" type="">
                            </video>
                        <p style="font-size: 12px;">{!! $value->content !!}</p>
                        <span class="d-block fw-bold" style="text-transform: capitalize">{{ $value->name }}</span>
                        <span class="text-primary" style="text-transform: capitalize">{{ $value->profession }}</span>

                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <div class="mt-4">
                {{$testimonial->links()}}
            </div>

                            </div>

                        <div class="col-md-4">
                            <p class="mb-4 fw-medium fs-4">Share Your Testimonial Here</h3>
                            <form wire:submit.prevent='store'>
                        <div class="row g-3">
                            @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fa fa-exclamation-circle me-2"></i>{{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" wire:model='name' class="form-control" id="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" wire:model='profession' class="form-control" id="subject" placeholder="Subject">
                                    <label for="subject">Profession</label>
                                    @error('profession')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea wire:model='message' class="form-control" placeholder="Leave a message here" id="message" style="height: 200px"></textarea>
                                    <label for="message">Message</label>
                                    @error('message')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>

                            </div>
                        </div>
                        </div>


            </div>
        </div>
    </div>
    <!-- Testimonial End -->




</div>
