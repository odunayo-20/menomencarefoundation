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
                                <div class="mb-3 text-capitalize @if($membership->other_name)
                                    col-md-4
                                    @else
                                    col-md-6
                                @endif">
                                    <strong class='text-white'>First Name: </strong>
                                    {{ $membership->first_name }}
                                </div>
                                <div class="mb-3 text-capitalize @if($membership->other_name)
                                    col-md-4
                                    @else
                                    col-md-6
                                @endif">
                                    <strong class='text-white'>Last Name: </strong>
                                    {{ $membership->last_name }}

                                </div>
                                @if($membership->other_name)
                                <div class="col-md-4 mb-3 text-capitalize">
                                    <strong class='text-white'>Other Name: </strong>
                                    {{ $membership->other_name }}

                                </div>

                                @endif
                                <div class="col-md-6 mb-3">
                                    <strong class='text-white'>Email:
                                    </strong>{{ $membership->email }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong class='text-white'>Phone:
                                    </strong>{{ $membership->phone }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong class='text-white'>Gender:
                                    </strong>{{ $membership->gender }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong class='text-white'>Gender:
                                    </strong>{{ $membership->gender }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong class='text-white'>State:
                                    </strong>{{ $membership->state }}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong class='text-white'>Date of Birth:
                                    </strong>{{ $membership->date_of_birth }}
                                </div>
                            </div>
                            {{-- row end --}}

                        </div>
                        {{-- <div class="card-header">
                        </div> --}}
                        <div class="card-body text-primar">
                            <p class="card-text" style="text-align: justify">
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong class='my-2 d-block text-white'>Employment Status:</strong>
                                        <span style="text-align: justify">{{ $membership->employ_status }}</span>
        
                                    </div>
                                    <div class="col-md-6">
                                        <strong class='my-2 d-block text-white'>Educational Qualification:</strong>
                                        <span style="text-align: justify">{{ $membership->edu_qualification }}</span>
        
                                    </div>
                                </div>
                            </p>
                            @if($membership->organization_name && $membership->organization_address)
                                
                            <p class="card-text" style="text-align: justify">
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong class='my-2 d-block text-white'>Organization Name:</strong>
                                        <span style="text-align: justify">{{ $membership->organization_name }}</span>
                                    </div>
                                    <div class="col-md-6">
                                        <strong class='my-2 d-block text-white'>Organization Address:</strong>
                                        <span style="text-align: justify">{{ $membership->organization_address }}</span>
                                    </div>
                                </div>
                            </p>
                            @endif
                            <p class="card-text" style="text-align: justify">
                                <strong class='my-2 d-block text-white'>Membership Category:</strong>
                                <span style="text-align: justify">{{ $membership->membership_category }}</span>
                            </p>
                            <p class="card-text" style="text-align: justify">
                                <strong class='my-2 d-block text-white'>Address:</strong>
                                <span style="text-align: justify">{{ $membership->address }}</span>
                            </p>

                        </div>
                        <div class="card-footer">
                            <span class="text-white">Created: </span>
                            {{ $membership->created_at->format('d-M-Y h:iA') }}
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