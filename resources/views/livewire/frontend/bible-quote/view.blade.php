<div>

    <style>
        .page-header {
            background: linear-gradient(rgba(145, 48, 48, 0.1), rgba(0, 0, 0, .1)), url('https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=1200&h=400&fit=crop') center center no-repeat;
            background-size: cover;
            background-position: 100% 20%;
            min-height: 400px;
            display: flex;
            align-items: center;
        }

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-2px);
        }

        .blockquote p {
            position: relative;
        }

        .fa-quote-left, .fa-quote-right {
            font-size: 1.5rem;
            opacity: 0.7;
        }

        .btn-group .btn {
            margin: 0 0.25rem;
            border-radius: 25px !important;
        }

        .custom-notification {
            animation: slideInRight 0.3s ease;
        }

        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @media print {
            .btn, .btn-group, nav, .back-button, .related-quotes {
                display: none !important;
            }
            .page-header {
                background: none !important;
                color: black !important;
            }
            .card {
                border: none !important;
                box-shadow: none !important;
            }
            body {
                background: white !important;
            }
            .text-white {
                color: black !important;
            }
            .bg-primary {
                background: white !important;
                color: black !important;
            }
        }
    </style>

<div>
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white mb-4" style="text-transform: capitalize">{{ $quote->title }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#" class="text-white">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-white">Bible Quotes</a></li>
                    <li class="breadcrumb-item text-warning" style="text-transform: capitalize" aria-current="page">{{ $quote->title }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Bible Quote Details Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <!-- Back Button -->
            <div class="mb-4 back-button">
                <a href="#" class="btn btn-outline-primary rounded-pill px-4 py-2">
                    <i class="fa fa-arrow-left me-2"></i>Back to Bible Quotes
                </a>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- Quote Card -->
                    <div class="card border-0 shadow-lg mb-5">
                        <div class="card-body p-5">
                            <div class="text-center mb-4">
                                <span class="badge bg-primary fs-6 px-3 py-2 mb-4">{{ $quote->book }} {{ $quote->chapter }}:{{ $quote->verse }}</span>
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
                                    <cite title="Source Title" class="text-primary fw-bold">{{ $quote->book }} {{ $quote->chapter }}:{{ $quote->verse }}</cite>
                                </figcaption>
                            </div>

                            <!-- Action Buttons -->
                            <div class="text-center mb-5">
                                <div class="btn-group" role="group">
                                    <button class="btn btn-primary rounded-pill px-4 py-2"
                                            onclick="shareQuote()">
                                        <i class="fa fa-share me-2"></i>Share
                                    </button>

                                    <button class="btn btn-outline-primary rounded-pill px-4 py-2"
                                            onclick="copyQuote()">
                                        <i class="fa fa-copy me-2"></i>Copy
                                    </button>

                                    {{-- <button class="btn btn-outline-secondary rounded-pill px-4 py-2"
                                            onclick="printQuote()">
                                        <i class="fa fa-print me-2"></i>Print
                                    </button> --}}
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
                    <div class="mb-5">
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

                    <!-- Related Quotes Section -->
                     <div class="wow fadeInUp" data-wow-delay="0.4s">
                        <div class="text-center mb-4">
                            <h3 class="fw-medium" style="text-transform: capitalize">More from {{ $quote->book }}</h3>
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
                                                    {{ $related->created_at->format('M d, Y') }}
                                                </small>
                                                <a href="{{ route('bible-quote.single', $related->slug) }}"
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

    
    <script>
        // Quote data - in your Laravel app, this would come from the server

    const quoteData = {
        title: @json($quote->title),
        quote: @json($quote->quote),
        reference: @json("{$quote->book} {$quote->chapter}:{$quote->verse}"),
        url: window.location.href
    };



        function shareQuote() {
            const shareText = `"${quoteData.quote}" - ${quoteData.reference}`;

            if (navigator.share) {
                navigator.share({
                    title: quoteData.title,
                    text: shareText,
                    url: quoteData.url
                }).then(() => {
                    showNotification('Quote shared successfully!', 'success');
                }).catch((error) => {
                    if (error.name !== 'AbortError') {
                        console.log('Error sharing:', error);
                        copyToClipboard(shareText);
                    }
                });
            } else {
                copyToClipboard(shareText);
                showNotification('Quote copied to clipboard for sharing!', 'success');
            }
        }

        function copyQuote() {
            const copyText = `"${quoteData.quote}" - ${quoteData.reference}`;
            copyToClipboard(copyText);
        }

        function copyToClipboard(text) {
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(text).then(() => {
                    showNotification('Copied to clipboard!', 'success');
                }).catch((err) => {
                    console.error('Could not copy text: ', err);
                    fallbackCopyTextToClipboard(text);
                });
            } else {
                fallbackCopyTextToClipboard(text);
            }
        }

        function fallbackCopyTextToClipboard(text) {
            const textArea = document.createElement("textarea");
            textArea.value = text;
            textArea.style.position = "fixed";
            textArea.style.left = "-999999px";
            textArea.style.top = "-999999px";
            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();

            try {
                const successful = document.execCommand('copy');
                if (successful) {
                    showNotification('Copied to clipboard!', 'success');
                } else {
                    showNotification('Failed to copy to clipboard', 'danger');
                }
            } catch (err) {
                console.error('Fallback: Could not copy text: ', err);
                showNotification('Failed to copy to clipboard', 'danger');
            }

            document.body.removeChild(textArea);
        }

        function printQuote() {
            window.print();
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



        // Add test button for development
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Single Bible quote page loaded and ready!');

            // Add test button
            const testButton = document.createElement('button');
            testButton.textContent = 'Test Functions';
            testButton.className = 'btn btn-warning btn-sm position-fixed bottom-0 start-0 m-3';
            testButton.onclick = testFunctions;
            testButton.style.zIndex = '9998';
            document.body.appendChild(testButton);
        });
    </script>
</div>
