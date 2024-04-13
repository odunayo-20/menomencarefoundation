


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
                                <h6 class="mb-4">Team Edit</h6>
                                <div class="form-floating mb-3">
                                    <input wire:model='name' type="text" class="form-control" id="floatingInput"
                                        >
                                    <label for="floatingInput">Name</label>
                                    @error('name')
                                        <span class='text-danger'>{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input wire:model='profession' type="text" class="form-control" id="floatingPassword"
                                        placeholder="profession">
                                    <label for="floatingPassword">Profession</label>
                                    @error('profession')
                                    <span class='text-danger'>{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input wire:model='position' type="text" class="form-control" id="floatingPassword"
                                        placeholder="profession">
                                    <label for="floatingPassword">Position</label>
                                    @error('position')
                                    <span class='text-danger'>{{ $message }}</span>
                                @enderror
                                </div>

                                <div class="my-3">
                                    <input wire:model='new_image' type="file" class="form-control form-control-lg" id="floatingPassword"
                                        placeholder="textarea">
                                        @error('new_image')
                                        <span class='text-danger'>{{ $message }}</span>
                                    @enderror
                                    @if ($old_image)
                                    <img style="width: 50px; height: 50px" src="{{Storage::url($old_image)}}"
                                        alt="">
                                @endif
                                <div class="text-success" wire:target='new_image' wire:loading>Uploading...</div>
                                    @if ($new_image)
                                    <img style="width: 50px; height: 50px" src="{{$new_image->temporaryUrl() }}"
                                        alt="">
                                @endif
                                
                                </div>                                <div class='my-2'>
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

