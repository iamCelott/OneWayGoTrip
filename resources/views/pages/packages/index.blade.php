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
                    Add New Package
                </h3>
                <button class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 dark:text-gray-200"
                    data-fc-dismiss type="button">
                    <i class="ri-close-line text-2xl"></i>
                </button>
            </div>
            <form action="{{ route('packages.store') }}" method="POST">
                @csrf
                <div class="p-4 overflow-y-auto">
                    <div class="mb-3">
                        <label class="mb-2" for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-input rounded-md text-sm"
                            value="{{ old('name') }}" placeholder="write your package name here...">
                    </div>
                </div>
                <div class="flex justify-end items-center gap-2 p-4 border-t dark:border-slate-700">
                    <button class="btn bg-light text-gray-800 transition-all" data-fc-dismiss type="button">Close</button>
                    <button type="submit" class="btn bg-primary text-white">Create Package</button>
                </div>
            </form>
        </div>
    </div>
    {{-- EndCreateModal --}}

    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title text-lg sm:text-2xl text-black">PACKAGES</h4>
                <button class="btn bg-primary text-white outline-none text-xs sm:text-sm" data-fc-target="createModal"
                    data-fc-type="modal" type="button"><i class="far fa-plus mr-1"></i> <span>Add Package</span></button>
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
                                        <th data-column-id="name" class="gridjs-th" style="min-width: 90px; width: 158px;">
                                            <div class="gridjs-th-content">Name</div>
                                        </th>
                                        <th data-column-id="actions" class="gridjs-th" style="width: 100px;">
                                            <div class="gridjs-th-content">Actions</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="gridjs-tbody">
                                    @forelse ($packages as $index => $package)
                                        <tr class="gridjs-tr text-center">
                                            <td data-column-id="id" class="gridjs-td">{{ $index + 1 }}</td>
                                            <td data-column-id="name" class="gridjs-td">{{ $package->name }}</td>
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
                                                            data-fc-target="editModal" data-id="{{ $package->id }}"
                                                            data-name="{{ $package->name }}" data-fc-type="modal"
                                                            type="button"><i class="far fa-pencil mr-1"></i>
                                                            <span>Edit</span></button>
                                                        <button
                                                            class="deleteModalBtn w-full flex items-center py-1.5 px-5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                                            data-fc-target="deleteModal" data-id="{{ $package->id }}"
                                                            data-name="{{ $package->name }}" data-fc-type="modal"
                                                            type="button"><i class="far fa-trash mr-1"></i>
                                                            <span>Delete</span></button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="gridjs-tr">
                                            <td data-column-id="name" class="gridjs-td text-center" colspan="4">
                                                Package
                                                is
                                                empty.</td>
                                        </tr>
                                    @endforelse

                                    {{-- StartEditModal --}}
                                    <div id="editModal"
                                        class="w-full h-full fixed top-0 left-0 z-50 transition-all duration-500 hidden overflow-y-auto">
                                        <div
                                            class="-translate-y-5 fc-modal-open:translate-y-0 fc-modal-open:opacity-100 opacity-0 duration-300 ease-in-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto flex flex-col bg-white shadow-sm rounded dark:bg-gray-800">
                                            <div
                                                class="flex justify-between items-center py-2.5 px-4 border-b dark:border-gray-700">
                                                <h3 id="editTittle"
                                                    class="font-medium text-gray-600 dark:text-white text-lg"></h3>
                                                <button
                                                    class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 dark:text-gray-200"
                                                    data-fc-dismiss type="button">
                                                    <i class="ri-close-line text-2xl"></i>
                                                </button>
                                            </div>
                                            <form action="" method="POST" id="editForm">
                                                @csrf
                                                @method('PUT')
                                                <div class="p-4 overflow-y-auto">
                                                    <div class="mb-3">
                                                        <label class="mb-2" for="name">Name</label>
                                                        <input type="text" name="name" id="editPackageName"
                                                            class="form-input rounded-md text-sm"
                                                            value=""
                                                            placeholder="write your package name here...">
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
                                                <h3 id="deleteTittle"
                                                    class="font-medium text-gray-600 dark:text-white text-lg"></h3>
                                                <button
                                                    class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 dark:text-gray-200"
                                                    data-fc-dismiss type="button">
                                                    <i class="ri-close-line text-2xl"></i>
                                                </button>
                                            </div>
                                            <form action="" method="POST" id="deleteForm">
                                                @csrf
                                                @method('DELETE')
                                                <div class="p-6">
                                                    <p>Are you sure you want to remove this package?</p>
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
        $(document).on('click', '.editModalBtn', function() {
            const id = $(this).data('id');
            const name = $(this).data('name');
            const url = `{{ route('packages.update', 'id') }}`.replace('id', id);

            $('#editForm').attr("action", url);
            $('#editTittle').html("Edit Package " + name);
            $('#editPackageName').val(name);
        })

        $(document).on('click', '.deleteModalBtn', function() {
            const id = $(this).data('id');
            const name = $(this).data('name');
            const url = `{{ route('packages.destroy', 'id') }}`.replace('id', id);

            $('#deleteForm').attr("action", url);
            $('#deleteTittle').html("Delete Package " + name);
        })
    </script>
@endsection
