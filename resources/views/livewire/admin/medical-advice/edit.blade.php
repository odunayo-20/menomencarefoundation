<!-- Content Start -->
<div class="content">
    <!-- Navbar Start -->
    @include('livewire.admin.includes.navbar')
    <!-- Navbar End -->

    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <form wire:submit.prevent='update'>
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Edit Medical Advice</h6>

                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="form-floating mb-3">
                            <input wire:model='title' type="text" class="form-control" id="floatingTitle">
                            <label for="floatingTitle">Title</label>
                            @error('title')
                            <span class='text-danger'>{{ $message }}</span>
                            @enderror
                        </div>



                        <div wire:ignore class="mb-3">
                            <label class="form-label">Content</label>
                            <textarea id="content" wire:model='content' class="form-control"></textarea>
                            @error('content')
                            <span class='text-danger'>{{ $message }}</span>
                            @enderror
                        </div>



                        <div class="form-check mb-3">
                            <input wire:model='status' class="form-check-input" type="checkbox" id="status">
                            <label class="form-check-label" for="status">
                                Status
                            </label>
                        </div>

                        <div class='my-2'>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" wire:click="$set('title', '')" class="btn btn-secondary">Reset</button>
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
