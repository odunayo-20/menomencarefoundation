<div>
    <style>
        .page-header {
            background: linear-gradient(rgba(145, 48, 48, 0.1), rgba(0, 0, 0, .1)), url({{ asset('frontend/event/IMG15.jpg') }}) center center no-repeat;
            background-size: cover;
            background-position: 100% 50%;
        }
    </style>
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4 animated slideInDown">Volunteers</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary" aria-current="page">Volunteers</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-5 mb-5 fw-medium">Volunteers Form</h1>
            </div>
            <div class="row g-5">
                <div class="col-md-12 wow fadeInUp" data-wow-delay="0.1s">
                    <h3 class="mb-4">Please drop your informations here</h3>
                    <form wire:submit.prevent='store'>
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
                                    <input type="text" wire:model='designation' class="form-control" id="name"
                                        placeholder="Your Name">
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
                                    <input type="date" wire:model='date_of_birth' name="" id="" class="form-control">
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
                                    <input type="text" wire:model='address' class="form-control form-control-lg " id="subject"
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
                                    <input type="radio" wire:model='gender' value="male" class="btn-check" name="gender" id="btngender1"
                                         checked>
                                    <label class="btn btn-outline-primary" for="btngender1">Male</label>

                                    <input type="radio" class="btn-check" wire:model='gender' value="female" name="gender" id="btngender2"
                                        >
                                    <label class="btn btn-outline-primary" for="btngender2">Female</label>

                                </div>
                                <div>

                                    @error('gender')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-md-6">
                                <label for="" class="form-label">Position Applying For:</label>
                                <div class="btn-group" role="group">
                                    <input type="radio" wire:model='position' value="One Term" class="btn-check" name="position" id="btnposition1"
                                         checked>
                                    <label class="btn btn-outline-primary" for="btnposition1">One Term</label>

                                    <input type="radio" wire:model='position' class="btn-check" value="Two Term" name="position" id="btnposition2"
                                        >
                                    <label class="btn btn-outline-primary" for="btnposition2">Two Term</label>

                                    <input type="radio" wire:model='position' class="btn-check" value="Not Sure" name="position" id="btnposition3" >
                                    <label class="btn btn-outline-primary" for="btnposition3">Not Sure</label>
                                </div>
                                <div>

                                    @error('position')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label for="message">Please tell us why do you want to volunteer with our organisation?</label>
                                    <textarea wire:model='organisation' class="form-control" placeholder="Leave a message here" id="message"
                                        style="height: 200px"></textarea>
                                    
                                    @error('organisation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <label for="message">Where did you hear about our volunteer Program?</label>
                                    <textarea wire:model='program' class="form-control" placeholder="Leave a message here" id="message"
                                        style="height: 200px"></textarea>
                                   
                                    @error('program')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div>
                                    <label for="activities">Mention your previous Volunteering activities and your experience out of them?.</label>
                                    <textarea wire:model='activities' class="form-control" placeholder="Leave a message here" id="message"
                                        style="height: 200px"></textarea>
                                    
                                    @error('activities')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Submit</button>
                            </div>



                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Contact End -->

</div>
