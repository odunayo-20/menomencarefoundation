<!-- Content Start -->
<div class="content">
    <!-- Navbar Start -->
    @include('livewire.admin.includes.navbar')
    <!-- Navbar End -->

    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <form wire:submit.prevent='store'>
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Bible Quote</h6>

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
                            <textarea wire:model='quote' class="form-control" id="floatingQuote" style="height: 150px;"></textarea>
                            <label for="floatingQuote">Bible Quote</label>
                            @error('quote')
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
                            <label class="form-label">Image (Optional)</label>
                            <input wire:model='image' type="file" class="form-control form-control-lg" id="imageInput">
                            <div class="text-success" wire:loading wire:target='image'>Uploading....</div>
                            @error('image')
                            <span class='text-danger'>{{ $message }}</span>
                            @enderror
                            @if ($image)
                            <div class="mt-2">
                                <img style="width: 100px; height: 100px; object-fit: cover;" src="{{$image->temporaryUrl() }}" alt="Preview" class="rounded">
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
    $('#explanation').summernote({
        placeholder: 'Enter Explanation (Optional)'
        , tabsize: 2
        , height: 200
        , toolbar: [
            ['style', ['style']]
            , ['font', ['bold', 'underline', 'clear']]
            , ['color', ['color']]
            , ['para', ['ul', 'ol', 'paragraph']]
            , ['table', ['table']]
            , ['view', ['fullscreen', 'codeview', 'help']],
            ['insert', ['link']]
        ]
        , callbacks: {
            onChange: function(contents, $editable) {
                @this.set('explanation', contents);
            }
        }
    });
</script>
@endpush
