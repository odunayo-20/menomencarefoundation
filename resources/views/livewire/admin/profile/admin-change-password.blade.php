


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
           @include('livewire.admin.includes.navbar')
            <!-- Navbar End -->


            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">

                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa fa-exclamation-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if(session('error'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="fa fa-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="row g-4">
                    <form wire:submit.prevent='store'>

                        <div class="col-sm-12 col-xl-12">
                            <div class="bg-secondary rounded h-100 p-4">
                                <h6 class="mb-4">Change Password</h6>
                                <div class="form-floating mb-3">
                                    <input wire:model='old_password' type="password" class="form-control" id="floatingInput"
                                        >
                                    <label for="floatingInput">Old Password</label>
                                    @error('old_password')
                                        <span class='text-danger'>{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input wire:model='password' type="password" class="form-control" id="floatingInput"
                                        >
                                    <label for="floatingInput">Password</label>
                                    @error('password')
                                        <span class='text-danger'>{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input wire:model='confirm_password' type="password" class="form-control" id="floatingPassword"
                                        placeholder="Password">
                                    <label for="floatingPassword">Confirm Password</label>
                                    @error('confirm_password')
                                    <span class='text-danger'>{{ $message }}</span>
                                @enderror
                                </div>


                                <div class='my-2'>
                                    <button class="btn btn-primary ">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
            <!-- Form End -->


            <!-- Footer Start -->
          @include('livewire.admin.includes.footer')
            <!-- Footer End -->
        </div>
        <!-- Content End -->


    </div>

