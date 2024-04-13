<!-- Content Start -->
<div class="content">
    <!-- Navbar Start -->
    @include('livewire.admin.includes.navbar')
    <!-- Navbar End -->


    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

                <!-- Form Start -->
                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4">

                        <div class="col-sm-12 col-xl-12">
                            <div class="bg-secondary rounded h-100 p-4">
                                <h6 class="mb-4">Volunteer</h6>
                                <!-- row start -->
                                <form wire:submit.prevent='updateVolunteer'>
                                    <div class="row g-3">
                                        @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <i class="fa fa-exclamation-circle me-2"></i>{{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                        @endif
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" wire:model='designation' class="form-control"
                                                    id="name" placeholder="Your Name">
                                                <label for="name">Designation:</label>
                                                @error('designation')
                                                <span class="text-danger">{{ $message }}</span>

                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" wire:model='name' class="form-control" id="name"
                                                    placeholder="Your Name">
                                                <label for="name">Name:</label>
                                                @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" wire:model='state' class="form-control" id="subject"
                                                    placeholder="Subject">
                                                <label for="subject">State/City:</label>
                                                @error('state')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="date" wire:model='date_of_birth' name="" id=""
                                                    class="form-control">
                                                <label for="message">Date of birth</label>
                                                @error('date_of_birth')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" wire:model='phone' class="form-control" id="email"
                                                    placeholder="Your Telephone">
                                                <label for="email">Phone:</label>
                                                @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" wire:model='email' class="form-control" id="email"
                                                    placeholder="Your Email">
                                                <label for="email">Your Email</label>
                                                @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input type="text" wire:model='address'
                                                    class="form-control form-control-lg " id="subject"
                                                    placeholder="Subject">
                                                <label for="subject">Address:</label>
                                                @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="" class="form-label">Gender:</label>
                                            <div class="btn-group" role="group">
                                                <input type="radio" wire:model='gender' value="male" class="btn-check"
                                                    name="gender" id="btngender1" checked>
                                                <label class="btn btn-outline-primary" for="btngender1">Male</label>

                                                <input type="radio" class="btn-check" wire:model='gender' value="female"
                                                    name="gender" id="btngender2">
                                                <label class="btn btn-outline-primary" for="btngender2">Female</label>

                                                @error('gender')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="col-md-6">
                                            <label for="" class="form-label">Position Applying For:</label>
                                            <div class="btn-group" role="group">
                                                <input type="radio" wire:model='position' value="One Term"
                                                    class="btn-check" name="position" id="btnposition1" checked>
                                                <label class="btn btn-outline-primary" for="btnposition1">One
                                                    Term</label>

                                                <input type="radio" wire:model='position' class="btn-check"
                                                    value="Two Term" name="position" id="btnposition2">
                                                <label class="btn btn-outline-primary" for="btnposition2">Two
                                                    Term</label>

                                                <input type="radio" wire:model='position' class="btn-check"
                                                    value="Not Sure" name="position" id="btnposition3">
                                                <label class="btn btn-outline-primary" for="btnposition3">Not
                                                    Sure</label>
                                                @error('position')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <textarea wire:model='organisation' class="form-control"
                                                    placeholder="Leave a message here" id="message"
                                                    style="height: 200px"></textarea>
                                                <label for="message">Please tell us why do you want to volunteer with
                                                    our organisation?</label>
                                                @error('organisation')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <textarea wire:model='program' class="form-control"
                                                    placeholder="Leave a message here" id="message"
                                                    style="height: 200px"></textarea>
                                                <label for="message">Where did you hear about our volunteer
                                                    Program?</label>
                                                @error('program')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <textarea wire:model='activities' class="form-control"
                                                    placeholder="Leave a message here" id="message"
                                                    style="height: 200px"></textarea>
                                                <label for="activities">Mention your previous Volunteering activities
                                                    and your experience out of them?.</label>
                                                @error('activities')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary rounded-pill py-3 px-5"
                                                type="submit">Submit</button>
                                        </div>



                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>


                </div>
        </div>
        <!-- Form End -->


        <!-- Footer Start -->
        @include('livewire.admin.includes.footer')
        <!-- Footer End -->
    </div>
    <!-- Content End -->


</div>
