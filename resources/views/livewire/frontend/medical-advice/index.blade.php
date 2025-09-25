<div>
    <style>
        .page-header {
            background: linear-gradient(rgba(145, 48, 48, 0.1), rgba(0, 0, 0, .1)), url({{ asset('frontend/event/IMG3.jpg') }}) center center no-repeat;
            background-size: cover;
            background-position: 100% 20%;
        }
    </style>

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4 animated slideInDown">Medical Advice</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary" aria-current="page">Medical Advice</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Medical Advice Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="display-5 mb-3 fw-medium">Health & Wellness Guidance</h1>
                <p class="mb-5">Professional medical advice and health tips for your wellbeing</p>
            </div>

            <!-- Search Section -->
            <div class="row justify-content-center mb-5 wow fadeInUp" data-wow-delay="0.2s">
                <div class="col-lg-8">
                    <div class="bg-light rounded p-4">
                        <div class="row g-3">
                            <div class="col-md-8">
                                <div class="form-floating">
                                    <input wire:model.live="search" type="text" class="form-control" id="searchInput"
                                        placeholder="Search advice...">
                                    <label for="searchInput">Search medical advice topics...</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button wire:click="$set('search', '')" class="btn btn- h-100 w-100"
                                    style="background: #00989F">
                                    <i class="fa fa-refresh"></i> Clear Search
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Medical Advice Grid -->
            <div class="row g-4 mb-5">
                @forelse($advices as $index => $advice)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.1 + $index * 0.1 }}s">
                        <div class="card h-100 shadow-sm border-0 overflow-hidden">
                            <div class="card-body d-flex flex-column p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-shrink-0 btn-square rounded-circle me-3"
                                        style="background: #00989F">
                                        <i class="fa fa-stethoscope text-white"></i>
                                    </div>
                                    <h5 class="card-title text-succes mb-0 flex-grow-1" style="color: #00989F">
                                        {{ $advice->title }}</h5>
                                </div>

                                <div class="flex-grow-1 mb-4">
                                    <div class="text-muted">
                                        {!! Str::limit(strip_tags($advice->content), 180) !!}
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                    <small class="text-muted">
                                        <i class="fa fa-calendar me-1"></i>
                                        {{ $advice->created_at->format('M d, Y') }}
                                    </small>

                                    <div class="btn-group">
                                        <a href="{{ route('medical_advice.single', $advice->slug) }}" class="btn btn-sm"
                                            style="background: #00989F">
                                            <i class="fa fa-eye me-1"></i> Read More
                                        </a>
                                        {{-- <button class="btn btn-outline-secondary btn-sm"
                                            onclick="shareAdvice('{{ $advice->title }}', '{{ $advice->slug }}')">
                                            <i class="fa fa-share"></i>
                                        </button>
                                        <button class="btn btn-outline-secondary btn-sm"
                                            onclick="copyToClipboard('{{ route('medical_advice.single', $advice->slug) }}')">
                                            <i class="fa fa-copy"></i>
                                        </button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="text-center py-5">
                            <div class="mb-4">
                                <i class="fa fa-stethoscope fa-4x text-muted"></i>
                            </div>
                            <h4 class="text-muted">No Medical Advice Found</h4>
                            <p class="text-muted">
                                @if ($search)
                                    Try adjusting your search terms.
                                @else
                                    No medical advice has been published yet.
                                @endif
                            </p>
                            @if ($search)
                                <button wire:click="$set('search', '')" class="btn btn-success rounded-pill py-2 px-4">
                                    View All Advice
                                </button>
                            @endif
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if ($advices->hasPages())
                <div class="d-flex justify-content-center wow fadeInUp" data-wow-delay="0.3s">
                    {{ $advices->links() }}
                </div>
            @endif

            <!-- Health Tips Section -->
            @if ($advices->count() > 0 && !$search)
                <div class="row justify-content-center mt-5 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="col-lg-10">
                        <div class="bg-succes rounded p-5 text-white text-center" style="background: #00989F">
                            <h3 class="mb-4">Stay Healthy Every Day</h3>
                            <div class="row g-4">
                                <div class="col-md-4">
                                    <div class="d-flex flex-column align-items-center">
                                        <i class="fa fa-heart fa-2x mb-3"></i>
                                        <h5>Heart Health</h5>
                                        <p class="small mb-0">Exercise regularly and maintain a balanced diet</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="d-flex flex-column align-items-center">
                                        <i class="fa fa-brain fa-2x mb-3"></i>
                                        <h5>Mental Wellness</h5>
                                        <p class="small mb-0">Practice mindfulness and stress management</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="d-flex flex-column align-items-center">
                                        <i class="fa fa-apple-alt fa-2x mb-3"></i>
                                        <h5>Nutrition</h5>
                                        <p class="small mb-0">Eat plenty of fruits and vegetables daily</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="#" class="btn btn-light rounded-pill py-3 px-5">
                                    <i class="fa fa-envelope me-2"></i>Subscribe for Health Tips
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Disclaimer Section -->
            {{-- <div class="row mt-5 wow fadeInUp" data-wow-delay="0.5s">
                <div class="col-12">
                    <div class="alert alert-warning" role="alert">
                        <h5 class="alert-heading"><i class="fa fa-exclamation-triangle me-2"></i>Medical Disclaimer
                        </h5>
                        <p class="mb-0">The information provided here is for educational purposes only and should not
                            replace professional medical advice. Always consult with a qualified healthcare provider
                            before making any medical decisions or changes to your treatment plan.</p>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- Medical Advice End -->
</div>

