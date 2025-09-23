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
            <h1 class="display-2 text-white mb-4 animated slideInDown">Bible Quotes</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary" aria-current="page">Bible Quotes</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Bible Quotes Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="display-5 mb-3 fw-medium">Daily Inspiration From Scripture</h1>
                <p class="mb-5">Find comfort, wisdom, and guidance through God's word</p>
            </div>

            <!-- Search and Filter Section -->
            <div class="row justify-content-center mb-5 wow fadeInUp" data-wow-delay="0.2s">
                <div class="col-lg-10">
                    <div class="bg-light rounded p-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input wire:model.live="search" type="text" class="form-control" id="searchInput" placeholder="Search quotes...">
                                    <label for="searchInput">Search quotes, books, or verses...</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select wire:model.live="selectedBook" class="form-select" id="bookSelect">
                                        <option value="">All Books</option>
                                        @foreach($books as $book)
                                            <option value="{{ $book }}">{{ $book }}</option>
                                        @endforeach
                                    </select>
                                    <label for="bookSelect">Filter by Book</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button wire:click='resetFilters' type="reset" class="btn btn-primary h-100 w-100">
                                    <i class="fa fa-refresh"></i> Clear
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bible Quotes Grid -->
            <div class="row g-4 mb-5">
                @forelse($quotes as $index => $quote)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.1 + ($index * 0.1) }}s">
                        <div class="card h-100 shadow-sm border-0 overflow-hidden">

                            {{-- @if($quote->image)
                                <div class="position-relative overflow-hidden" style="height: 200px;">
                                    <img src="{{ Storage::url($quote->image) }}"
                                         alt="{{ $quote->title }}"
                                         class="w-100 h-100" style="object-fit: cover;">
                                    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-25"></div>
                                    <div class="position-absolute bottom-0 start-0 p-3">
                                        <span class="badge bg-primary">{{ $quote->full_reference }}</span>
                                    </div>
                                </div>
                            @endif --}}

                            <div class="card-body d-flex flex-column p-4">
                                <h5 class="card-title text-primary mb-3">{{ $quote->title }}</h5>

                                    <div class="mb-3">
                                        <span class="badge bg-primary">{{ $quote->book }} {{ $quote->chapter }}:{{ $quote->verse }}</span>
                                    </div>

                                <blockquote class="blockquote flex-grow-1 mb-4">
                                    <p class="mb-0 fst-italic text-muted">"{{ Str::limit($quote->quote, 120) }}"</p>
                                </blockquote>

                                @if($quote->explanation)
                                    <div class="mb-3">
                                        <button class="btn btn-outline-primary btn-sm"
                                                type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#explanation-{{ $quote->slug }}"
                                                aria-expanded="false">
                                            <i class="fa fa-book-open me-1"></i> Read Explanation
                                        </button>

                                        <div class="collapse mt-2" id="explanation-{{ $quote->slug }}">
                                            <div class="card card-body bg-light border-0 small">
                                                {!! Str::limit(strip_tags($quote->explanation), 200) !!}
                                                <a href="{{ route('bible-quote.single', $quote->slug) }}" class="text-primary mt-2">
                                                    Read more...
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                    <small class="text-muted">
                                        <i class="fa fa-calendar me-1"></i>
                                        {{ $quote->created_at->format('M d, Y') }}
                                    </small>

                                    {{-- <div class="btn-group">
                                        <a href="{{ route('bible-quote.single', $quote->slug) }}"
                                           class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye me-1"></i> View
                                        </a>
                                        <button class="btn btn-outline-secondary btn-sm"
                                                onclick="shareQuote('{{ $quote->title }}', '{{ addslashes($quote->quote) }}', '{{ $quote->full_reference }}')">
                                            <i class="fa fa-share"></i>
                                        </button>
                                        <button class="btn btn-outline-secondary btn-sm"
                                                onclick="copyToClipboard('{{ addslashes($quote->quote) }} - {{ $quote->full_reference }}')">
                                            <i class="fa fa-copy"></i>
                                        </button>
                                    </div> --}}

                                    <div class="btn-group">
                                    <a href="{{ route('bible-quote.single', $quote->slug) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye me-1"></i> View
                                    </a>

                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="text-center py-5">
                            <div class="mb-4">
                                <i class="fa fa-book fa-4x text-muted"></i>
                            </div>
                            <h4 class="text-muted">No Bible Quotes Found</h4>
                            <p class="text-muted">
                                @if($search || $selectedBook)
                                    Try adjusting your search terms or filters.
                                @else
                                    No quotes have been published yet.
                                @endif
                            </p>
                            @if($search || $selectedBook)
                                <button wire:click="$set('search', '')" class="btn btn-primary rounded-pill py-2 px-4">
                                    View All Quotes
                                </button>
                            @endif
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($quotes->hasPages())
                <div class="d-flex justify-content-center wow fadeInUp" data-wow-delay="0.3s">
                    {{ $quotes->links() }}
                </div>
            @endif


            <!-- Daily Inspiration Section -->
            @if($quotes->count() > 0 && !$search && !$selectedBook)
                <div class="row justify-content-center mt-5 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="col-lg-10">
                        <div class="bg-primary rounded p-5 text-white text-center">
                            <h3 class="mb-4">Daily Bible Inspiration</h3>
                            <blockquote class="blockquote">
                                <p class="mb-4 fs-5">
                                    "For I know the plans I have for you," declares the Lord, "plans to prosper you and not to harm you, to give you hope and a future."
                                </p>
                                <footer class="blockquote-footer text-white-50">
                                    <cite title="Source Title">Jeremiah 29:11</cite>
                                </footer>
                            </blockquote>
                            <div class="mt-4">
                                <a href="#" class="btn btn-light rounded-pill py-3 px-5">
                                    <i class="fa fa-envelope me-2"></i>Subscribe for Daily Quotes
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Featured Books Section -->
            @if($books->count() > 0 && !$search && !$selectedBook)
                <div class="text-center mt-5 mb-4 wow fadeInUp" data-wow-delay="0.5s">
                    <h3 class="fw-medium">Explore by Book</h3>
                    <p class="text-muted">Browse quotes from different books of the Bible</p>
                </div>
                <div class="row g-3 justify-content-center wow fadeInUp" data-wow-delay="0.6s">
                    @foreach($books->take(8) as $book)
                        <div class="col-auto">
                            <button wire:click="$set('selectedBook', '{{ $book }}')"
                                    class="btn btn-outline-primary rounded-pill px-4 py-2">
                                {{ $book }}
                            </button>
                        </div>
                    @endforeach
                    @if($books->count() > 8)
                        <div class="col-auto">
                            <button class="btn btn-primary rounded-pill px-4 py-2"
                                    data-bs-toggle="modal"
                                    data-bs-target="#allBooksModal">
                                +{{ $books->count() - 8 }} More
                            </button>
                        </div>
                    @endif
                </div>

                <!-- All Books Modal -->
                <div class="modal fade" id="allBooksModal" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">All Bible Books</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-2">
                                    @foreach($books as $book)
                                        <div class="col-md-4 col-sm-6">
                                            <button wire:click="$set('selectedBook', '{{ $book }}')"
                                                    class="btn btn-outline-primary w-100 mb-2"
                                                    data-bs-dismiss="modal">
                                                {{ $book }}
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- Bible Quotes End -->
</div>


