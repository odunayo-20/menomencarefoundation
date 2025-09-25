
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
            <h1 class="display-4 text-white mb-4 animated slideInDown">{{ $advice->title }}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('medical_advice') }}">Medical Advice</a></li>
                    <li class="breadcrumb-item text-primary" aria-current="page">{{ $advice->title }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Medical Advice Details Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <!-- Back Button -->
            <div class="mb-4 wow fadeInUp" data-wow-delay="0.1s">
                <a href="{{ route('medical_advice') }}" class="btn btn-outline-success rounded-pill px-4 py-2">
                    <i class="fa fa-arrow-left me-2"></i>Back to Medical Advice
                </a>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- Advice Card -->
                    <div class="card border-0 shadow-lg mb-5 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="card-body p-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="flex-shrink-0 btn-square bg-success rounded-circle me-4" style="width: 60px; height: 60px;">
                                    <i class="fa fa-stethoscope text-white fa-2x"></i>
                                </div>
                                <div>
                                    <h1 class="card-title text-success mb-2 fw-medium">{{ $advice->title }}</h1>
                                    <p class="text-muted mb-0">
                                        <i class="fa fa-calendar me-1"></i>
                                        Published on {{ $advice->created_at->format('F d, Y') }}
                                    </p>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="content fs-6 lh-lg">
                                {!! $advice->content !!}
                            </div>

                            <!-- Action Buttons -->
                            <div class="text-center mt-5 pt-4 border-top">
                                <div class="btn-group" role="group">
                                    <button class="btn btn-success rounded-pill px-4 py-2"
                                            onclick="shareAdvice()">
                                        <i class="fa fa-share me-2"></i>Share
                                    </button>
                                    <button class="btn btn-outline-success rounded-pill px-4 py-2"
                                            onclick="copyAdvice()">
                                        <i class="fa fa-copy me-2"></i>Copy Link
                                    </button>
                                    <button class="btn btn-outline-secondary rounded-pill px-4 py-2" onclick="window.print()">
                                        <i class="fa fa-print me-2"></i>Print
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Medical Disclaimer -->
                    <div class="alert alert-warning mb-5 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <i class="fa fa-exclamation-triangle fa-2x text-warning me-3"></i>
                            </div>
                            <div>
                                <h5 class="alert-heading text-warning">Medical Disclaimer</h5>
                                <p class="mb-0">This information is provided for educational purposes only and should not be considered as professional medical advice. Always consult with a qualified healthcare provider before making any medical decisions or changes to your treatment plan. If you have a medical emergency, please call your local emergency services immediately.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Related Advice Section -->
                    <div class="wow fadeInUp" data-wow-delay="0.4s">
                        <div class="text-center mb-4">
                            <h3 class="fw-medium">More Health Advice</h3>
                            <p class="text-muted">Discover more health and wellness tips</p>
                        </div>

                        <div class="row g-4">
                            @php
                                $relatedAdvice = \App\Models\MedicalAdvice::where('id', '!=', $advice->id)
                                    ->where('status', true)
                                    ->inRandomOrder()
                                    ->take(3)
                                    ->get();
                            @endphp

                            @forelse($relatedAdvice as $index => $related)
                                <div class="col-md-4 wow fadeInUp" data-wow-delay="{{ 0.1 + ($index * 0.1) }}s">
                                    <div class="card h-100 border-0 bg-light">
                                        <div class="card-body p-4">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="flex-shrink-0 btn-square bg-success rounded-circle me-3">
                                                    <i class="fa fa-stethoscope text-white"></i>
                                                </div>
                                                <h6 class="card-title text-success mb-0 flex-grow-1">{{ $related->title }}</h6>
                                            </div>

                                            <p class="card-text small text-muted mb-3">
                                                {!! Str::limit(strip_tags($related->content), 100) !!}
                                            </p>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">
                                                    {{ $related->created_at->format('M d') }}
                                                </small>
                                                <a href="{{ route('medical_advice.single', $related->slug) }}"
                                                   class="btn btn-success btn-sm rounded-pill px-3">
                                                    Read More
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <div class="text-center py-4 bg-light rounded">
                                        <div class="mb-3">
                                            <i class="fa fa-stethoscope fa-2x text-muted"></i>
                                        </div>
                                        <h5 class="text-muted mb-3">No Other Medical Advice Available</h5>
                                        <p class="text-muted mb-4">Check back soon for more health and wellness tips</p>
                                        <a href="{{ route('medical-advice') }}" class="btn btn-success rounded-pill px-4 py-2">
                                            <i class="fa fa-search me-2"></i>Browse All Advice
                                        </a>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Emergency Contact Section -->
                    <div class="mt-5 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="card border-danger">
                            <div class="card-header bg-danger text-white">
                                <h5 class="mb-0">
                                    <i class="fa fa-phone me-2"></i>Emergency Contact
                                </h5>
                            </div>
                            <div class="card-body">
                                <p class="mb-0">
                                    <strong>For medical emergencies, please call:</strong><br>
                                    Emergency Services: <strong>199</strong><br>
                                    National Health Hotline: <strong>080-123-4567</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Medical Advice Details End -->
</div>

@push('scripts')
<script>
    function shareAdvice(title, slug) {
        const url = `{{ url('/medical-advice') }}/${slug}`;
        if (navigator.share) {
            navigator.share({
                title: title,
                text: `Check out this medical advice: ${title}`,
                url: url
            });
        } else {
            copyToClipboard(url);
            showNotification('Link copied to clipboard for sharing!');
        }
    }

    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(function() {
            showNotification('Link copied to clipboard!');
        }).catch(function(err) {
            console.error('Could not copy text: ', err);
            showNotification('Failed to copy to clipboard', 'danger');
        });
    }

    function showNotification(message, type = 'success') {
        const notification = document.createElement('div');
        notification.className = `alert alert-${type} position-fixed top-0 end-0 m-3`;
        notification.style.zIndex = '9999';
        notification.innerHTML = `<i class="fa fa-${type === 'success' ? 'check' : 'exclamation-triangle'} me-2"></i>${message}`;
        document.body.appendChild(notification);

        setTimeout(() => {
            notification.remove();
        }, 3000);
    }

    // Print styles
    const printStyles = `
        <style>
            @media print {
                .btn, .btn-group, nav, .back-button, .related-advice, .emergency-contact { display: none !important; }
                .page-header { background: none !important; color: black !important; }
                .card { border: none !important; box-shadow: none !important; }
                body { background: white !important; }
                .text-white { color: black !important; }
                .bg-success { background: white !important; color: black !important; }
                .alert { page-break-inside: avoid; }
            }
        </style>
    `;
    document.head.insertAdjacentHTML('beforeend', printStyles);
</script>
@endpush

