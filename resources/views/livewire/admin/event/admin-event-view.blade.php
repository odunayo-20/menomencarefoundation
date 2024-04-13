<!-- Content Start -->
<div class="content">
    <!-- Navbar Start -->
    @include('livewire.admin.includes.navbar')
    <!-- Navbar End -->
    <style>
        .project-item {
position: relative;
border-radius: 8px;
overflow: hidden;
box-shadow: 0 0 45px rgba(0, 0, 0, .07);
}

.project-item .project-overlay {
position: absolute;
width: 100%;
height: 100%;
top: 0;
left: 0;
display: flex;
align-items: center;
justify-content: center;
background: rgba(0, 0, 0, .5);
opacity: 0;
padding-top: 60px;
transition: .5s;
}

.project-item:hover .project-overlay {
opacity: 1;
padding-top: 0;
}

.project-carousel .owl-nav {
position: absolute;
top: -100px;
right: 0;
display: flex;
}

.project-carousel .owl-nav .owl-prev,
.project-carousel .owl-nav .owl-next {
margin-left: 15px;
width: 55px;
height: 55px;
display: flex;
align-items: center;
justify-content: center;
color: var(--secondary);
border-radius: 55px;
box-shadow: 0 0 45px rgba(0, 0, 0, .15);
font-size: 25px;
transition: .5s;
}

.project-carousel .owl-nav .owl-prev:hover,
.project-carousel .owl-nav .owl-next:hover {
background: var(--primary);
color: #FFFFFF;
}

@media (max-width: 768px) {
.project-carousel .owl-nav {
top: -70px;
right: auto;
left: 50%;
transform: translateX(-50%);
}

.project-carousel .owl-nav .owl-prev,
.project-carousel .owl-nav .owl-next {
margin: 0 7px;
width: 45px;
height: 45px;
font-size: 20px;
}
}


    </style>

    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">


            <div class="col-md-12 mb-4">
                <div class="card bg-secondary text-white p-3">
                    <h5 class="card-title p-3" style="text-align: justify">{{ $event->title }}</h5>
                    <img src="{{ Storage::url($event->image) }}" class="card-img w-100"
                        style='width:100%; height:400px; object-fit:cover; object-position:50% 30%' alt="...">
                    <p class="card-text"> <span>Date: {{$event->date}}</span> <span class='float-end'>Time: {{
                            \Carbon\Carbon::createFromFormat('H:i:s', $event->time)->format('h:i A') }}</span></p>
                    <p class="card-text" style="text-align: justify">{!! $event->content !!}</p>
                    <p class="card-text" style='text-align:justify'><strong>Location: </strong>{{ $event->location }}
                    </p>

                    <div class="row">

                        @foreach ($imageUpload as $value)
                       

                        <div class="col-md-3">
                            <div class="project-item mb-5">
                                <div class="position-relative">
                                    <img src="{{ Storage::url($value->images) }}" alt="" class="img-fluid rounded" style="height:200px; width:100%; object-fit:cover; object-position:100% 0%;">
                                    <div class="project-overlay">
                                        <a class="btn btn-lg-square btn-warning rounded-circle m-1" href="{{ Storage::url($value->images) }}"
                                            data-lightbox="project"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-lg-square btn-primary  rounded-circle m-1" wire:click='delete({{ $value->id }})'><i
                                                class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                        
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