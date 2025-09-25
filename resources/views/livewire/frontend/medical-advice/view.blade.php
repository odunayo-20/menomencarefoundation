<div>
    <style>
        .page-header {
            background: linear-gradient(rgba(145, 48, 48, 0.1), rgba(0, 0, 0, .1)), url({{ asset('frontend/event/IMG3.jpg') }}) center center no-repeat;
            background-size: cover;
            background-position: 100% 20%;
        }
        .advice-img {
            max-height: 420px;
            object-fit: cover;
            width: 100%;
            border-radius: 8px;
        }
    </style>

    <!-- Page Header -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4 animated slideInDown">Medical Advice</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('medical_advice') ?? '#' }}">Medical Advice</a></li>
                    <li class="breadcrumb-item text-primary" aria-current="page">{{ Str::limit($advice->title, 60) }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Advice Content -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <!-- Main column -->
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm mb-4">
                        @if(!empty($advice->image))
                            <img src="{{ asset($advice->image) }}" alt="{{ $advice->title }}" class="advice-img">
                        @elseif(!empty($advice->thumbnail))
                            <img src="{{ asset($advice->thumbnail) }}" alt="{{ $advice->title }}" class="advice-img">
                        @endif

                        <div class="card-body p-4">
                            <h2 class="mb-2 text-" style="color: #00989F">{{ $advice->title }}</h2>

                            <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                                <div class="text-muted small">
                                    <i class="fa fa-calendar me-1"></i> {{ optional($advice->created_at)->format('M d, Y') }}
                                    @if(!empty($advice->author_name))
                                        &nbsp; &middot; &nbsp;<i class="fa fa-user me-1"></i> {{ $advice->author_name }}
                                    @endif
                                </div>

                                <div class="btn-group">
                                    {{-- <button class="btn btn-outline-secondary btn-sm" onclick="shareAdvice('{{ addslashes($advice->title) }}', '{{ $advice->slug }}')">
                                        <i class="fa fa-share me-1"></i> Share
                                    </button>

                                    <button class="btn btn-outline-secondary btn-sm" onclick="copyToClipboard('{{ url('/medical-advice/'.$advice->slug) }}')">
                                        <i class="fa fa-copy me-1"></i> Copy Link
                                    </button> --}}

                                    <a href="{{ route('medical_advice') ?? url('/medical-advice') }}" class="btn btn- btn-sm" style="background: #00989F">
                                        <i class="fa fa-arrow-left me-1"></i> Back
                                    </a>
                                </div>
                            </div>

                            <hr>

                            <div class="advice-content">
                                {!! $advice->content !!}
                            </div>

                            <!-- Optional tags/categories -->
                            @if(!empty($advice->tags) || !empty($advice->category))
                                <div class="mt-4">
                                    @if(!empty($advice->category))
                                        <span class="badge bg-success me-2">{{ $advice->category }}</span>
                                    @endif
                                    @if(!empty($advice->tags))
                                        @foreach(explode(',', $advice->tags) as $tag)
                                            <span class="badge bg-light text-dark me-1">{{ trim($tag) }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Disclaimer -->
                    <div class="alert alert-warning mt-3" role="alert">
                        <h5 class="alert-heading"><i class="fa fa-exclamation-triangle me-2"></i> Medical Disclaimer</h5>
                        <p class="mb-0">The information provided here is for educational purposes only and should not replace professional medical advice. Always consult a qualified healthcare provider for personal medical advice.</p>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm mb-4 p-3">
                        <h5 class="mb-3">Recent Advice</h5>

                        @if(isset($recentAdvices) && $recentAdvices->count())
                            <ul class="list-unstyled mb-0">
                                @foreach($recentAdvices as $recent)
                                    <li class="mb-3">
                                        <a href="{{ route('medical_advice.single', $recent->slug) ?? url('/medical-advice/'.$recent->slug) }}" class="text-decoration-none">
                                            <strong class="d-block text-" style="color: #00989F">{{ Str::limit($recent->title, 60) }}</strong>
                                            <small class="text-muted">{{ optional($recent->created_at)->format('M d, Y') }}</small>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted small">No recent advice available.</p>
                        @endif
                    </div>

                    {{-- <div class="card border-0 shadow-sm p-3">
                        <h5 class="mb-2">Subscribe</h5>
                        <p class="small text-muted mb-2">Get weekly health tips and updates.</p>
                        <form wire:submit.prevent="subscribe">
                            <div class="input-group">
                                <input wire:model.defer="subscriberEmail" type="email" class="form-control form-control-sm" placeholder="Your email" required>
                                <button class="btn btn- btn-sm" style="background:#00989F;" type="submit">Subscribe</button>
                            </div>
                            @error('subscriberEmail') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </form>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- End Advice Content -->
</div>

{{-- @push('scripts')
<script>
    function shareAdvice(title, slug) {
        const url = `{{ url('/medical-advice') }}/${slug}`;
        if (navigator.share) {
            navigator.share({
                title: title,
                text: `Check out this medical advice: ${title}`,
                url: url
            }).catch(() => {
                // ignore
            });
        } else {
            copyToClipboard(url);
            showNotification('Link copied to clipboard for sharing!');
        }
    }

    function copyToClipboard(text) {
        if (!navigator.clipboard) {
            // fallback for older browsers
            const el = document.createElement('textarea');
            el.value = text;
            document.body.appendChild(el);
            el.select();
            try {
                document.execCommand('copy');
                showNotification('Copied to clipboard!');
            } catch (err) {
                showNotification('Failed to copy to clipboard', 'danger');
            }
            document.body.removeChild(el);
            return;
        }

        navigator.clipboard.writeText(text).then(function() {
            showNotification('Copied to clipboard!');
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
</script>
@endpush --}}
