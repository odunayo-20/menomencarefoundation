<!-- Content Start -->
<div class="content">
    <!-- Navbar Start -->
    @include('livewire.admin.includes.navbar')
    <!-- Navbar End -->


    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <form wire:submit='store'>

                <div class="col-sm-12 col-xl-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Upload Images to Past Events</h6>

                        <select wire:model='title' class="form-select form-select-lg bg-white mb-3">
                            <option selected>Open this select menu</option>
                            @foreach($pastEvents as $value)
                            <option value={{$value->id}}>{{$value->title}}</option>
                            @endforeach
                        </select>
                        @error('title')
                        <span class='text-danger'>{{ $message }}</span>
                        @enderror
                        <div class='card'>
                            <div class='card-body'>
                                <div class="border rounded d-flex justify-content-center align-items-center"
                                    style="height:200px; cursor: pointer;">
                                    <div class="text-center">
                                        <p>Click to select a file</p>
                                        <input multiple wire:model='images' type="file" class="form-contrl w-75"
                                            accept="image/*" id="floatingPassword">
                                    </div>
                                    @error('images')
                                    <span class='text-danger'>{{ $message }}</span>
                                    @enderror
                                </div>
                                @if($images)
                                @foreach ($images as $index=> $image)
                                <div class="position-relative d-inline-block ">

                                    <img src="{{ $image->temporaryUrl() }}" alt="" class="img-fluid  rounded"
                                        style="width: 100px; height:100px; position:relativ;">
                                    <span wire:click='cancelImage({{ $index }})'
                                        class="btn btn-sm btn-danger d-inline-block "
                                        style='left:70px; position:absolute;'>X</span>
                                </div>

                                @endforeach

                                @endif

                            </div>
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