<!-- Content Start -->
<div class="content">
    <!-- Navbar Start -->
    @include('livewire.admin.includes.navbar')
    <!-- Navbar End -->


    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <form wire:submit.prevent='store'>

                <div class="col-sm-12 col-xl-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Membership</h6>
                            <div class="row g-3">
                                @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="fa fa-exclamation-circle me-2"></i>{{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                @endif
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" wire:model='first_name' class="form-control" id="name"
                                            placeholder="Your Name">
                                        <label for="name">First Name:</label>
                                        @error('first_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" wire:model='other_name' class="form-control" id="name"
                                            placeholder="Your Name">
                                        <label for="name">Other Name:</label>
                                        @error('other_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" wire:model='last_name' class="form-control" id="name"
                                            placeholder="Your Name">
                                        <label for="name">Last Name:</label>
                                        @error('last_name')
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
                                        <input type="text" wire:model='address' class="form-control form-control-lg "
                                            id="address" placeholder="address">
                                        <label for="address">Address:</label>
                                        @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="" class="form-label text-white">Gender:</label>
                                    <div class="btn-group" role="group">
                                        <input type="radio" wire:model='gender' value="male" class="btn-check"
                                            name="gender" id="btngender1" checked>
                                        <label class="btn btn-outline-primary" for="btngender1">Male</label>

                                        <input type="radio" class="btn-check" wire:model='gender' value="female"
                                            name="gender" id="btngender2">
                                        <label class="btn btn-outline-primary" for="btngender2">Female</label>

                                        @error('gender')
                                        <span class="text-danger d-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-md-6 text-white">
                                    <label for="" class="form-label d-block">Employment Status:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" wire:model='employment_status'
                                            name="employment_status" id="employ1" value="Govt. Employee">
                                        <label class="form-check-label" for="employ1">Govt. Employee</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" wire:model='employment_status'
                                            name="employment_status" id="employ2" value="Private Sector Employee">
                                        <label class="form-check-label" for="employ2">Private Sector Employee</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" wire:model='employment_status'
                                            name="employment_status" id="employ3" value="Self Employed">
                                        <label class="form-check-label" for="employ3">Self Employed</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" wire:model='employment_status'
                                            name="employment_status" id="employ4" value="Undergraduate">
                                        <label class="form-check-label" for="employ4">Undergraduate</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" wire:model='employment_status'
                                            name="employment_status" id="employ5" value="Other(Mention)">
                                        <label class="form-check-label" for="employ5">Other(Mention)</label>
                                    </div>
                                    @error('employment_status')
                                    <span class="text-danger d-block">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 text-white">
                                    <label for="" class="form-label d-block">Educational Qualification:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            wire:model='education_qualification' name="education_qualification"
                                            id="edu1" value="Doctorate">
                                        <label class="form-check-label" for="edu1">Doctorate</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            wire:model='education_qualification' name="education_qualification"
                                            id="edu2" value="Masters/Post Graduate">
                                        <label class="form-check-label" for="edu2">Masters/Post Graduate</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            wire:model='education_qualification' name="education_qualification"
                                            id="edu3" value="Degree">
                                        <label class="form-check-label" for="edu3">Degree</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            wire:model='education_qualification' name="education_qualification"
                                            id="edu4" value="Undergraduate">
                                        <label class="form-check-label" for="edu4">Undergraduate</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            wire:model='education_qualification' name="education_qualification"
                                            id="edu5" value="Olevel">
                                        <label class="form-check-label" for="edu5">Olevel</label>
                                    </div>
                                    @error('education_qualification')
                                    <span class="text-danger d-block">{{ $message }}</span>
                                    @enderror

                                </div>


                            </div>

                            <div class="row">
                                <div class="col-md-12 mt-4 text-white">
                                    <p>Are you a member of any organization: if, yes give details- Name, address etc</p>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" wire:model='organization_name' class="form-control" id="name"
                                            placeholder="Your Name">
                                        <label for="name">Name:</label>
                                        @error('organization_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" wire:model='organization_address' class="form-control"
                                            id="name" placeholder="Your Name">
                                        <label for="name">Address:</label>
                                        @error('organization_address')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 text-white">
                                    <label for="" class="d-block mb-2 mt-3">Membership Category Applied For(Select
                                        One):</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" wire:model='membership_category'
                                            name="membership_category" id="category1" value="One Year Membership">
                                        <label class="form-check-label" for="category1"><strong>One Year
                                                Membership</strong></label>
                                        <p>Registration Fee N10,000/-(Ten Thousand Naira Only)</p>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" wire:model='membership_category'
                                            name="membership_category" id="category2" value="Life Membership">
                                        <label class="form-check-label" for="category2"><strong>Life
                                                Membership</strong></label>
                                        <p>Registration Fee N20,000/-(Two Thousand Naira Only)</p>
                                    </div>
                                    @error('membership_category')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="col-12 mt-4">
                                    <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Submit</button>
                                </div>

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