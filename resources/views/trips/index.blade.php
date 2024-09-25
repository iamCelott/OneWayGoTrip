@extends('layouts.app')

@section('content')
    {{-- StartCreateModal --}}
    <div id="createModal" class="w-full h-full fixed top-0 left-0 z-50 transition-all duration-500 hidden overflow-y-auto">
        <div
            class="-translate-y-5 fc-modal-open:translate-y-0 fc-modal-open:opacity-100 opacity-0 duration-300 ease-in-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto flex flex-col bg-white shadow-sm rounded dark:bg-gray-800">
            <div class="flex justify-between items-center py-2.5 px-4 border-b dark:border-gray-700">
                <h3 class="font-medium text-gray-600 dark:text-white text-lg">
                    Add New Trip
                </h3>
                <button class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 dark:text-gray-200"
                    data-fc-dismiss type="button">
                    <i class="ri-close-line text-2xl"></i>
                </button>
            </div>
            <form action="{{ route('trips.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="p-4 overflow-y-auto">
                    <img src="" alt="" id="imageCreatePreview" class="w-1/2 mb-3">
                    <div class="mb-3">
                        <label class="mb-2" for="image">Image</label>
                        <br>
                        <input type="file" name="image" id="imageCreate" value="{{ old('image') }}"
                            class="border w-full rounded-md">
                    </div>

                    <div class="mb-3">
                        <label class="mb-2" for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-input rounded-md text-sm"
                            value="{{ old('name') }}" placeholder="write your trip name here...">
                    </div>

                    <div class="mb-3">
                        <label class="mb-2" for="description">Description</label>
                        <textarea class="rounded-md text-sm" name="description" id="createDescription"
                            placeholder="write your trip description here...">{{ old('description') }}</textarea>
                    </div>
                </div>

                <div class="flex justify-end items-center gap-2 p-4 border-t dark:border-slate-700">
                    <button class="btn bg-light text-gray-800 transition-all" data-fc-dismiss type="button">Close</button>
                    <button type="submit" class="btn bg-primary text-white">Create Trip</button>
                </div>
            </form>
        </div>
    </div>
    {{-- EndCreateModal --}}

    <div class="bg-white w-full flex flex-row justify-between items-center shadow-lg p-6 rounded-lg mb-3">
        <h1 class="text-2xl font-bold text-black dark:text-gray-400 mb-3 sm:m-0">TRIP</h1>
        <button class="btn bg-primary text-white outline-none text-xs sm:text-sm" data-fc-target="createModal"
            data-fc-type="modal" type="button"><i class="far fa-plus mr-1"></i> <span>Add Trip</span></button>
    </div>

    <div class="relative w-full sm:w-1/2 mb-3">
        <i class="far fa-search absolute left-3 top-3.5"></i>
        <input type="text" class="px-9 outline-none rounded-lg text-sm w-full form-input"
            placeholder="search trip here...">
    </div>

    <div class="grid sm:grid-cols-3 gap-6 sm:gap-3">
        <div class="card sm:rounded-none sm:rounded-s-md h-full">
            <img class="w-full h-auto sm:rounded-tl-md sm:rounded-none rounded-t-md" src="assets/images/small/small-1.jpg"
                alt="Image Description">
            <div class="p-6">
                <h3 class="card-title mb-4">Card title</h3><!-- end card title -->
                <p class="mt-1 text-gray-800 dark:text-gray-400">This is a wider card with supporting text below as a
                    natural
                    lead-in to additional content. This content is a little bit longer.</p>
                <p class="mt-5 pb-5"><small>Last updated 3 mins ago</small></p>
            </div>
        </div><!-- Card End -->

        <div class="card sm:rounded-none h-full">
            <img class="w-full h-auto sm:rounded-none rounded-md" src="assets/images/small/small-2.jpg"
                alt="Image Description">
            <div class="p-6">
                <h3 class="card-title mb-4">Card title</h3><!-- end card title -->
                <p class="mt-1 text-gray-800 dark:text-gray-400">This card has supporting text below as a natural lead-in to
                    additional content.</p>
                <p class="mt-5 pb-5"><small>Last updated 3 mins ago</small></p>
            </div>
        </div><!-- Card End -->

        <div class="card sm:rounded-none sm:rounded-e-md h-full">
            <img class="w-full h-auto sm:rounded-tr-md sm:rounded-none rounded-t-md" src="assets/images/small/small-3.jpg"
                alt="Image Description">
            <div class="p-6">
                <h3 class="card-title mb-4">Card title</h3><!-- end card title -->
                <p class="mt-1 text-gray-800 dark:text-gray-400">This is a wider card with supporting text below as a
                    natural lead-in to additional content. This card has even longer content than the first to show that
                    equal height action.</p>
                <p class="mt-5"><small>Last updated 3 mins ago</small></p>
            </div>
        </div><!-- Card End -->
    </div>

    <script>
        const createImage = document.getElementById('imageCreate');

        createImage.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const imageCreatePreview = document.getElementById('imageCreatePreview');
                    imageCreatePreview.src = event.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
