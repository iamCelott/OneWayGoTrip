@extends('layouts.app')

@section('content')
    <style>
        .ellipsis {
            display: -webkit-box;
            -webkit-line-clamp: 7;
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
                    Add New Social Media
                </h3>
                <button class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 dark:text-gray-200"
                    data-fc-dismiss type="button">
                    <i class="ri-close-line text-2xl"></i>
                </button>
            </div>
            <form action="{{ route('social_media.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="p-4 overflow-y-auto">
                    <img src="" alt="" id="iconCreatePreview" class="w-1/2 mb-3">
                    <div class="mb-3">
                        <label class="mb-2" for="icon">Icon</label> - <small>Format: jpeg,png,jpg,gif,svg | Max:
                            2mb</small>
                        <br>
                        <input type="file" name="icon" id="iconCreate" value="{{ old('icon') }}"
                            class="border w-full rounded-md">
                    </div>
                    <div class="mb-3">
                        <label class="mb-2" for="url">Url</label>
                        <input type="text" name="url" id="url" class="form-input rounded-md text-sm"
                            value="{{ old('url') }}" placeholder="write your social media url here...">
                    </div>
                </div>
                <div class="flex justify-end items-center gap-2 p-4 border-t dark:border-slate-700">
                    <button class="btn bg-light text-gray-800 transition-all" data-fc-dismiss type="button">Close</button>
                    <button type="submit" class="btn bg-primary text-white">Create Social Media</button>
                </div>
            </form>
        </div>
    </div>
    {{-- EndCreateModal --}}

    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title text-lg sm:text-2xl text-black">SOCIAL MEDIA</h4>
                <button class="btn bg-primary text-white outline-none text-xs sm:text-sm" data-fc-target="createModal"
                    data-fc-type="modal" type="button"><i class="far fa-plus mr-1"></i> <span>Add Social
                        Media</span></button>
            </div>
        </div>
        <div class="p-6">
            <div class="overflow-x-auto">

                <div id="table-pagination">
                    <div role="complementary" class="gridjs gridjs-container" style="width: 100%;">
                        <div class="gridjs-wrapper mb-3" style="height: auto;">
                            <table role="grid" class="gridjs-table" style="height: auto;">
                                <thead class="gridjs-thead">
                                    <tr class="gridjs-tr">
                                        <th data-column-id="id" class="gridjs-th" style="width: 120px;">
                                            <div class="gridjs-th-content">No</div>
                                        </th>
                                        <th data-column-id="icon" class="gridjs-th" style="min-width: 90px; width: 158px;">
                                            <div class="gridjs-th-content">Icon</div>
                                        </th>
                                        <th data-column-id="url" class="gridjs-th" style="min-width: 90px; width: 158px;">
                                            <div class="gridjs-th-content">Url</div>
                                        </th>
                                        <th data-column-id="actions" class="gridjs-th" style="width: 100px;">
                                            <div class="gridjs-th-content">Actions</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="gridjs-tbody">
                                    @forelse ($social_media as $index => $media)
                                        <tr class="gridjs-tr text-center">
                                            <td data-column-id="id" class="gridjs-td">{{ $index + 1 }}</td>
                                            <td data-column-id="icon" class="gridjs-td flex justify-center">
                                                <img class="w-20 h-20 object-cover" src="{{ asset('storage/' . $media->icon) }}"
                                                    alt="">
                                            </td>
                                            <td data-column-id="url" class="gridjs-td"><a
                                                    href="{{ $media->url }}">{{ $media->url }}</a></td>
                                            <td data-column-id="actions" class="gridjs-td">
                                                <div>
                                                    <a href="javascript: void(0);" data-fc-type="dropdown"
                                                        data-fc-placement="bottom-end">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div
                                                        class="fc-dropdown fc-dropdown-open:opacity-100 opacity-0 min-w-40 z-50 transition-all duration-300 bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-600 rounded-md py-1 hidden">
                                                        <button
                                                            class="editModalBtn w-full flex items-center py-1.5 px-5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                                            data-fc-target="editModal" data-id="{{ $media->id }}"
                                                            data-icon="{{ $media->icon }}"
                                                            data-url="{{ $media->url }}" data-fc-type="modal"
                                                            type="button"><i class="far fa-pencil mr-1"></i>
                                                            <span>Edit</span></button>
                                                        <button
                                                            class="deleteModalBtn w-full flex items-center py-1.5 px-5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                                            data-fc-target="deleteModal" data-id="{{ $media->id }}" data-fc-type="modal"
                                                            type="button"><i class="far fa-trash mr-1"></i>
                                                            <span>Delete</span></button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="gridjs-tr">
                                            <td data-column-id="name" class="gridjs-td text-center" colspan="5">
                                                Social Media
                                                is empty.</td>
                                        </tr>
                                    @endforelse

                                    {{-- StartEditModal --}}
                                    <div id="editModal"
                                        class="w-full h-full fixed top-0 left-0 z-50 transition-all duration-500 hidden overflow-y-auto">
                                        <div
                                            class="-translate-y-5 fc-modal-open:translate-y-0 fc-modal-open:opacity-100 opacity-0 duration-300 ease-in-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto flex flex-col bg-white shadow-sm rounded dark:bg-gray-800">
                                            <div
                                                class="flex justify-between items-center py-2.5 px-4 border-b dark:border-gray-700">
                                                <h3 class="font-medium text-gray-600 dark:text-white text-lg">Edit Social Media</h3>
                                                <button
                                                    class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 dark:text-gray-200"
                                                    data-fc-dismiss type="button">
                                                    <i class="ri-close-line text-2xl"></i>
                                                </button>
                                            </div>
                                            <form action="" id="editForm" enctype="multipart/form-data"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="p-4 overflow-y-auto icon-container">
                                                    <img src="" id="editIconPreview" class="w-1/2 mb-3">
                                                    <div class="mb-3">
                                                        <label class="mb-2" for="icon">Icon</label> -
                                                        <small>Format: jpeg,png,jpg,gif,svg | Max: 2mb</small>
                                                        <br>
                                                        <input type="file" name="icon"
                                                            id="editMediaIcon" class="border w-full rounded-md">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="mb-2" for="url">Url</label>
                                                        <input type="text" name="url"
                                                            class="form-input rounded-md text-sm"
                                                            id="editMediaUrl"
                                                            placeholder="write your social media url here...">
                                                    </div>
                                                </div>
                                                <div
                                                    class="flex justify-end items-center gap-2 p-4 border-t dark:border-slate-700">
                                                    <button class="btn bg-light text-gray-800 transition-all"
                                                        data-fc-dismiss type="button">Close</button>
                                                    <button type="submit" class="btn bg-primary text-white">Save
                                                        Change</button>
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
                                            <div
                                                class="flex justify-between items-center py-2.5 px-4 border-b dark:border-gray-700">
                                                <h3
                                                    class="font-medium text-gray-600 dark:text-white text-lg">Delete Social Media</h3>
                                                <button
                                                    class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 dark:text-gray-200"
                                                    data-fc-dismiss type="button">
                                                    <i class="ri-close-line text-2xl"></i>
                                                </button>
                                            </div>
                                            <form action="" id="deleteForm" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="p-6">
                                                    <p>Are you sure you want to remove this social media?</p>
                                                </div>
                                                <div
                                                    class="flex justify-end items-center gap-2 p-4 border-t dark:border-slate-700">
                                                    <button class="btn bg-light text-gray-800 transition-all"
                                                        data-fc-dismiss type="button">Close</button>
                                                    <button type="submit"
                                                        class="btn bg-danger text-white">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    {{-- EndDeleteModal --}}
                                </tbody>
                            </table>
                        </div>
                        <div id="gridjs-temp" class="gridjs-temp"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const createIcon = document.getElementById('iconCreate');

        createIcon.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const iconCreatePreview = document.getElementById('iconCreatePreview');
                    iconCreatePreview.src = event.target.result;
                }
                reader.readAsDataURL(file);
            } else {
                iconCreatePreview.src = '';
            }
        });

        const editIcon = document.getElementById('editMediaIcon');
        editIcon.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const editIconPreview = document.getElementById('editIconPreview');
                    editIconPreview.src = event.target.result;
                }
                reader.readAsDataURL(file);
            } else {
                const editIconPreview = document.getElementById('editIconPreview');
                editIconPreview.src = '';
            }
        });

        $(document).on('click', '.editModalBtn', function() {
            const id = $(this).data('id');
            const icon = $(this).data('icon');
            const platformUrl = $(this).data('url');
            const url = `{{ route('social_media.update', 'id') }}`.replace('id', id);

            $('#editForm').attr("action", url);
            $('#editIconPreview').attr('src', '/storage/' + icon);
            $('#editMediaUrl').val(platformUrl);
        })

        $(document).on('click', '.deleteModalBtn', function() {
            const id = $(this).data('id');
            const url = `{{ route('social_media.destroy', 'id') }}`.replace('id', id)
            $('#deleteForm').attr("action", url);
        })
    </script>
@endsection
