@extends('layouts.app')

@section('content')
    <div class="bg-white w-full flex flex-row justify-between items-center shadow-lg p-6 rounded-lg mb-3">
        <h1 class="text-2xl font-bold text-black dark:text-gray-400 mb-3 sm:m-0">GALLERIES</h1>
    </div>

    <form action="{{ route('galleries.store') }}" class="dropzone relative mb-3" id="gallery-dropzone" method="POST">
        @csrf
        <button type="submit" id="submitBtn"
            class="bg-primary rounded-md cursor-pointer text-white px-3 py-1.5 absolute bottom-3 right-3">Add
            Images</button>
    </form>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-3">
        @forelse ($galleries as $gallery)
            <div class="relative overflow-hidden">
                <i data-fc-type="modal" data-fc-target="deleteModal" data-id="{{ $gallery->id }}"
                    class="deleteModalBtn far fa-trash-alt absolute top-0 right-0 p-2 text-red-600 bg-white cursor-pointer"></i>
                <img src="{{ asset('storage/' . $gallery->image) }}" alt="" class="object-cover rounded-md">
            </div>
        @empty
            <div class="">
                <h1 class="font-semibold">Gallery is empty.</h1>
            </div>
        @endforelse
    </div>

    {{-- StartDeleteModal --}}
    <div id="deleteModal" class="w-full h-full fixed top-0 left-0 z-50 transition-all duration-500 hidden overflow-y-auto">
        <div
            class="-translate-y-5 fc-modal-open:translate-y-0 fc-modal-open:opacity-100 opacity-0 duration-300 ease-in-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto flex flex-col bg-white shadow-sm rounded dark:bg-gray-800">
            <div class="flex justify-between items-center py-2.5 px-4 border-b dark:border-gray-700">
                <h3 class="font-medium text-gray-600 dark:text-white text-lg">
                    Delete Image
                </h3>
                <button class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 dark:text-gray-200"
                    data-fc-dismiss type="button">
                    <i class="ri-close-line text-2xl"></i>
                </button>
            </div>
            <form action="" method="POST" id="deleteForm">
                @csrf
                @method('DELETE')
                <div class="p-6">
                    <p>Are you sure you want to remove this image?</p>
                </div>
                <div class="flex justify-end items-center gap-2 p-4 border-t dark:border-slate-700">
                    <button class="btn bg-light text-gray-800 transition-all" data-fc-dismiss type="button">Close</button>
                    <button type="submit" class="btn bg-danger text-white">Delete</button>
                </div>
            </form>
        </div>
    </div>
    {{-- EndDeleteModal --}}

    <script>
        Dropzone.autoDiscover = false;

        const dropzoneElement = document.getElementById('gallery-dropzone');
        const myDropzone = new Dropzone(dropzoneElement, {
            url: "{{ route('galleries.store') }}",
            paramName: "images",
            maxFilesize: 2,
            acceptedFiles: ".jpeg,.jpg,.png,.svg",
            autoProcessQueue: false,
            addRemoveLinks: true,
            dictDefaultMessage: "drop file here or click to upload",
            parallelUploads: 6,
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
                    window.location.href = "{{ route('galleries.index') }}";
                });
            },
            submitForm: function() {
                localStorage.setItem('uploadSuccessMessage', 'Upload gambar berhasil.');
                window.location.href = "{{ route('galleries.index') }}";
            }
        })

        $(document).on('click', '.deleteModalBtn', function() {
            const id = $(this).data('id');
            console.log(id);
            let url = `{{ route('galleries.destroy', 'id') }}`.replace('id', id);
            $('#deleteForm').attr('action', url);
        })
    </script>
@endsection
