@extends('layouts.app')

@section('content')
    <style>
        .ellipsis {
            display: -webkit-box;
            -webkit-line-clamp: 5;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>

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
                <div class="p-4 overflow-y-auto max-h-[400px]">
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

    <div class="relative w-full sm:w-1/3 mb-3">
        <i class="far fa-search absolute left-3 top-3.5"></i>
        <form action="{{ route('trips.index') }}" method="GET">
            @csrf
            <input type="text" name="search" class="px-9 outline-none rounded-lg text-sm w-full form-input"
                placeholder="search trip here..." value="{{ request('search') }}">
        </form>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-3">
        @forelse ($trips as $trip)
            <div class="card sm:rounded-lg overflow-hidden h-full flex flex-col justify-between">
                <div>
                    <img class="w-full h-[200px] sm:rounded-tl-md sm:rounded-none rounded-t-md object-cover border-b-2"
                        src="{{ $trip->image ? asset('storage/' . $trip->image) : asset('storage/images/not_found/image_not_available.png') }}"
                        alt="{{ $trip->name }}">
                    <div class="px-6 py-3">
                        <div class="flex justify-between">
                            <h3 class="card-title mb-3">{{ $trip->name }}</h3>
                            <div>
                                <a href="javascript: void(0);" data-fc-type="dropdown" data-fc-placement="bottom-end">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div
                                    class="fc-dropdown fc-dropdown-open:opacity-100 opacity-0 min-w-40 z-50 transition-all duration-300 bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-600 rounded-md py-1 hidden">
                                    {{-- @if ($trip->packages->isNotEmpty())
                                        <button
                                            class="w-full flex items-center py-1.5 px-5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                            data-fc-target="editModal{{ $trip->id }}" data-fc-type="modal"
                                            type="button"><i class="far fa-pencil mr-1"></i>
                                            <span>Edit</span></button>
                                    @else
                                        <p>No packages available for this trip.</p>
                                    @endif --}}
                                    <button
                                        class="setPackageBtn w-full flex items-center py-1.5 px-5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                        data-fc-target="setPackageModal" data-fc-type="modal" data-id="{{ $trip->id }}"
                                        data-name="{{ $trip->name }}" type="button"><i
                                            class="fal fa-clipboard-list mr-1"></i>
                                        <span>Set Package</span></button>
                                    <button
                                        class="w-full flex items-center py-1.5 px-5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                        data-fc-target="editModal{{ $trip->id }}" data-fc-type="modal"
                                        type="button"><i class="far fa-pencil mr-1"></i>
                                        <span>Edit</span></button>
                                    <button
                                        class="w-full flex items-center py-1.5 px-5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                        data-fc-target="deleteModal{{ $trip->id }}" data-fc-type="modal"
                                        type="button"><i class="far fa-trash mr-1"></i>
                                        <span>Delete</span></button>
                                </div>
                            </div>
                        </div>
                        <div class="ellipsis">
                            @if ($trip->description)
                                {!! $trip->description !!}
                            @else
                                <p>Empty description.</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="px-6 pb-3 flex justify-between items-center">
                    <p><small>Created at {{ \Carbon\Carbon::parse($trip->updated_at)->format('j F Y, H:i') }} </small></p>
                    <button class="bg-primary rounded-md px-3 py-1 text-white" data-fc-type="modal"
                        data-fc-target="detailModal{{ $trip->id }}">Detail</button>
                </div>
            </div>

            {{-- StartDetailModal --}}
            <div id="detailModal{{ $trip->id }}"
                class="w-full h-full fixed top-0 left-0 z-50 transition-all duration-500 hidden overflow-y-auto">
                <div
                    class="-translate-y-5 fc-modal-open:translate-y-0 fc-modal-open:opacity-100 opacity-0 duration-300 ease-in-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto flex flex-col bg-white shadow-sm rounded dark:bg-gray-800">
                    <div class="flex justify-between items-center py-2.5 px-4 border-b dark:border-gray-700">
                        <h3 class="font-medium text-gray-600 dark:text-white text-lg">
                            {{ $trip->name }} Detail
                        </h3>
                        <button class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 dark:text-gray-200"
                            data-fc-dismiss type="button">
                            <i class="ri-close-line text-2xl"></i>
                        </button>
                    </div>

                    <div class="p-4 overflow-y-auto max-h-[400px]">
                        <img class="w-full h-[200px] rounded-md object-cover mb-3"
                            src="{{ $trip->image ? asset('storage/' . $trip->image) : asset('storage/images/not_found/image_not_available.png') }}"
                            alt="{{ $trip->name }}">
                        <h1 class="card-title mb-3">{{ $trip->name }}</h1>

                        {!! $trip->description !!}

                        <div class="flex space-x-4 border-b">
                            @foreach ($trip->packages as $package)
                                <button id="tab{{ $package->id }}-btn"
                                    class="relative py-2 px-1.5 text-sm text-gray-600 hover:text-black transition duration-300 focus:outline-none">
                                    {{ $package->name }}
                                    <span
                                        class="absolute left-0 bottom-0 w-full h-0.5 bg-transparent hover:bg-black transition duration-300"></span>
                                </button>
                            @endforeach
                        </div>

                        @foreach ($trip->packages as $package)
                            <div id="tab{{ $package->id }}-content" class="tab-content hidden py-3">
                                <div class="mb-3">
                                    <strong>Price:</strong>
                                    {!! $package->pivot->price !!}
                                </div>
                                <div class="sm:flex mb-3 gap-3">
                                    <div class="w-full sm:w-1/2">
                                        <strong>Include:</strong>
                                        <br>
                                        <p>{!! $package->pivot->include !!}</p>
                                    </div>
                                    <div class="w-ful sm:w-1/2">
                                        <strong>Exclude:</strong>
                                        <br>
                                        <p>{!! $package->pivot->exclude !!}</p>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <strong>Destination:</strong>
                                    {!! $package->pivot->destination !!}
                                </div>
                                <div class="mb-3">
                                    <strong>Notes:</strong>
                                    {!! $package->pivot->notes !!}
                                </div>
                            </div>
                        @endforeach
                    </div>


                    <div class="flex justify-end items-center gap-2 p-4 border-t dark:border-slate-700">
                        <button class="btn bg-light text-gray-800 transition-all" data-fc-dismiss
                            type="button">Close</button>
                    </div>
                </div>
            </div>
            {{-- EndDetailModal --}}

            <script>
                const tabButtons = document.querySelectorAll('[id$="-btn"]');
                const tabContents = document.querySelectorAll('[id$="-content"]');

                tabButtons.forEach(button => {
                    button.addEventListener('click', () => {

                        tabButtons.forEach(btn => {
                            btn.classList.remove('text-black', 'font-bold');
                            btn.querySelector('span').classList.remove('bg-black');
                            btn.classList.add('text-gray-600');
                        });
                        tabContents.forEach(content => content.classList.add('hidden'));

                        const tabId = button.id.split('-btn')[0];
                        button.classList.add('text-black', 'font-bold');
                        button.querySelector('span').classList.add('bg-black');
                        document.getElementById(`${tabId}-content`).classList.remove('hidden');
                    });
                });

                const firstButton = tabButtons[0];
                if (firstButton) {
                    firstButton.click();
                }
            </script>

            {{-- StartEditModal --}}
            <div id="editModal{{ $trip->id }}"
                class="w-full h-full fixed top-0 left-0 z-50 transition-all duration-500 hidden overflow-y-auto">
                <div
                    class="-translate-y-5 fc-modal-open:translate-y-0 fc-modal-open:opacity-100 opacity-0 duration-300 ease-in-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto flex flex-col bg-white shadow-sm rounded dark:bg-gray-800">
                    <div class="flex justify-between items-center py-2.5 px-4 border-b dark:border-gray-700">
                        <h3 class="font-medium text-gray-600 dark:text-white text-lg">
                            Edit Trip {{ $trip->name }}
                        </h3>
                        <button class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 dark:text-gray-200"
                            data-fc-dismiss type="button">
                            <i class="ri-close-line text-2xl"></i>
                        </button>
                    </div>
                    <form action="{{ route('trips.update', $trip->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="p-4 overflow-y-auto max-h-[400px] image-container">
                            <img src="{{ $trip->image ? asset('storage/' . $trip->image) : asset('storage/images/not_found/image_not_available.png') }}"
                                class="imageEditPreview w-1/2 mb-3">
                            <div class="mb-3">
                                <label class="mb-2" for="image">Image</label>
                                <br>
                                <input type="file" name="image" value="{{ $trip->image }}"
                                    class="imageEdit border w-full rounded-md">
                            </div>

                            <div class="mb-3">
                                <label class="mb-2" for="name">Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-input rounded-md text-sm" value="{{ $trip->name }}"
                                    placeholder="write your trip name here...">
                            </div>

                            <div class="mb-3">
                                <label class="mb-2" for="description">Description</label>
                                <textarea class="editDescription rounded-md text-sm" name="description"
                                    placeholder="write your trip description here...">{{ $trip->description }}</textarea>
                            </div>
                        </div>

                        <div class="flex justify-end items-center gap-2 p-4 border-t dark:border-slate-700">
                            <button class="btn bg-light text-gray-800 transition-all" data-fc-dismiss
                                type="button">Close</button>
                            <button type="submit" class="btn bg-primary text-white">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
            {{-- EndEditModal --}}

            {{-- StartDeleteModal --}}
            <div id="deleteModal{{ $trip->id }}"
                class="w-full h-full fixed top-0 left-0 z-50 transition-all duration-500 hidden overflow-y-auto">
                <div
                    class="-translate-y-5 fc-modal-open:translate-y-0 fc-modal-open:opacity-100 opacity-0 duration-300 ease-in-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto flex flex-col bg-white shadow-sm rounded dark:bg-gray-800">
                    <div class="flex justify-between items-center py-2.5 px-4 border-b dark:border-gray-700">
                        <h3 class="font-medium text-gray-600 dark:text-white text-lg">
                            Delete Trip {{ $trip->name }}
                        </h3>
                        <button class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 dark:text-gray-200"
                            data-fc-dismiss type="button">
                            <i class="ri-close-line text-2xl"></i>
                        </button>
                    </div>
                    <form action="{{ route('trips.destroy', $trip->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="p-6">
                            <p>Are you sure you want to remove this trip?</p>
                        </div>
                        <div class="flex justify-end items-center gap-2 p-4 border-t dark:border-slate-700">
                            <button class="btn bg-light text-gray-800 transition-all" data-fc-dismiss
                                type="button">Close</button>
                            <button type="submit" class="btn bg-danger text-white">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
            {{-- EndDeleteModal --}}
        @empty
            <div class="">
                <h1 class="font-semibold">
                    {{ request('search') ? 'Trip ' . request('search') . ' not found' : 'Trip is empty.' }}</h1>
            </div>
        @endforelse


        {{-- StartSetPackageModal --}}
        <div id="setPackageModal"
            class="w-full h-full fixed top-0 left-0 z-50 transition-all duration-500 hidden overflow-y-auto">
            <div
                class="-translate-y-5 fc-modal-open:translate-y-0 fc-modal-open:opacity-100 opacity-0 duration-300 ease-in-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto flex flex-col bg-white shadow-sm rounded dark:bg-gray-800">
                <div class="flex justify-between items-center py-2.5 px-4 border-b dark:border-gray-700">
                    <h3 class="font-medium text-gray-600 dark:text-white text-lg" id="packageTripName">
                        Set Package And Detail For
                    </h3>
                    <button class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 dark:text-gray-200"
                        data-fc-dismiss type="button">
                        <i class="ri-close-line text-2xl"></i>
                    </button>
                </div>
                <form action="{{ route('trip_packages.store') }}" method="POST">
                    @csrf
                    <div class="p-4 max-h-[300px] overflow-y-auto">

                        <input type="hidden" name="trip_id" id="trip_id" value="">

                        <div class="mb-3">
                            <label class="mb-2" for="price">Choose Package</label>
                            <select class="form-select outline-none" name="package_id">
                                @foreach ($packages as $package)
                                    <option value="{{ $package->id }}">{{ $package->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="mb-2" for="price">Price</label>
                            <textarea class="ckeditor rounded-md text-sm" name="price" placeholder="write your package price here...">{{ old('price') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="mb-2" for="include">Include</label>
                            <textarea class="ckeditor rounded-md text-sm" name="include" placeholder="write your package include here...">{{ old('include') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="mb-2" for="exclude">Exclude</label>
                            <textarea class="ckeditor rounded-md text-sm" name="exclude" placeholder="write your package exclude here...">{{ old('exclude') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="mb-2" for="destination">Destinations</label>
                            <textarea class="ckeditor rounded-md text-sm" name="destination" placeholder="write your trip destination here...">{{ old('destination') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="mb-2" for="notes">Notes</label>
                            <textarea class="ckeditor rounded-md text-sm" name="notes" placeholder="write your trip note here...">{{ old('notes') }}</textarea>
                        </div>
                    </div>

                    <div class="flex justify-end items-center gap-2 p-4 border-t dark:border-slate-700">
                        <button class="btn bg-light text-gray-800 transition-all" data-fc-dismiss
                            type="button">Close</button>
                        <button type="submit" class="btn bg-primary text-white">Set Package</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- EndSetPackageModal --}}
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
            } else {
                imageCreatePreview.src = '';
            }
        });

        const editImages = document.querySelectorAll('.imageEdit');

        editImages.forEach(function(editImage) {
            editImage.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        const imageEditPreview = editImage.closest('.image-container').querySelector(
                            '.imageEditPreview');
                        imageEditPreview.src = event.target.result;
                    }
                    reader.readAsDataURL(file);
                } else {
                    const imageEditPreview = editImage.closest('.image-container').querySelector(
                        '.imageEditPreview');
                    imageEditPreview.src = '';
                }
            });
        });

        $(document).on('click', '.setPackageBtn', function() {
            const id = $(this).data('id');
            const name = $(this).data('name');
            $('#packageTripName').html("Set Package And Title For " + name);
            $('#idTrip').html(id);
            $('#trip_id').val(id);
        })
    </script>
@endsection
