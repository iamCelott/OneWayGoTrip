@extends('layouts.app')

@section('content')
    {{-- StartSetPackageModal --}}
    <div id="setPackage" class="w-full h-full fixed top-0 left-0 z-50 transition-all duration-500 hidden overflow-y-auto">
        <div
            class="-translate-y-5 fc-modal-open:translate-y-0 fc-modal-open:opacity-100 opacity-0 duration-300 ease-in-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto flex flex-col bg-white shadow-sm rounded dark:bg-gray-800">
            <div class="flex justify-between items-center py-2.5 px-4 border-b dark:border-gray-700">
                <h3 class="font-medium text-gray-600 dark:text-white text-lg" id="packageTripName">
                    Set Package And Detail For {{ $trip->name }}
                </h3>
                <button class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 dark:text-gray-200"
                    data-fc-dismiss type="button">
                    <i class="ri-close-line text-2xl"></i>
                </button>
            </div>
            <form action="{{ route('trip_packages.store') }}" method="POST">
                @csrf
                <div class="p-4 max-h-[300px] overflow-y-auto">

                    <input type="hidden" name="trip_id" value="{{ $trip->id }}">

                    <div class="mb-3">
                        <label class="mb-2" for="price">Choose Package</label>
                        <select class="form-select outline-none" name="package_id">
                            @forelse ($packages as $package)
                                <option value="{{ $package->id }}"
                                    {{ old('package_id') == $package->id ? 'selected' : '' }}>{{ $package->name }}
                                </option>
                            @empty
                                <option value="" selected>Package is empty</option>
                            @endforelse
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
                        <label class="mb-2" for="itinerary">Itinerary</label>
                        <textarea class="ckeditor rounded-md text-sm" name="itinerary" placeholder="write your trip itinerary here...">{{ old('itinerary') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="mb-2" for="notes">Notes (Optional)</label>
                        <textarea class="ckeditor rounded-md text-sm" name="notes" placeholder="write your trip note here...">{{ old('notes') }}</textarea>
                    </div>
                </div>

                <div class="flex justify-end items-center gap-2 p-4 border-t dark:border-slate-700">
                    <button class="btn bg-light text-gray-800 transition-all" data-fc-dismiss type="button">Close</button>
                    <button type="submit" class="btn bg-primary text-white">Set Package</button>
                </div>
            </form>
        </div>
    </div>
    {{-- EndSetPackageModal --}}

    <button class="bg-primary text-white flex items-center py-1.5 px-5 text-sm font-medium rounded-md"
        data-fc-target="setPackage" data-fc-type="modal" type="button"><i class="fal fa-clipboard-list mr-1"></i>
        <span>Add Package</span></button>


    <div class="grid grid-cols-1 lg:grid-cols-2 gap-3 mt-3">
        @forelse ($trip->packages as $package)
            <div class="w-full bg-white h-full rounded-lg shadow-lg">
                <div class="p-6 relative">
                    <h1 class="text-2xl font-bold text-center text-black">{{ $package->name }}</h1>

                    <div class="absolute top-6 right-6">
                        <a href="javascript: void(0);" data-fc-type="dropdown" data-fc-placement="bottom-end">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div
                            class="fc-dropdown fc-dropdown-open:opacity-100 opacity-0 min-w-40 z-50 transition-all duration-300 bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-600 rounded-md py-1 hidden">
                            <button
                                class="w-full flex items-center py-1.5 px-5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                id="editBtn" data-fc-type="modal" data-fc-target="editModal" type="button"
                                data-id="{{ $package->pivot->id }}" data-price="{{ $package->pivot->price }}"
                                data-include="{{ $package->pivot->include }}"
                                data-exclude="{{ $package->pivot->exclude }}"
                                data-itinerary="{{ $package->pivot->itinerary }}"
                                data-notes="{{ $package->pivot->notes }}"><i class="far fa-pencil mr-1"></i>
                                <span>Edit</span></button>
                            <button
                                class="w-full flex items-center py-1.5 px-5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                data-fc-type="modal" type="button" id="deleteBtn" data-fc-target="deleteModal"
                                data-id="{{ $package->pivot->id }}"><i class="far fa-trash mr-1"></i>
                                <span>Delete</span></button>
                        </div>
                    </div>

                    <div class="mb-3">
                        <h1 class="text-lg font-bold text-[rgba(0,0,0,0.7)]">PRICE</h1>
                        <p>{!! $package->pivot->price !!}</p>
                    </div>

                    <div class="mb-3">
                        <h1 class="text-lg font-bold text-[rgba(0,0,0,0.7)]">INCLUDE</h1>
                        <p>{!! $package->pivot->include !!}</p>
                    </div>

                    <div class="mb-3">
                        <h1 class="text-lg font-bold text-[rgba(0,0,0,0.7)]">EXCLUDE</h1>
                        <p>{!! $package->pivot->exclude !!}</p>
                    </div>

                    <div class="mb-3">
                        <h1 class="text-lg font-bold text-[rgba(0,0,0,0.7)]">ITINERARY</h1>
                        <p>{!! $package->pivot->itinerary !!}</p>
                    </div>
                    <div class="mb-3">
                        <h1 class="text-lg font-bold text-[rgba(0,0,0,0.7)]">NOTES</h1>
                        <p>{!! $package->pivot->notes !!}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="">
                <strong>There's no trip package found</strong>
            </div>
        @endforelse

        {{-- StartEditModal --}}
        <div id="editModal"
            class="w-full h-full fixed top-0 left-0 z-50 transition-all duration-500 hidden overflow-y-auto">
            <div
                class="-translate-y-5 fc-modal-open:translate-y-0 fc-modal-open:opacity-100 opacity-0 duration-300 ease-in-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto flex flex-col bg-white shadow-sm rounded dark:bg-gray-800">
                <div class="flex justify-between items-center py-2.5 px-4 border-b dark:border-gray-700">
                    <h3 class="font-medium text-gray-600 dark:text-white text-lg" id="packageTripName">
                        Edit Package Details
                    </h3>
                    <button class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 dark:text-gray-200"
                        data-fc-dismiss type="button">
                        <i class="ri-close-line text-2xl"></i>
                    </button>
                </div>
                <form action="" method="POST" id="editForm">
                    @csrf
                    @method('PUT')
                    <div class="p-4 max-h-[300px] overflow-y-auto">

                        <div class="mb-3">
                            <label class="mb-2" for="price">Price</label>
                            <textarea id="editPackagePrice" class="ckeditor rounded-md text-sm" name="price"
                                placeholder="write your package price here..."></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="mb-2" for="include">Include</label>
                            <textarea id="editPackageInclude" class="ckeditor rounded-md text-sm" name="include"
                                placeholder="write your package include here..."></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="mb-2" for="exclude">Exclude</label>
                            <textarea id="editPackageExclude" class="ckeditor rounded-md text-sm" name="exclude"
                                placeholder="write your package exclude here..."></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="mb-2" for="itinerary">Itinerary</label>
                            <textarea id="editPackageItinerary" class="ckeditor rounded-md text-sm" name="itinerary"
                                placeholder="write your trip itinerary here..."></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="mb-2" for="notes">Notes (Optional)</label>
                            <textarea id="editPackageNotes" class="ckeditor rounded-md text-sm" name="notes"
                                placeholder="write your trip note here..."></textarea>
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
        <div id="deleteModal"
            class="w-full h-full fixed top-0 left-0 z-50 transition-all duration-500 hidden overflow-y-auto">
            <div
                class="-translate-y-5 fc-modal-open:translate-y-0 fc-modal-open:opacity-100 opacity-0 duration-300 ease-in-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto flex flex-col bg-white shadow-sm rounded dark:bg-gray-800">
                <div class="flex justify-between items-center py-2.5 px-4 border-b dark:border-gray-700">
                    <h3 class="font-medium text-gray-600 dark:text-white text-lg">
                        Remove Package
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
                        <p>Are you sure you want to remove this trip package?</p>
                    </div>
                    <div class="flex justify-end items-center gap-2 p-4 border-t dark:border-slate-700">
                        <button class="btn bg-light text-gray-800 transition-all" data-fc-dismiss
                            type="button">Close</button>
                        <button type="submit" class="btn bg-danger text-white">Remove</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- EndDeleteModal --}}
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/43.1.1/ckeditor5.umd.js"></script>
    <script>
        const {
            ClassicEditor,
            Essentials,
            Bold,
            Italic,
            Font,
            Paragraph,
            List,
        } = CKEDITOR;

        const editors = {};

        document.querySelectorAll('.ckeditor').forEach(editDescriptionElement => {
            ClassicEditor
                .create(editDescriptionElement, {
                    plugins: [Essentials, Bold, Italic, Font, Paragraph, List],
                    toolbar: [
                        'undo', 'redo', '|', 'bold', 'italic', '|',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
                        'numberedList', 'bulletedList'
                    ],
                    fontSize: {
                        options: [
                            9,
                            11,
                            13,
                            'default',
                            17,
                            19,
                            21,
                            25,
                            30,
                            36
                        ]
                    }

                })
                .then(editor => {
                    editor.ui.view.editable.element.style.minHeight = '200px';
                    editor.ui.view.editable.element.style.lineHeight = '1.6';
                    editor.ui.view.editable.element.style.padding = '0px 20px 0px 20px';
                    editors[editDescriptionElement.id] = editor;
                })
                .catch(error => {
                    console.error(error);
                });
        });

        $(document).on('click', '#editBtn', function() {
            var id = $(this).data('id');
            var price = $(this).data('price');
            var include = $(this).data('include');
            var exclude = $(this).data('exclude');
            var itinerary = $(this).data('itinerary');
            var notes = $(this).data('notes');
            var url = `{{ route('trip_packages.update', 'id') }}`.replace('id', id);

            $('#editForm').attr('action', url);

            if (editors['editPackagePrice']) {
                editors['editPackagePrice'].setData(price);
            }
            if (editors['editPackageInclude']) {
                editors['editPackageInclude'].setData(include);
            }
            if (editors['editPackageExclude']) {
                editors['editPackageExclude'].setData(exclude);
            }
            if (editors['editPackageItinerary']) {
                editors['editPackageItinerary'].setData(itinerary);
            }
            if (editors['editPackageNotes']) {
                editors['editPackageNotes'].setData(notes);
            }
        });

        $(document).on('click', '#deleteBtn', function() {
            var id = $(this).data('id');
            var url = `{{ route('trip_packages.destroy', 'id') }}`.replace('id', id);
            $('#deleteForm').attr('action', url);
        });
    </script>
@endsection
