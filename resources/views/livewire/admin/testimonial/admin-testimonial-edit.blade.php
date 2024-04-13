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
                        <h6 class="mb-4">Testimonial</h6>
                        <div class="form-floating mb-3">
                            <input wire:model='name' type="text" class="form-control" id="floatingInput">
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



                        <div wire:ignore>
                            <label for="floatingTextarea">Content</label>
                            <textarea wire:model='content' class="form-control" placeholder="Leave a comment here"
                                id="content"></textarea>
                            @error('content')
                            <span class='text-danger'>{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="my-3">
                            <input wire:model='new_video' type="file" class="form-control form-control-lg" id="floatingPassword"
                                placeholder="textarea">
                                <div class="text-success" wire:loading wire:target='new_video'>Uploading...</div>
                            @error('new_video')
                            <span class='text-danger'>{{ $message }}</span>
                            @enderror

                            @if ($old_video)
                            <video style="width: 100px; height: 100px" controls>
                                <source src="{{ Storage::url($old_video) }}">
                            </video>
                            @endif
                            @if ($new_video)
                            <video style="width: 100px; height: 100px" controls>
                                <source src="{{ $new_video->temporaryUrl() }}">
                            </video>
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
