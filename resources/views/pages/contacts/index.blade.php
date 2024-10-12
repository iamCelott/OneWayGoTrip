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
                    Add New Contact
                </h3>
                <button class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 dark:text-gray-200"
                    data-fc-dismiss type="button">
                    <i class="ri-close-line text-2xl"></i>
                </button>
            </div>
            <form action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="p-4 overflow-y-auto">
                    <img src="" alt="" id="logoCreatePreview" class="w-1/2 mb-3">
                    <div class="mb-3">
                        <label class="mb-2" for="logo">Logo</label> - <small>Format: jpeg,png,jpg,gif,svg | Max:
                            2mb</small>
                        <br>
                        <input type="file" name="logo" id="logoCreate" value="{{ old('logo') }}"
                            class="border w-full rounded-md">
                    </div>

                    <img src="" alt="" id="iconCreatePreview" class="w-1/2 mb-3">
                    <div class="mb-3">
                        <label class="mb-2" for="icon">Icon</label> - <small>Format: jpeg,png,jpg,gif,svg | Max:
                            2mb</small>
                        <br>
                        <input type="file" name="icon" id="iconCreate" value="{{ old('icon') }}"
                            class="border w-full rounded-md">
                    </div>

                    <div class="mb-3">
                        <label class="mb-2" for="name">Contact</label>
                        <input type="text" name="name" id="name" class="form-input rounded-md text-sm"
                            value="{{ old('name') }}" placeholder="write your contact name here...">
                    </div>

                    <div class="mb-3">
                        <label class="mb-2" for="url">Url</label>
                        <input type="text" name="url" id="url" class="form-input rounded-md text-sm"
                            value="{{ old('url') }}" placeholder="write your contact url here...">
                    </div>

                    <div class="flex items-center mb-3">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" id="show_hero" name="show_hero">
                            <div class="w-[3.1rem] h-[1.7rem] bg-gray-200 rounded-full peer peer-checked:bg-blue-600"></div>
                            <div
                                class="absolute left-1 top-1 w-5 h-5 bg-white border rounded-full transition peer-checked:translate-x-full peer-checked:border-white">
                            </div>
                        </label>

                        <label class="ml-2" for="show_hero">Show This Contact As Sticky Button?</label>
                    </div>

                    <div class="flex items-center">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" id="has_qrcode" name="has_qrcode">
                            <div class="w-[3.1rem] h-[1.7rem] bg-gray-200 rounded-full peer peer-checked:bg-blue-600"></div>
                            <div
                                class="absolute left-1 top-1 w-5 h-5 bg-white border rounded-full transition peer-checked:translate-x-full peer-checked:border-white">
                            </div>
                        </label>

                        <label class="ml-2" for="has_qrcode">Has QR Code</label>
                    </div>

                    <img src="" alt="" id="qrCodeCreatePreview" class="w-1/2 mb-3 mt-3">
                    <div class="mb-3">
                        <label class="mb-2" for="qrCodeCreate">QR Code</label> - <small>Format: jpeg,png,jpg,gif,svg |
                            Max:
                            2mb</small>
                        <br>
                        <input type="file" name="qr_code" id="qrCodeCreate" value="{{ old('qr_code') }}"
                            class="border w-full rounded-md">
                    </div>

                </div>
                <div class="flex justify-end items-center gap-2 p-4 border-t dark:border-slate-700">
                    <button class="btn bg-light text-gray-800 transition-all" data-fc-dismiss type="button">Close</button>
                    <button type="submit" class="btn bg-primary text-white">Create Contact</button>
                </div>
            </form>
        </div>
    </div>
    {{-- EndCreateModal --}}

    <script>
        const qrCodeCheckbox = document.getElementById('has_qrcode');
        const qrCodeInput = document.getElementById('qrCodeCreate');

        function toggleQRCodeInput() {
            qrCodeInput.disabled = !qrCodeCheckbox.checked;
        }
        window.addEventListener('DOMContentLoaded', toggleQRCodeInput);
        qrCodeCheckbox.addEventListener('change', toggleQRCodeInput);
    </script>


    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title text-lg sm:text-2xl text-black">CONTACTS</h4>
                <button class="btn bg-primary text-white outline-none text-xs sm:text-sm" data-fc-target="createModal"
                    data-fc-type="modal" type="button"><i class="far fa-plus mr-1"></i> <span>Add Contact</span></button>
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
                                        <th data-column-id="logo" class="gridjs-th"
                                            style="min-width: 90px; width: 158px;">
                                            <div class="gridjs-th-content">Logo</div>
                                        </th>
                                        <th data-column-id="icon" class="gridjs-th"
                                            style="min-width: 90px; width: 158px;">
                                            <div class="gridjs-th-content">Icon</div>
                                        </th>
                                        <th data-column-id="name" class="gridjs-th"
                                            style="min-width: 90px; width: 158px;">
                                            <div class="gridjs-th-content">Contact</div>
                                        </th>
                                        <th data-column-id="url" class="gridjs-th"
                                            style="min-width: 90px; width: 158px;">
                                            <div class="gridjs-th-content">Url</div>
                                        </th>
                                        <th data-column-id="qr_code" class="gridjs-th"
                                            style="min-width: 90px; width: 158px;">
                                            <div class="gridjs-th-content">QR Code</div>
                                        </th>
                                        <th data-column-id="show_hero" class="gridjs-th"
                                            style="min-width: 90px; width: 158px;">
                                            <div class="gridjs-th-content">Show To Hero</div>
                                        </th>
                                        <th data-column-id="actions" class="gridjs-th" style="width: 100px;">
                                            <div class="gridjs-th-content">Actions</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="gridjs-tbody">
                                    @forelse ($contacts as $index => $contact)
                                        <tr class="gridjs-tr text-center">
                                            <td data-column-id="id" class="gridjs-td">{{ $index + 1 }}</td>
                                            <td data-column-id="logo" class="gridjs-td">
                                                @if ($contact->logo)
                                                    <img class="w-20 h-20 mx-auto"
                                                        src="{{ asset('storage/' . $contact->logo) }}" alt="">
                                                @else
                                                    This contact does not have a logo image
                                                @endif
                                            </td>
                                            <td data-column-id="icon" class="gridjs-td">
                                                <img class="w-20 h-20 mx-auto"
                                                    src="{{ asset('storage/' . $contact->icon) }}" alt="">
                                            </td>
                                            <td data-column-id="name" class="gridjs-td">{{ $contact->name }}</td>
                                            <td data-column-id="url" class="gridjs-td">
                                                {{ $contact->url ? $contact->url : 'This contact does not have a link' }}
                                            </td>
                                            <td data-column-id="icon" class="gridjs-td">
                                                @if ($contact->qr_code)
                                                    <img class="w-20 h-20 mx-auto"
                                                        src="{{ asset('storage/' . $contact->qr_code) }}" alt="">
                                                @else
                                                    This contact does not have a QR code
                                                @endif
                                            </td>
                                            <td data-column-id="icon" class="gridjs-td">
                                                @if ($contact->show_hero == true)
                                                    Yes
                                                @else
                                                    No
                                                @endif
                                            </td>
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
                                                            data-fc-target="editModal" data-id="{{ $contact->id }}"
                                                            data-logo="{{ $contact->logo }}"
                                                            data-icon="{{ $contact->icon }}"
                                                            data-has_qrcode="{{ $contact->has_qrcode }}"
                                                            data-qrcode="{{ $contact->qr_code }}"
                                                            data-show_hero="{{ $contact->show_hero }}"
                                                            data-url="{{ $contact->url }}"
                                                            data-name="{{ $contact->name }}" data-fc-type="modal"
                                                            type="button"><i class="far fa-pencil mr-1"></i>
                                                            <span>Edit</span></button>
                                                        <button
                                                            class="deleteModalBtn w-full flex items-center py-1.5 px-5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                                            data-fc-target="deleteModal" data-id="{{ $contact->id }}"
                                                            data-name="{{ $contact->name }}" data-fc-type="modal"
                                                            type="button"><i class="far fa-trash mr-1"></i>
                                                            <span>Delete</span></button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="gridjs-tr">
                                            <td data-column-id="name" class="gridjs-td text-center" colspan="8">
                                                Contact
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
                                                <h3 id="editTittle"
                                                    class="font-medium text-gray-600 dark:text-white text-lg"></h3>
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

                                                    <img src="" alt="" id="editLogoPreview"
                                                        class="w-1/2 mb-3">
                                                    <div class="mb-3">
                                                        <label class="mb-2" for="logo">Logo</label> - <small>Format:
                                                            jpeg,png,jpg,gif,svg | Max:
                                                            2mb</small>
                                                        <br>
                                                        <input type="file" name="logo" id="editContactLogo"
                                                            class="border w-full rounded-md">
                                                    </div>

                                                    <img src="" class="w-1/2 mb-3" id="editIconPreview">
                                                    <div class="mb-3">
                                                        <label class="mb-2" for="icon">Icon</label> -
                                                        <small>Format: jpeg,png,jpg,gif,svg | Max: 2mb</small>
                                                        <br>
                                                        <input type="file" name="icon" id="editContactIcon"
                                                            class="border w-full rounded-md">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="mb-2" for="name">Contact</label>
                                                        <input type="text" name="name" id="editContactName"
                                                            class="form-input rounded-md text-sm"
                                                            placeholder="write your contact name here...">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="mb-2" for="url">Url</label>
                                                        <input type="text" name="url" id="editContactUrl"
                                                            class="form-input rounded-md text-sm"
                                                            placeholder="write your contact url here...">
                                                    </div>

                                                    <div class="flex items-center mb-3">
                                                        <label class="relative inline-flex items-center cursor-pointer">
                                                            <input type="checkbox" class="sr-only peer"
                                                                id="editContactShowHero" name="show_hero">
                                                            <div
                                                                class="w-[3.1rem] h-[1.7rem] bg-gray-200 rounded-full peer peer-checked:bg-blue-600">
                                                            </div>
                                                            <div
                                                                class="absolute left-1 top-1 w-5 h-5 bg-white border rounded-full transition peer-checked:translate-x-full peer-checked:border-white">
                                                            </div>
                                                        </label>

                                                        <label class="ml-2" for="show_hero">Show This Contact As Sticky
                                                            Button?</label>
                                                    </div>

                                                    <div class="flex items-center">
                                                        <label class="relative inline-flex items-center cursor-pointer">
                                                            <input type="checkbox" class="sr-only peer"
                                                                id="editContactHasQrCode" name="has_qrcode">
                                                            <div
                                                                class="w-[3.1rem] h-[1.7rem] bg-gray-200 rounded-full peer peer-checked:bg-blue-600">
                                                            </div>
                                                            <div
                                                                class="absolute left-1 top-1 w-5 h-5 bg-white border rounded-full transition peer-checked:translate-x-full peer-checked:border-white">
                                                            </div>
                                                        </label>

                                                        <label class="ml-2" for="has_qrcode">Has QR Code</label>
                                                    </div>

                                                    <img src="" alt="" id="editQrCodePreview"
                                                        class="w-1/2 mb-3 mt-3">
                                                    <div class="mb-3">
                                                        <label class="mb-2" for="qrCodeEdit">QR Code</label> -
                                                        <small>Format: jpeg,png,jpg,gif,svg |
                                                            Max:
                                                            2mb</small>
                                                        <br>
                                                        <input type="file" name="qr_code" id="editContactQrCode"
                                                            value="{{ old('qr_code') }}"
                                                            class="border w-full rounded-md">
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
                                            <form action="" id="deleteForm" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="p-6">
                                                    <p>Are you sure you want to remove this contact?</p>
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

        const createLogo = document.getElementById('logoCreate');
        createLogo.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const logoCreatePreview = document.getElementById('logoCreatePreview');
                    logoCreatePreview.src = event.target.result;
                }
                reader.readAsDataURL(file);
            } else {
                logoCreatePreview.src = '';
            }

        });
        const qrCodeCreate = document.getElementById('qrCodeCreate');
        qrCodeCreate.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const qrCodeCreatePreview = document.getElementById('qrCodeCreatePreview');
                    qrCodeCreatePreview.src = event.target.result;
                }
                reader.readAsDataURL(file);
            } else {
                qrCodeCreatePreview.src = '';
            }
        });

        const editLogo = document.getElementById('editContactLogo');
        editLogo.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const editLogoPreview = document.getElementById('editLogoPreview');
                    editLogoPreview.src = event.target.result;
                }
                reader.readAsDataURL(file);
            } else {
                const editLogoPreview = document.getElementById('editLogoPreview');
                editLogoPreview.src = '';
            }
        });
        const editIcon = document.getElementById('editContactIcon');
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
        const editQrCode = document.getElementById('editContactQrCode');
        editQrCode.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const editQrCodePreview = document.getElementById('editQrCodePreview');
                    editQrCodePreview.src = event.target.result;
                }
                reader.readAsDataURL(file);
            } else {
                const editQrCodePreview = document.getElementById('editQrCodePreview');
                editQrCodePreview.src = '';
            }
        });

        $(document).on('click', '.editModalBtn', function() {
            const id = $(this).data('id');
            const logo = $(this).data('logo');
            const icon = $(this).data('icon');
            const name = $(this).data('name');
            const link = $(this).data('url');
            const has_qrcode = $(this).data('has_qrcode');
            const qr_code = $(this).data('qrcode');
            const show_hero = $(this).data('show_hero');
            const url = `{{ route('contacts.update', 'id') }}`.replace('id', id);

            $('#editForm').attr("action", url);
            $('#editTittle').html("Edit Contact " + name);

            $('#editLogoPreview').attr('src', '/storage/' + logo);
            $('#editIconPreview').attr('src', '/storage/' + icon);
            $('#editContactName').val(name);
            $('#editContactUrl').val(link);
            $('#editQrCodePreview').attr('src', '/storage/' + qr_code);

            if (show_hero) {
                $('#editContactShowHero').prop('checked', true);
            } else {
                $('#editContactShowHero').prop('checked', false);
            }

            if (qr_code) {
                $('#editContactHasQrCode').prop('checked', true);
            } else {
                $('#editContactHasQrCode').prop('checked', false);
            }
        })

        $(document).on('click', '.deleteModalBtn', function() {
            const id = $(this).data('id');
            const name = $(this).data('name');
            const url = `{{ route('contacts.destroy', 'id') }}`.replace('id', id);

            $('#deleteForm').attr("action", url);
            $('#deleteTittle').html("Delete Contact " + name);
        })
    </script>
@endsection
