@extends('layouts.app')

@section('content')
    <div class="bg-white w-full flex flex-row justify-between items-center shadow-lg p-6 rounded-lg mb-3">
        <h1 class="text-2xl font-bold text-black dark:text-gray-400 mb-3 sm:m-0">SET IMAGE DETAIL FOR {{ $trip->name }}
        </h1>
    </div>

    <small class="mb-1">Format: jpeg,png,jpg,svg - Max 2mb</small>
    <form action="{{ route('trip_images.store') }}" class="dropzone relative mb-3" id="tripimage-dropzone" method="POST">
        @csrf
        <input type="hidden" name="trip_id" value="{{ $trip->id }}">
        <button type="submit" id="submitBtn"
            class="rounded-md cursor-pointer text-white px-3 py-1.5 absolute bottom-3 right-3">Add
            Images</button>
    </form>

    <form action="{{ route('trip.deleteimage', $trip->id) }}" method="POST" class="font-poppins">
        @csrf
        @method('DELETE')
        <button type="submit" id="deleteBtn" class="bg-red-500 duration-300 rounded-md text-white px-3 py-1.5 mb-3"
            disabled>
            Delete Selected Images
        </button>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-3 mt-3">
            @forelse ($trip_images as $image)
                <div class="relative overflow-hidden">
                    <input type="checkbox" name="image_id[]"
                        class="absolute top-2 right-2 h-6 w-6 text-primary-300 bg-white cursor-pointer border-2 border-gray-300 rounded-md focus:ring-2 focus:ring-primary-500 transition-all duration-300 appearance-none checked:bg-primary-600 checked:border-primary-600 checkbox-image"
                        value="{{ $image->id }}">
                    <div
                        class="absolute top-2 right-2 hidden group-hover:block h-6 w-6 rounded-md border border-gray-300 bg-white flex items-center justify-center transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary-600 hidden checkbox-image-svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <img src="{{ asset('storage/' . $image->image) }}" alt="" class="object-cover rounded-md">
                </div>
            @empty
                <div class="">
                    <h1 class="font-semibold">Image detail is empty.</h1>
                </div>
            @endforelse
        </div>
    </form>

    <script>
        $(document).ready(function() {
            function toggleDeleteButton() {
                if ($('.checkbox-image:checked').length > 0) {
                    $('#deleteBtn').prop('disabled', false).removeClass('bg-red-300').addClass('bg-red-500');
                } else {
                    $('#deleteBtn').prop('disabled', true).removeClass('bg-red-500').addClass('bg-red-300');;
                }
            }

            $('.checkbox-image').on('change', function() {
                toggleDeleteButton();
            });

            toggleDeleteButton();
        });

        Dropzone.autoDiscover = false;

        const dropzoneElement = document.getElementById('tripimage-dropzone');
        const myDropzone = new Dropzone(dropzoneElement, {
            url: "{{ route('trip_images.store') }}",
            paramName: "images",
            maxFilesize: 2,
            acceptedFiles: ".jpeg,.jpg,.png,.svg",
            autoProcessQueue: false,
            addRemoveLinks: true,
            dictDefaultMessage: "drop file here or click to upload",
            parallelUploads: 20,
            init: function() {
                const submitButton = document.getElementById("submitBtn");
                const dropzoneInstance = this;

                submitButton.addEventListener("click", function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    if (dropzoneInstance.getQueuedFiles().length > 0) {
                        dropzoneInstance.processQueue();
                    } else {
                        dropzoneInstance.submitForm();
                    }
                });

                this.on("success", function(file, response) {
                    console.log('Upload Success:', response);
                });

                this.on("queuecomplete", function() {
                    localStorage.setItem('uploadSuccessMessage', 'Success upload image.');
                    window.location.href = "{{ route('trip.setimage', $trip->id) }}";
                });
            },
            submitForm: function() {
                localStorage.setItem('uploadSuccessMessage', 'Upload gambar berhasil.');
                window.location.href = "{{ route('trip.setimage', $trip->id) }}";
            }
        })
    </script>
@endsection
