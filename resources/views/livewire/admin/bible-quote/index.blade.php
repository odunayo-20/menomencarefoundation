<!-- Content Start -->


<div class="content">
    <!-- Navbar Start -->
    @include('livewire.admin.includes.navbar')
    <!-- Navbar End -->

    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">

        <!-- Modal Start-->
        @include('livewire.admin.deleteForm.form-delete')
        <!-- Modal stop-->
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="mb-0">Bible Quotes</h6>
                        <a href="{{ route('admin_bible_quote_create') }}" class="btn btn-primary">
                            <i class="fa fa-plus me-2"></i>Add New Quote
                        </a>
                    </div>

                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Search and Filter -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input wire:model.live="search" type="text" class="form-control"
                                placeholder="Search quotes...">
                        </div>
                        <div class="col-md-3">
                            <select wire:model.live="perPage" class="form-select">
                                <option value="5">5 per page</option>
                                <option value="10">10 per page</option>
                                <option value="25">25 per page</option>
                                <option value="50">50 per page</option>
                            </select>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <button wire:click="sortBy('title')"
                                            class="btn btn-link p-0 text-decoration-none">
                                            Title
                                            @if ($sortBy === 'title')
                                                <i class="fa fa-sort-{{ $sortDir === 'asc' ? 'up' : 'down' }}"></i>
                                            @endif
                                        </button>
                                    </th>
                                    <th scope="col">Reference</th>
                                    <th scope="col">Quote</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">
                                        <button wire:click="sortBy('created_at')"
                                            class="btn btn-link p-0 text-decoration-none">
                                            Created
                                            @if ($sortBy === 'created_at')
                                                <i class="fa fa-sort-{{ $sortDir === 'asc' ? 'up' : 'down' }}"></i>
                                            @endif
                                        </button>
                                    </th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($quotes as $quote)
                                    <tr>

                                        <td>{{ $quote->title }}</td>
                                        <td>
                                            <span class="badge bg-info">{{ $quote->book }}
                                                {{ $quote->chapter }}:{{ $quote->verse }}</span>
                                        </td>
                                        <td>
                                            <div
                                                style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                {{ $quote->quote }}
                                            </div>
                                        </td>
                                        <td>
                                            <button wire:click="toggleStatus({{ $quote->id }})"
                                                class="btn btn-sm {{ $quote->is_active ? 'btn-success' : 'btn-secondary' }}">
                                                {{ $quote->is_active ? 'Active' : 'Inactive' }}
                                            </button>
                                        </td>
                                        {{-- <td>
                                            <button wire:click="toggleStatus({{ $quote->id }})"
                                                class="btn btn-sm {{ $quote->is_active ? 'btn-success' : 'btn-secondary' }}">
                                                {{ $quote->is_active ? 'Active' : 'Inactive' }}
                                            </button>
                                        </td> --}}

                                        <td>{{ $quote->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin_bible_quote_edit', $quote->id) }}"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="#" wire:click='delete({{ $quote->id }})'
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                    class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>


                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">
                                            <div class="text-muted">
                                                <i class="fa fa-inbox fa-2x mb-2"></i>
                                                <p>No bible quotes found.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <!-- Pagination -->
                        @if ($quotes->hasPages())
                            <div class="d-flex justify-content-center mt-4">
                                {{ $quotes->links() }}
                            </div>
                        @endif
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- Table End -->

    <!-- Footer Start -->
    @include('livewire.admin.includes.footer')
    <!-- Footer End -->
</div>
<!-- Content End -->

@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            const modalEl = document.getElementById('deleteModal');
            if (modalEl) {
                // Use Bootstrap's modal hide via jQuery if available, otherwise use bootstrap.Modal
                if (typeof $ !== 'undefined' && typeof $(modalEl).modal === 'function') {
                    $(modalEl).modal('hide');
                } else if (typeof bootstrap !== 'undefined') {
                    const modalInstance = bootstrap.Modal.getInstance(modalEl);
                    if (modalInstance) modalInstance.hide();
                }
            }
        });
    </script>
@endpush
