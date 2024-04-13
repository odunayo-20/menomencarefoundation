<!-- Content Start -->
<div class="content">
    <!-- Navbar Start -->
    @include('livewire.admin.includes.navbar')
    <!-- Navbar End -->


    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">


            <div class="col-md-12">
                <div class="bg-secondary rounded h-100">
                    <div class="card bg-secondary border-white mb-3 w-100 text-white">
                        <div class="card-header">
                            {{-- row start --}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <strong class='text-white'>Designation: </strong>
                                    {{ $volunteer->designation }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong class='text-white'>Name: </strong>
                                    {{ $volunteer->name }}

                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong class='text-white'>Email:
                                    </strong>{{ $volunteer->email }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong class='text-white'>Phone:
                                    </strong>{{ $volunteer->phone }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong class='text-white'>Gender:
                                    </strong>{{ $volunteer->gender }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong class='text-white'>Gender:
                                    </strong>{{ $volunteer->gender }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong class='text-white'>State:
                                    </strong>{{ $volunteer->state }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong class='text-white'>Date of Birth:
                                    </strong>{{ $volunteer->date_of_birth }}
                                </div>
                            </div>
                            {{-- row end --}}

                        </div>
                        {{-- <div class="card-header">
                        </div> --}}
                        <div class="card-body text-primar">
                            <p class="card-text" style="text-align: justify">
                                <strong class='my-2 d-block text-white'>Address:</strong>
                                <span style="text-align: justify">{{ $volunteer->address }}</span>
                            </p>
                            <p class="card-text" style="text-align: justify">
                                <strong class='my-2 d-block text-white'>Position:</strong>
                                <span style="text-align: justify">{{ $volunteer->position }}</span>
                            </p>
                            <p class="card-text" style="text-align: justify">
                                <strong class='my-2 d-block text-white'>volunteer with our Organisation:</strong>
                                <span style="text-align: justify">{{ $volunteer->organisation }}</span>
                            </p>
                            <p class="card-text" style="text-align: justify">
                                <strong class='my-2 d-block text-white'>volunteer Program:</strong>
                                <span style="text-align: justify">{{ $volunteer->program }}</span>
                            </p>
                            <p class="card-text" style="text-align: justify">
                                <strong class='my-2 d-block text-white'>Volunteering Activities:</strong>
                                <span style="text-align: justify">{{ $volunteer->activities }}</span>
                            </p>
                        </div>
                        <div class="card-footer">
                            <span class="text-white">Created: </span>
                            {{ $volunteer->created_at->format('d-M-Y h:iA') }}
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
</div>
<!-- Content End -->
