<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'OneWayGoTrip') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- plugin css -->
    <link href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css">

    <!-- App css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Icons css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Theme Config Js -->
    <script src="{{ asset('assets/js/config.js') }}"></script>

    {{-- FontAwesome --}}
    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro@4cac1a6/css/all.css" rel="stylesheet"
        type="text/css" />

    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- CkEditor5 --}}
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.1.1/ckeditor5.css" />

    {{-- Dropzone --}}
    <link rel="stylesheet" href="../../assets/vendor/libs/dropzone/dropzone.css" />
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

    {{-- Jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .swal-custom-btn {
            background-color: rgb(75, 75, 255)
        }

        .ck-editor__editable {
            min-height: 200px;
            line-height: 1.6;
        }

        .ck-editor__editable_inline {
            padding: 0px 20px 0px 20px !important;
        }
    </style>
</head>

<body>

    <div class="flex wrapper">
        @include('layouts.sidebar')

        <div class="page-content">
            @include('layouts.topbar')

            <main class="p-6 font-poppins">
                @if (session('success'))
                    <script>
                        Swal.fire({
                            title: 'Success!',
                            text: "{{ session('success') }}",
                            icon: 'success',
                            confirmButtonText: 'OK',
                            customClass: {
                                confirmButton: 'swal-custom-btn'
                            }
                        });
                    </script>
                @endif

                @if (session('error'))
                    <script>
                        Swal.fire({
                            title: 'Error!',
                            text: "{{ session('error') }}",
                            icon: 'error',
                            confirmButtonText: 'OK',
                            customClass: {
                                confirmButton: 'swal-custom-btn'
                            }
                        });
                    </script>
                @endif

                @if ($errors->any())
                    <script>
                        let errorMsg = "";

                        @foreach ($errors->all() as $error)
                            errorMsg += "{{ $error }}<br>";
                        @endforeach

                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            html: errorMsg,
                            customClass: {
                                confirmButton: 'swal-custom-btn'
                            }
                        });
                    </script>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <!-- Plugin Js -->
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/lucide/umd/lucide.min.js') }}"></script>
    <script src="{{ asset('assets/libs/%40frostui/tailwindcss/frostui.js') }}"></script>

    <!-- App Js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- Apex Charts js -->
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Vector Map Js -->
    <script src="{{ asset('assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jsvectormap/maps/world-merc.js') }}"></script>
    <script src="{{ asset('assets/libs/jsvectormap/maps/world.js') }}"></script>

    <!-- Dashboard App js -->
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>

    {{-- Dropzone --}}
    <script src="../../assets/vendor/libs/dropzone/dropzone.js"></script>
</body>

</html>
