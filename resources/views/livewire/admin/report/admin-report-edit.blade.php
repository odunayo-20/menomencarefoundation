


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
           @include('livewire.admin.includes.navbar')
            <!-- Navbar End -->


            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <form wire:submit.prevent='updateReport'>

                        <div class="col-sm-12 col-xl-12">
                            <div class="bg-secondary rounded h-100 p-4">
                                <h6 class="mb-4">Report</h6>
                                <div class="form-floating mb-3">
                                    <input wire:model='title' type="text" class="form-control" id="floatingInput"
                                        >
                                    <label for="floatingInput">Title</label>
                                    @error('title')
                                        <span class='text-danger'>{{ $message }}</span>
                                    @enderror
                                </div>
                                <div wire:ignore>
                                    <label for="floatingTextarea" class="text-white">Summary</label>
                                    <textarea wire:model.live='summary' id="content" class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea"></textarea>

                                    @error('summary')
                                    <span class='text-danger'>{{ $message }}</span>
                                @enderror

                                </div>
                              <div class="form-floating my-3">
                                    <input wire:model='date' type="date" class="form-control" id="floatingInput"
                                        >
                                    <label for="floatingInput">Date</label>
                                    @error('date')
                                        <span class='text-danger'>{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="my-3">
                                    <input wire:model='new_file' type="file" class="form-control form-control-lg">
                                        @error('new_file')
                                        <span class='text-danger'>{{ $message }}</span>
                                    @enderror

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
                    @this.set('summary', contents);
                }
            }
        });
     });

    </script>
    @endpush
