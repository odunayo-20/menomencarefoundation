@section('title', $quote->title . ' - Bible Quote')


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
            <h1 class="display-4 text-white mb-4 animated slideInDown">{{ $quote->title }}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('bible_quote') }}">Bible Quotes</a></li>
                    <li class="breadcrumb-item text-primary" aria-current="page">{{ $quote->title }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Bible Quote Details Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <!-- Back Button -->
            <div class="mb-4 wow fadeInUp" data-wow-delay="0.1s">
                <a href="{{ route('bible_quote') }}" class="btn btn-outline-primary rounded-pill px-4 py-2">
                    <i class="fa fa-arrow-left me-2"></i>Back to Bible Quotes
                </a>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- Quote Card -->
                    <div class="card border-0 shadow-lg mb-5 wow fadeInUp" data-wow-delay="0.2s">
                        {{-- @if($quote->image)
                            <div class="position-relative">
                                <img src="{{ Storage::url($quote->image) }}"
                                     alt="{{ $quote->title }}"
                                     class="card-img-top"
                                     style="height: 400px; object-fit: cover;">
                                <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-25"></div>
                                <div class="position-absolute bottom-0 start-0 p-4">
                                    <span class="badge bg-primary fs-6 px-3 py-2">{{ $quote->book }} {{ $quote->chapter }}:{{ $quote->verse }}</span>
                                </div>
                            </div>
                        @endif --}}

                        <div class="card-body p-5">
                            <div class="text-center mb-4">
                                @if(!$quote->image)
                                    <span class="badge bg-primary fs-6 px-3 py-2 mb-4">{{ $quote->book }} {{ $quote->chapter }}:{{ $quote->verse }}</span>
                                @endif
                                <h1 class="card-title text-primary mb-4 fw-medium">{{ $quote->title }}</h1>
                            </div>
                            <!-- Main Quote -->
                            <div class="text-center mb-5">
                                <blockquote class="blockquote">
                                    <p class="mb-0 fs-3 fst-italic text-muted lh-base px-3">
                                        <i class="fa fa-quote-left text-primary me-2"></i>
                                        {{ $quote->quote }}
                                        <i class="fa fa-quote-right text-primary ms-2"></i>
                                    </p>
                                </blockquote>
                                <figcaption class="blockquote-footer mt-4 fs-5">
                                    {{-- <cite title="Source Title" class="text-primary fw-bold">{{ $quote->full_reference }} </cite> --}}
                                    <cite title="Source Title" class="text-primary fw-bold">{{ $quote->book }} {{ $quote->chapter }}:{{ $quote->verse }}</cite>
                                </figcaption>
                            </div>

                            <!-- Action Buttons -->
                            <div class="text-center mb-5">
                                <div class="btn-group" role="group">
                                    <button class="btn btn-primary rounded-pill px-4 py-2"
                                            onclick='shareQuote({{ json_encode($quote->title) }}, {{ json_encode($quote->quote) }}, {{ json_encode($quote->book . " " . $quote->chapter . ":" . $quote->verse) }})'>
                                        <i class="fa fa-share me-2"></i>Share
                                    </button>

                                    <button class="btn btn-outline-primary rounded-pill px-4 py-2"
                                            onclick='copyToClipboard({{ json_encode($quote->quote . " - " . $quote->book . " " . $quote->chapter . ":" . $quote->verse) }})'>
                                        <i class="fa fa-copy me-2"></i>Copy
                                    </button>

                                    <button class="btn btn-outline-secondary rounded-pill px-4 py-2" onclick="window.print()">
                                        <i class="fa fa-print me-2"></i>Print
                                    </button>
                                </div>
                            </div>

                            <!-- Meta Information -->
                            <div class="text-center text-muted">
                                <small>
                                    <i class="fa fa-calendar me-1"></i>
                                    Published on {{ $quote->created_at->format('F d, Y') }}
                                </small>
                            </div>
                        </div>
                    </div>

                    <!-- Explanation Section -->
                    @if($quote->explanation)
                        <div class="mb-5 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="card border-0 bg-light">
                                <div class="card-header bg-primary text-white py-3">
                                    <h4 class="mb-0 fw-medium">
                                        <i class="fa fa-book-open me-2"></i>
                                        Understanding This Verse
                                    </h4>
                                </div>
                                <div class="card-body p-4">
                                    <div class="content fs-6">
                                        {!! $quote->explanation !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Related Quotes Section -->
                    <div class="wow fadeInUp" data-wow-delay="0.4s">
                        <div class="text-center mb-4">
                            <h3 class="fw-medium">More from {{ $quote->book }}</h3>
                            <p class="text-muted">Discover more wisdom from this book</p>
                        </div>

                        <div class="row g-4">
                            @php
                                $relatedQuotes = \App\Models\BibleQuote::where('book', $quote->book)
                                    ->where('id', '!=', $quote->id)
                                    ->where('is_active', true)
                                    ->take(3)
                                    ->get();
                            @endphp

                            @forelse($relatedQuotes as $index => $related)
                                <div class="col-md-4 wow fadeInUp" data-wow-delay="{{ 0.1 + ($index * 0.1) }}s">
                                    <div class="card h-100 border-0 bg-light">
                                        {{-- @if($related->image)
                                            <div class="position-relative overflow-hidden" style="height: 150px;">
                                                <img src="{{ Storage::url($related->image) }}"
                                                     alt="{{ $related->title }}"
                                                     class="w-100 h-100" style="object-fit: cover;">
                                                <div class="position-absolute bottom-0 start-0 p-2">
                                                    <span class="badge bg-primary small">{{ $related->full_reference }}</span>
                                                </div>
                                            </div>
                                        @endif --}}
                                        <div class="card-body p-4">
                                            <h6 class="card-title text-primary mb-3">{{ $related->title }}</h6>
                                            @if(!$related->image)
                                                <div class="mb-2">
                                                    <span class="badge bg-primary small">{{ $related->book }} {{ $related->chapter }}:{{ $related->verse }}</span>
                                                </div>
                                            @endif
                                            <p class="card-text small text-muted mb-3">
                                                "{{ Str::limit($related->quote, 100) }}"
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">
                                                    {{ $related->created_at->format('M d') }}
                                                </small>
                                                <a href="{{ route('bible-quote.single', $related->id) }}"
                                                   class="btn btn-primary btn-sm rounded-pill px-3">
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
                                            <i class="fa fa-book fa-2x text-muted"></i>
                                        </div>
                                        <h5 class="text-muted mb-3">No Other Quotes from {{ $quote->book }}</h5>
                                        <p class="text-muted mb-4">Explore quotes from other books of the Bible</p>
                                        <a href="{{ route('bible_quote') }}" class="btn btn-primary rounded-pill px-4 py-2">
                                            <i class="fa fa-search me-2"></i>Explore All Quotes
                                        </a>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bible Quote Details End -->
</div>

@push('scripts')
<script>
    function shareQuote(title, quote, reference) {
        try {
            if (navigator.share) {
                navigator.share({
                    title: title,
                    text: `"${quote}"`,
                    url: window.location.href
                }).then(() => {
                    showNotification('Quote shared successfully!');
                }).catch((error) => {
                    console.log('Error sharing:', error);
                    // Fallback to copy
                    copyToClipboard(`"${quote}"`);
                });
            } else {
                // Fallback for browsers that don't support Web Share API
                copyToClipboard(`"${quote}"`);
                showNotification('Quote copied to clipboard for sharing!');
            }
        } catch (error) {
            console.error('Share error:', error);
            showNotification('Failed to share quote', 'danger');
        }
    }

    function copyToClipboard(text) {
        try {
            if (navigator.clipboard && window.isSecureContext) {
                // Modern approach
                navigator.clipboard.writeText(text).then(function() {
                    showNotification('Copied to clipboard!');
                }).catch(function(err) {
                    console.error('Could not copy text: ', err);
                    // Fallback
                    fallbackCopyTextToClipboard(text);
                });
            } else {
                // Fallback for older browsers or non-secure contexts
                fallbackCopyTextToClipboard(text);
            }
        } catch (error) {
            console.error('Copy error:', error);
            showNotification('Failed to copy to clipboard', 'danger');
        }
    }

    function fallbackCopyTextToClipboard(text) {
        try {
            const textArea = document.createElement("textarea");
            textArea.value = text;

            // Avoid scrolling to bottom
            textArea.style.top = "0";
            textArea.style.left = "0";
            textArea.style.position = "fixed";
            textArea.style.opacity = "0";

            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();

            const successful = document.execCommand('copy');
            document.body.removeChild(textArea);

            if (successful) {
                showNotification('Copied to clipboard!');
            } else {
                showNotification('Failed to copy to clipboard', 'danger');
            }
        } catch (err) {
            console.error('Fallback copy failed:', err);
            showNotification('Failed to copy to clipboard', 'danger');
        }
    }

    function showNotification(message, type = 'success') {
        // Remove existing notifications
        const existingNotifications = document.querySelectorAll('.custom-notification');
        existingNotifications.forEach(notification => notification.remove());

        const notification = document.createElement('div');
        notification.className = `alert alert-${type} position-fixed custom-notification`;
        notification.style.cssText = `
            top: 20px;
            right: 20px;
            z-index: 9999;
            min-width: 300px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            border: none;
            border-radius: 8px;
        `;
        notification.innerHTML = `
            <div class="d-flex align-items-center">
                <i class="fa fa-${type === 'success' ? 'check-circle' : 'exclamation-triangle'} me-2"></i>
                ${message}
                <button type="button" class="btn-close ms-auto" onclick="this.parentElement.parentElement.remove()"></button>
            </div>
        `;
        document.body.appendChild(notification);

        // Auto-remove after 4 seconds
        setTimeout(() => {
            if (notification.parentNode) {
                notification.remove();
            }
        }, 4000);
    }

    // Print styles
    const printStyles = `
        <style>
            @media print {
                .btn, .btn-group, nav, .back-button, .related-quotes { display: none !important; }
                .page-header { background: none !important; color: black !important; }
                .card { border: none !important; box-shadow: none !important; }
                body { background: white !important; }
                .text-white { color: black !important; }
                .bg-primary { background: white !important; color: black !important; }
            }
        </style>
    `;
    document.head.insertAdjacentHTML('beforeend', printStyles);
</script>
@endpush
