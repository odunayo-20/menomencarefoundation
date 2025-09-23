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
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h6 class="mb-0">Edit Bible Quote</h6>
                            <a href="{{ route('admin_bible_quote') }}" class="btn btn-outline-secondary">
                                <i class="fa fa-arrow-left me-2"></i>Back to List
                            </a>
                        </div>

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

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input wire:model='book' type="text" class="form-control" id="floatingBook">
                                    <label for="floatingBook">Book</label>
                                    @error('book')
                                    <span class='text-danger'>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input wire:model='chapter' type="text" class="form-control" id="floatingChapter">
                                    <label for="floatingChapter">Chapter</label>
                                    @error('chapter')
                                    <span class='text-danger'>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input wire:model='verse' type="text" class="form-control" id="floatingVerse">
                                    <label for="floatingVerse">Verse</label>
                                    @error('verse')
                                    <span class='text-danger'>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea wire:model='quote_text' class="form-control" id="floatingQuote" style="height: 150px;"></textarea>
                            <label for="floatingQuote">Bible Quote</label>
                            @error('quote_text')
                            <span class='text-danger'>{{ $message }}</span>
                            @enderror
                        </div>

                        <div wire:ignore class="mb-3">
                            <label class="form-label">Explanation (Optional)</label>
                            <textarea id="explanation" wire:model='explanation' class="form-control"></textarea>
                            @error('explanation')
                            <span class='text-danger'>{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- <div class="my-3">
                            <label class="form-label">Image</label>

                            @if($currentImage)
                                <div class="mb-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <img style="width: 100px; height: 100px; object-fit: cover;"
                                             src="{{ Storage::url($currentImage) }}"
                                             alt="Current Image" class="rounded">
                                        <button type="button" wire:click="removeImage"
                                                class="btn btn-outline-danger btn-sm"
                                                wire:confirm="Are you sure you want to remove this image?">
                                            <i class="fa fa-trash me-1"></i>Remove Image
                                        </button>
                                    </div>
                                </div>
                            @endif

                            <input wire:model='image' type="file" class="form-control form-control-lg" id="imageInput">
                            <div class="form-text">Upload a new image to replace the current one</div>
                            <div class="text-success" wire:loading wire:target='image'>Uploading....</div>
                            @error('image')
                            <span class='text-danger'>{{ $message }}</span>
                            @enderror

                            @if ($image)
                            <div class="mt-2">
                                <strong>New Image Preview:</strong><br>
                                <img style="width: 100px; height: 100px; object-fit: cover;"
                                     src="{{$image->temporaryUrl() }}"
                                     alt="New Preview" class="rounded">
                            </div>
                            @endif
                        </div> --}}

                        <div class="form-check mb-3">
                            <input wire:model='is_active' class="form-check-input" type="checkbox" id="isActive">
                            <label class="form-check-label" for="isActive">
                                Active
                            </label>
                        </div>

                        <div class='my-2'>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save me-2"></i>Update Quote
                            </button>
                            <a href="{{ route('admin_bible_quote') }}" class="btn btn-secondary">
                                Cancel
                            </a>
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
    $('#explanation').summernote({
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
                @this.set('explanation', contents);
            }
        }
    });
 });

</script>
@endpush
