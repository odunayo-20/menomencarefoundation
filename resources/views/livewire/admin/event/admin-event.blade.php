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

            <div class="col-md-12">
                <a href="{{ route('admin_event_create') }}" class="btn btn-sm btn-primary">New Event</a>
                <a href="{{ route('admin_event_upload') }}" class="btn btn-sm btn-primary float-end ">Upload Images</a>

            </div>
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <input wire:model.live='search' class="form-control bg-white border-0" type="search" placeholder="Search">
                </div>
                <div class="col-auto">
                    <select wire:model.live='pagination' class="form-select bg-white">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>

                <div class="col-md-12">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fa fa-exclamation-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Events</h6>
                        <div class="table-responsive">
                            <table class="table text-white">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Created</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-white">
                                    @foreach ($events as $event)
                                    <tr>

                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ Str::limit($event->title, 40, '...') }}</td>
                                        <td><img style="width:50px; height:50px; object-fit:cover; object-position:50% 50%;" class="rounded-circle" src="{{ Storage::url($event->image) }}" alt="">
                                        </td>
                                        <td><button class="btn btn-sm btn-dange {{ $event->status == '1' ? '0' : 'btn-success' }} {{ $event->status == '0' ? '1' : 'btn-danger' }}" wire:click="updateStatus({{ $event->id }}, '{{ $event->status == '0' ? '1' : '0' }}')">
                                                @if($event->status == '0')
                                                {{ 'Active' }}
                                                @else
                                                {{ 'Inactive' }}
                                                @endif
                                            </button></td>
                                        <td>{{ $event->created_at->format('d-m-Y h:iA') }}</td>
                                        <td>
                                            <a href="event/view/{{$event->id}}" class="btn btn-sm btn-warning">View</a>
                                            <a href="event/edit/{{$event->id}}" class="btn btn-sm btn-success">Edit</a>

                                            <a href="#" wire:click='delete({{ $event->id }})' data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-sm btn-danger">Del</a>

                                            {{-- <a wire:click='delete({{ $event->id }})' class="btn btn-sm btn-danger">Del</a> --}}
                                            @if (Carbon\Carbon::parse($event->date)->gt(Carbon\Carbon::now()))
                                            <button class="btn btn-sm btn-dark">F</button> @else
                                            <button class="btn btn-sm btn-light">P</button>

                                            @endif

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $events->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Table End -->


    <!-- Footer Start -->
    @include('livewire.admin.includes.footer')
    <!-- Footer End -->

    @push('script')
    <script>

        window.addEventListener('close-modal', event => {
            $('#deleteModal').modal('hide');
        });
        </script>
    @endpush
</div>
<!-- Content End -->
