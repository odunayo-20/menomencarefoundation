
        <!-- Content Start -->


        <div class="content">
            <!-- Navbar Start -->
           @include('livewire.admin.includes.navbar')
            <!-- Navbar End -->


            <!-- Table Start -->
                <!-- Modal -->
                @include('livewire.admin.deleteForm.form-delete')
            <div class="container-fluid pt-4 px-4">

 
                <div class="row g-3 align-items-center my-2">
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

                    </div>


                <div class="row g-4">
                    <div class="col-md-12">
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fa fa-exclamation-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Contacts</h6>
                            <div class="table-responsive">
                                <table class="table text-white">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Created</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-white">
                                      @foreach ($contacts as $value)
                                      <tr>

                                          <td>{{ $loop->iteration }}</td>
                                              <td>{{ Str::limit($value->name, 40, '...') }}</td>
                                              <td>{{ Str::limit($value->email, 40, '...') }}</td>
                                              <td>{{ Str::limit($value->subject, 40, '...') }}</td>

                                              <td>{{ $value->created_at->format('d-M-Y, h:iA') }}</td>
                                              <td>
                                                <a href="contact/view/{{$value->id}}" class="btn btn-sm btn-warning">View</a>
                                               
                                                <a href="#" wire:click='delete({{ $value->id }})' data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-sm btn-danger">Del</a>
                                            </td>
                                      </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                                {{ $contacts->links() }}
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
