@extends('layouts.app')

@section('content')
    {{-- StartCreateModal --}}
    <div id="createModal" class="w-full h-full fixed top-0 left-0 z-50 transition-all duration-500 hidden overflow-y-auto">
        <div
            class="-translate-y-5 fc-modal-open:translate-y-0 fc-modal-open:opacity-100 opacity-0 duration-300 ease-in-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto flex flex-col bg-white shadow-sm rounded dark:bg-gray-800">
            <div class="flex justify-between items-center py-2.5 px-4 border-b dark:border-gray-700">
                <h3 class="font-medium text-gray-600 dark:text-white text-lg">
                    Add New Hero Background Image
                </h3>
                <button class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 dark:text-gray-200"
                    data-fc-dismiss type="button">
                    <i class="ri-close-line text-2xl"></i>
                </button>
            </div>
            <form action="{{ route('hero_backgrounds.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="p-4 overflow-y-auto">
                    <img src="" alt="" id="backgroundCreatePreview" class="w-1/2 mb-3">
                    <div class="mb-3">
                        <label class="mb-2" for="image">Image</label> - <small>Format: jpeg,png,jpg,gif,svg | Max:
                            2mb</small>
                        <br>
                        <input type="file" name="image" id="backgroundCreate" value="{{ old('image') }}"
                            class="border w-full rounded-md">
                    </div>
                </div>
                <div class="flex justify-end items-center gap-2 p-4 border-t dark:border-slate-700">
                    <button class="btn bg-light text-gray-800 transition-all" data-fc-dismiss type="button">Close</button>
                    <button type="submit" class="btn bg-primary text-white">Add Background</button>
                </div>
            </form>
        </div>
    </div>
    {{-- EndCreateModal --}}

    <div class="bg-white w-full flex flex-row justify-between items-center shadow-lg p-6 rounded-lg mb-3">
        <h1 class="text-2xl font-bold text-black dark:text-gray-400 mb-3 sm:m-0">HERO BACKGROUND</h1>
        <button class="btn bg-primary text-white outline-none text-xs sm:text-sm" data-fc-target="createModal"
            data-fc-type="modal" type="button"><i class="far fa-plus mr-1"></i> <span>Add Background</span></button>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-3">
        @forelse ($hero_backgrounds as $background)
            <div class="relative overflow-hidden">
                <i data-fc-type="modal" data-fc-target="deleteModal" data-id="{{ $background->id }}"
                    class="deleteModalBtn far fa-trash-alt absolute top-0 right-0 p-2 text-red-600 bg-white cursor-pointer"></i>
                <img src="{{ asset('storage/' . $background->image) }}" alt="">
            </div>
        @empty
            <div class="">
                <h1 class="font-semibold">Hero background is empty.</h1>
            </div>
        @endforelse
    </div>

    {{-- StartDeleteModal --}}
    <div id="deleteModal" class="w-full h-full fixed top-0 left-0 z-50 transition-all duration-500 hidden overflow-y-auto">
        <div
            class="-translate-y-5 fc-modal-open:translate-y-0 fc-modal-open:opacity-100 opacity-0 duration-300 ease-in-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto flex flex-col bg-white shadow-sm rounded dark:bg-gray-800">
            <div class="flex justify-between items-center py-2.5 px-4 border-b dark:border-gray-700">
                <h3 class="font-medium text-gray-600 dark:text-white text-lg">
                    Delete Background
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
                    <p>Are you sure you want to remove this background?</p>
                </div>
                <div class="flex justify-end items-center gap-2 p-4 border-t dark:border-slate-700">
                    <button class="btn bg-light text-gray-800 transition-all" data-fc-dismiss type="button">Close</button>
                    <button type="submit" class="btn bg-danger text-white">Delete</button>
                </div>
            </form>
        </div>
    </div>
    {{-- EndDeleteModal --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        const createImage = document.getElementById('backgroundCreate');

        createImage.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const backgroundCreatePreview = document.getElementById('backgroundCreatePreview');
                    backgroundCreatePreview.src = event.target.result;
                }
                reader.readAsDataURL(file);
            } else {
                backgroundCreatePreview.src = '';
            }
        });

        $(document).on('click', '.deleteModalBtn', function() {
            const id = $(this).data('id');
            let url = `{{ route('hero_backgrounds.destroy', 'id') }}`.replace('id', id);
            $('#deleteForm').attr('action', url);
        })
    </script>
@endsection
