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
                        <h6 class="mb-4">Event</h6>
                        <div class="form-floating mb-3">
                            <input wire:model='title' type="text" class="form-control" id="floatingInput">
                            <label for="floatingInput">Title</label>
                            @error('title')
                                <span class='text-danger'>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input wire:model='date' type="date" class="form-control" id="floatingPassword"
                                placeholder="Password">
                            <label for="floatingPassword">Date</label>
                            @error('date')
                                <span class='text-danger'>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input wire:model='time' type="time" class="form-control" id="floatingPassword"
                                placeholder="Time">
                            <label for="floatingPassword">Time</label>
                            @error('time')
                                <span class='text-danger'>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input wire:model='location' type="text" class="form-control" id="floatingPassword"
                                placeholder="textarea">
                            <label for="floatingPassword">Location</label>
                            @error('location')
                                <span class='text-danger'>{{ $message }}</span>
                            @enderror

                        </div>

                        <div wire:ignore>
                            
                            <textarea id="content" wire:model='content'  class="form-control"></textarea>

                            @error('content')
                            <span class='text-danger'>{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="my-3">
                            <input wire:model='new_image' type="file" class="form-control form-control-lg">
                            <div class="text-success" wire:loading wire:target='new_image'>Uploading....</div>
                            @error('new_image')
                                <span class='text-danger'>{{ $message }}</span>
                            @enderror
                            @if ($old_image)
                                <img style="width: 50px; height: 50px" src="{{ Storage::url($old_image) }}"
                                    alt="">
                            @endif
                            @if ($new_image)
                                <img style="width: 50px; height: 50px" src="{{$new_image->temporaryUrl() }}"
                                    alt="">

                            @endif
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

@push('script')
<script>
 $(function (){
    $('#content').summernote({
        placeholder: 'Enter Description'
        , tabsize: 2
        , height: 300
        , toolbar: [
            ['style', ['style']]
            , ['font', ['bold', 'underline', 'clear']]
            , ['color', ['color']]
            , ['para', ['ul', 'ol', 'paragraph']]
            , ['table', ['table']]
            , ['view', ['fullscreen', 'codeview', 'help']],
            ['insert', ['link', 'picture']]
        ]
        , callbacks: {
            onChange: function(contents, $editable) {
                @this.set('content', contents);
            }
        }
    });
 });

</script>
@endpush
