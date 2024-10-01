@extends('layouts.app')

@section('content')
    {{-- StartEditModal --}}
    <div id="editModal" class="w-full h-full fixed top-0 left-0 z-50 transition-all duration-500 hidden overflow-y-auto">
        <div
            class="-translate-y-5 fc-modal-open:translate-y-0 fc-modal-open:opacity-100 opacity-0 duration-300 ease-in-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto flex flex-col bg-white shadow-sm rounded dark:bg-gray-800">
            <div class="flex justify-between items-center py-2.5 px-4 border-b dark:border-gray-700">
                <h3 class="font-medium text-gray-600 dark:text-white text-lg">
                    Edit Company Profile
                </h3>
                <button class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 dark:text-gray-200"
                    data-fc-dismiss type="button">
                    <i class="ri-close-line text-2xl"></i>
                </button>
            </div>
            <form action="{{ route('company_profile.update', $company_profile->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="p-4 overflow-y-auto max-h-[400px]">
                    <img src="" alt="" id="logoWhitePreview" class="w-1/2 mb-3">
                    <div class="mb-3">
                        <label class="mb-2" for="white_logo">White Logo</label>
                        <br>
                        <input type="file" name="white_logo" id="whiteLogoInput" value="{{ old('white_logo') }}"
                            class="border w-full rounded-md">
                    </div>

                    <img src="" alt="" id="logoColoredPreview" class="w-1/2 mb-3">
                    <div class="mb-3">
                        <label class="mb-2" for="colored_logo">Colored Logo</label>
                        <br>
                        <input type="file" name="colored_logo" id="coloredLogoInput" value="{{ old('colored_logo') }}"
                            class="border w-full rounded-md">
                    </div>

                    <img src="" alt="" id="logoRawPreview" class="w-1/2 mb-3">
                    <div class="mb-3">
                        <label class="mb-2" for="raw_logo">Raw Logo</label>
                        <br>
                        <input type="file" name="raw_logo" id="rawLogoInput" value="{{ old('raw_logo') }}"
                            class="border w-full rounded-md">
                    </div>

                    <div class="mb-3">
                        <label class="mb-2" for="name">Company Name</label>
                        <input type="text" name="name" id="name" class="form-input rounded-md text-sm"
                            value="{{ $company_profile->name }}" placeholder="write your trip name here...">
                    </div>

                    <div class="mb-3">
                        <label class="mb-2" for="about_us">About Us</label>
                        <textarea class="ckeditor rounded-md text-sm" name="about_us" placeholder="write your company about us here...">{{ $company_profile->about_us }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="mb-2" for="address">Address</label>
                        <br>
                        <textarea class="form-input rounded-md text-sm" name="address" placeholder="write your company address here..."
                            rows="5">{{ $company_profile->address }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="mb-2" for="have_used_over">Have Used Our Service Over</label>
                        <br>
                        <input class="form-input rounded-md text-sm" id="have_used_over" type="number"
                            name="have_used_over" value="{{ $company_profile->have_used_over }}">
                    </div>
                </div>

                <div class="flex justify-end items-center gap-2 p-4 border-t dark:border-slate-700">
                    <button class="btn bg-light text-gray-800 transition-all" data-fc-dismiss type="button">Close</button>
                    <button type="submit" class="btn bg-primary text-white">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
    {{-- EndEditModal --}}

    <div class="card text-center p-6 mb-6 relative">
        <img src="{{ $company_profile->raw_logo ? asset('storage/' . $company_profile->raw_logo) : asset('storage/images/not_found/image_not_available.png') }}"
            alt=""
            class="w-32 h-32 object-cover rounded-full p-1 border border-gray-200 bg-gray-100 dark:bg-gray-700 dark:border-gray-600 mx-auto">
        <h4 class="mb-1 mt-3 text-lg">{{ $company_profile->name }}</h4>

        <button
            class="cursor-pointer absolute flex justify-center items-center top-5 right-5 py-1.5 px-5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
            data-fc-target="editModal" data-fc-type="modal" type="button"><i class="far fa-pencil mr-1"></i>
            <span>Edit</span></button>

        <div class="text-start mt-6">
            <div class="mb-3">
                <h4 class="text-sm uppercase">About Us :</h4>
                <p class="text-gray-400">
                    {!! $company_profile->about_us !!}
                </p>
            </div>

            <div class="mb-3">
                <p class="text-zinc-400 "><strong>Address :</strong>
                <p>{{ $company_profile->address }}</p>
                </p>
            </div>

            <div class="">
                <p class="text-zinc-400 "><strong>Have Used Our Service Over :</strong>
                    {{ $company_profile->have_used_over }}+
                </p>
            </div>
        </div>

        <div class="grid grid-cols-2 pt-10 gap-3">
            <div class="p-3">
                <h1>Colored Logo</h1>
                <img src="{{ $company_profile->colored_logo ? asset('storage/' . $company_profile->colored_logo) : asset('storage/images/not_found/image_not_available.png') }}"
                    alt="">
            </div>
            <div class="bg-[#1e1e1e] p-3">
                <h1 class="text-white">White Logo</h1>
                <img src="{{ $company_profile->white_logo ? asset('storage/' . $company_profile->white_logo) : asset('storage/images/not_found/image_not_available.png') }}"
                    alt="">
            </div>
        </div>
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
                    ]
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

        const whiteLogo = document.getElementById('whiteLogoInput');

        whiteLogo.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const logoWhitePreview = document.getElementById('logoWhitePreview');
                    logoWhitePreview.src = event.target.result;
                }
                reader.readAsDataURL(file);
            } else {
                const logoWhitePreview = document.getElementById('logoWhitePreview');
                logoWhitePreview.src = '';
            }
        });

        const coloredLogo = document.getElementById('coloredLogoInput');

        coloredLogo.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const logoColoredPreview = document.getElementById('logoColoredPreview');
                    logoColoredPreview.src = event.target.result;
                }
                reader.readAsDataURL(file);
            } else {
                const logoColoredPreview = document.getElementById('logoColoredPreview');
                logoColoredPreview.src = '';
            }
        });

        const rawLogo = document.getElementById('rawLogoInput');

        rawLogo.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const logoRawPreview = document.getElementById('logoRawPreview');
                    logoRawPreview.src = event.target.result;
                }
                reader.readAsDataURL(file);
            } else {
                const logoRawPreview = document.getElementById('logoRawPreview');
                logoRawPreview.src = '';
            }
        });
    </script>
@endsection
