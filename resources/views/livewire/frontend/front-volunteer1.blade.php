<div>
    <style>
        .page-header {
            background: linear-gradient(rgba(145, 48, 48, 0.1), rgba(0, 0, 0, .1)), url({{ asset('frontend/event/IMG15.jpg') }}) center center no-repeat;
            background-size: cover;
            background-position: 100% 20%;
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
                                    <input type="text" wire:model='name' class="form-control" id="name"
                                        placeholder="Your Name">
                                    <label for="name">Surname Name</label>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>

                                        @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" wire:model='name' class="form-control" id="name"
                                        placeholder="Your Name">
                                    <label for="name">First Name</label>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" wire:model='subject' class="form-control" id="subject"
                                        placeholder="Subject">
                                    <label for="subject">Address:</label>
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" wire:model='email' class="form-control" id="email"
                                        placeholder="Your Telephone">
                                    <label for="email">Telephone:</label>
                                    @error('telephone')
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
                            <div class="col-md-6">
                                <label for="" class="form-label">Gender:</label>
                                <div class="btn-group" role="group">
                                    <input type="radio" class="btn-check" name="gender" id="btngender1"
                                         checked>
                                    <label class="btn btn-outline-primary" for="btngender1">Male</label>

                                    <input type="radio" class="btn-check" name="gender" id="btngender2"
                                        >
                                    <label class="btn btn-outline-primary" for="btngender2">Female</label>


                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="" class="form-label">Age Group:</label>
                                <div class="btn-group" role="group">
                                    <input type="radio" class="btn-check" name="age" id="btnage1"
                                         checked>
                                    <label class="btn btn-outline-primary" for="btnage1">Under 18</label>

                                    <input type="radio" class="btn-check" name="age" id="btnage2"
                                        >
                                    <label class="btn btn-outline-primary" for="btnage2">18-25</label>

                                    <input type="radio" class="btn-check" name="age" id="btnage3" >
                                    <label class="btn btn-outline-primary" for="btnage3">26-40</label>
                                    <input type="radio" class="btn-check" name="age" id="btnage4" >
                                    <label class="btn btn-outline-primary" for="btnage4">41-55</label>
                                    <input type="radio" class="btn-check" name="age" id="btnage5" >
                                    <label class="btn btn-outline-primary" for="btnage5">Over 55</label>
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <textarea wire:model='message' class="form-control" placeholder="Leave a message here" id="message"
                                        style="height: 200px"></textarea>
                                    <label for="message">Please tell us why do you want to volunteer with our organisation?</label>
                                    @error('message')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <textarea wire:model='message' class="form-control" placeholder="Leave a message here" id="message"
                                        style="height: 200px"></textarea>
                                    <label for="message">Please tell us what you hope to gain from your experience with us?</label>
                                    @error('message')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <textarea wire:model='message' class="form-control" placeholder="Leave a message here" id="message"
                                        style="height: 200px"></textarea>
                                    <label for="message">Please tell us about any educational background, work or volunteering experience that would be relevant to
                                        the volunteer role you are applying for</label>
                                    @error('message')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <textarea wire:model='message' class="form-control" placeholder="Leave a message here" id="message"
                                        style="height: 200px"></textarea>
                                    <label for="message">If you have volunteered before, please give details of where you have volunteered, for how long and
                                        describe your volunteer role.</label>
                                    @error('message')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <textarea wire:model='message' class="form-control" placeholder="Leave a message here" id="message"
                                        style="height: 200px"></textarea>
                                    <label for="message">What hobbies, skills, special interests or qualities do you have that may be relevant to the volunteer role
                                        you are applying for?</label>
                                    @error('message')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <textarea wire:model='message' class="form-control" placeholder="Leave a message here" id="message"
                                        style="height: 200px"></textarea>
                                    <label for="message">When are you available to volunteer? (Please specify days, times and the length of commitment you would
                                        like to make)
                                        </label>
                                    @error('message')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">References: Please supply us with the names of two referees (non-relatives)</div>
                            <div class="col-md-6 mb-3">
                                <div class="form-floating">
                                    <input type="text" wire:model='name' class="form-control" id="name"
                                        placeholder="Your Name">
                                    <label for="name">Name:</label>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-floating">
                                    <input type="text" wire:model='name' class="form-control" id="name"
                                        placeholder="Your Name">
                                    <label for="name">Name:</label>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-floating">
                                    <input type="text" wire:model='name' class="form-control" id="name"
                                        placeholder="Your Name">
                                    <label for="name">Address:</label>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-floating">
                                    <input type="text" wire:model='name' class="form-control" id="name"
                                        placeholder="Your Name">
                                    <label for="name">Address:</label>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-floating">
                                    <input type="text" wire:model='name' class="form-control" id="name"
                                        placeholder="Your Name">
                                    <label for="name">Telephone:</label>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-floating">
                                    <input type="text" wire:model='name' class="form-control" id="name"
                                        placeholder="Your Name">
                                    <label for="name">Telephone:</label>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-floating">
                                    <textarea wire:model='message' class="form-control" placeholder="Leave a message here" id="message"
                                        style="height: 200px"></textarea>
                                    <label for="message">Do you have any special needs you would like to share wiith us?
                                        </label>
                                    @error('message')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-floating">
                                    <textarea wire:model='message' class="form-control" placeholder="Leave a message here" id="message"
                                        style="height: 200px"></textarea>
                                    <label for="message">Any other comments:
                                        </label>
                                    @error('message')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                {{-- <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <h3 class="mb-4">Contact Details</h3>
                    <div class="d-flex border-bottom pb-3 mb-3">
                        <div class="flex-shrink-0 btn-square bg-primary rounded-circle">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h6>Our Office</h6>
                            <span>033 unity avenue, andrealiz lane, sheda hill side quarters, gbessa, abuja.</span>
                        </div>
                    </div>
                    <div class="d-flex border-bottom pb-3 mb-3">
                        <div class="flex-shrink-0 btn-square bg-primary rounded-circle">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h6>Call Us</h6>
                            <span>+2348139694827</span>
                        </div>
                    </div>
                    <div class="d-flex border-bottom-0 pb-3 mb-3">
                        <div class="flex-shrink-0 btn-square bg-primary rounded-circle">
                            <i class="fa fa-envelope text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h6>Mail Us</h6>
                            <span>manomancarefoundation@gmail.com</span>
                        </div>
                    </div>

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7882.3808807475925!2d7.2461746391803175!3d8.954592464415084!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e7aba5c668457%3A0xff6784d0df037d4a!2sGbessa%20900102%2C%20Federal%20Capital%20Territory%2C%20Nigeria!5e0!3m2!1sen!2sbd!4v1706117658061!5m2!1sen!2sbd"
                        width="600" style="min-height: 300px; border:0;" class="w-100 rounded" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- Contact End -->

</div>
