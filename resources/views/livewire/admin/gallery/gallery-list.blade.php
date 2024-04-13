<!-- Content Start -->
<div class="content">

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
    <!-- Navbar Start -->
    @include('livewire.admin.includes.navbar')
    <!-- Navbar End -->


    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">

        <!-- Modal Start-->
        @include('livewire.admin.deleteForm.form-delete')
        <!-- Modal stop-->

        <div class="row g-4">

            <div class="col-md-4">
                <a href="{{ route('admin_gallery_create') }}" class="btn btn-sm btn-primary">New Gallery</a>
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

            </div>
            <div class="col-md-12">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa fa-exclamation-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Gallery</h6>

                    <div class="row">
                        @if($gallery->isEmpty())
                        <p>No Record</p>
                        @endif
                        @foreach ($gallery as $value)
                        <div class="col-md-3">
                            <div class="project-item mb-5">
                                <div class="position-relative">
                                    <img src="{{ Storage::url($value->image) }}" alt="" class="img-fluid rounded" style="height:200px; width:100%; object-fit:cover; object-position:100% 0%;">
                                    <div class="project-overlay">
                                        <a class="btn btn-lg-square btn-warning rounded-circle m-1" href="{{ Storage::url($value->image) }}" data-lightbox="project"><i class="fa fa-eye"></i></a>
                                        <a wire:click='delete({{ $value->id }})' data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-lg-square btn-primary  rounded-circle m-1"><i class="fa fa-trash"></i></a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{ $gallery->links() }}
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
