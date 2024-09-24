<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneWayGoTrip</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/css/app.css')

    <!-- CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    {{-- Aos --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    {{-- FontAwesome --}}
    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro@4cac1a6/css/all.css" rel="stylesheet"
        type="text/css" />

    <style>
        .stroked-text {
            font-weight: bold;
            color: transparent;
            -webkit-text-stroke: 2px #FFFF;
            text-align: center;
        }

        .description-trip {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;

        }
    </style>
</head>

<body>
    <div class="flex sticky top-0 z-50 p-6 justify-between duration-300 bg-[#f5f5f5]" id="navbar">
        <a href="/" class="font-bold text-2xl xl:text-3xl font-sofandi">
            <img src="{{ asset('storage/images/logo/blue.png') }}" class="h-8" id="navLogo" alt="">
        </a>

        <ul class="hidden sm:flex gap-10 items-center font-semibold">
            <li><a href="{{ route('landing.tour') }}"
                    class="text-sm lg:text-lg duration-300 text-[rgba(0,0,0,0.5)] hover:text-black">Tours</a></li>
            <li><a href="#" class="text-sm lg:text-lg duration-300 text-[rgba(0,0,0,0.5)] hover:text-black">About
                    Us</a></li>
            <li><a href="#"
                    class="text-sm lg:text-lg duration-300 text-[rgba(0,0,0,0.5)] hover:text-black">Gallery</a>
            </li>
            <li><a href="#"
                    class="text-sm lg:text-lg duration-300 text-[rgba(0,0,0,0.5)] hover:text-black">Contact</a>
            </li>
        </ul>
    </div>

    <div class="p-3 lg:p-10 font-poppins">
        <div class="flex justify-between items-center py-3 border-b-2">
            <h1 class="text-2xl font-semibold">EXPLORE OUR TOURS</h1>
            <div class="relative w-1/2">
                <input type="text" name="search" class="w-full outline-none rounded-md px-10 text-sm" placeholder="search for trip here...">
                <i class="far fa-search absolute top-3.5 left-3.5"></i>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 py-3">
            <div class="w-full h-32 bg-red-300"></div>
            <div class="w-full h-32 bg-red-300"></div>
            <div class="w-full h-32 bg-red-300"></div>
            <div class="w-full h-32 bg-red-300"></div>
            <div class="w-full h-32 bg-red-300"></div>
            <div class="w-full h-32 bg-red-300"></div>
            <div class="w-full h-32 bg-red-300"></div>
            <div class="w-full h-32 bg-red-300"></div>
            <div class="w-full h-32 bg-red-300"></div>
            <div class="w-full h-32 bg-red-300"></div>
            <div class="w-full h-32 bg-red-300"></div>
        </div>
    </div>

    <div class="w-full bg-[#efefef] py-3">
        <div class="p-6 flex flex-col lg:flex-row gap-3 lg:gap-10 mb-3">
            <div class="sm:w-2/3 lg:h-32 lg:w-1/3">
                <img src="{{ asset('storage/images/logo/blue.png') }}" alt="">
            </div>
            <div class="grid grid-cols-2 grid-rows-2 lg:grid-cols-4 lg:grid-rows-1 gap-3">
                <div class="">
                    <h1 class="font-bold">NEWEST TOUR</h1>
                    <div class="text-sm md:text-lg lg:text-sm">
                        <h2>Siaba Island</h2>
                        <h2>Comodo Island</h2>
                        <h2>Padar Island</h2>
                        <h2>Pink Beach</h2>
                        <h2>Taka Makasar Island</h2>
                        <h2>Manta Point</h2>
                    </div>
                </div>
                <div class="">
                    <h1 class="font-bold">INFORMATION</h1>
                    <div class="text-sm md:text-lg lg:text-sm">
                        <h2>Tours</h2>
                        <h2>About Us</h2>
                        <h2>Gallery</h2>
                        <h2>Contact</h2>
                    </div>
                </div>
                <div class="">
                    <h1 class="font-bold">FOLLOW US</h1>
                    <div class="text-sm md:text-lg lg:text-sm">
                        <h2>Instagram</h2>
                        <h2>Facebook</h2>
                        <h2>Twitter</h2>
                        <h2>TikTok</h2>
                    </div>
                </div>
                <div class="">
                    <h1 class="font-bold">CONTACT</h1>
                    <div class="text-sm md:text-lg lg:text-sm">
                        <h2><i class="far fa-phone-alt"></i> +62 8123 0932 23</h2>
                        <h2><i class="far fa-phone-alt"></i> +62 8123 0932 123</h2>
                        <h2><i class="fab fa-whatsapp"></i> +62 8123 0932 123</h2>
                        <h2><i class="fal fa-envelope"></i> Dcviriya313@gmail.com</h2>
                        <h2><i class="far fa-user-headset"></i> Dcviriya313@gmail.com</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center pt-3 border-t-2" id="copyrightYear"></div>
    </div>

    <script>
        function setCopyrightYear(elementId) {
            const currentYear = new Date().getFullYear();
            document.getElementById(elementId).textContent = 'Copyright © ' + currentYear + ' - OneWayGoTrip';
        }

        window.onload = function() {
            setCopyrightYear('copyrightYear');
        };
    </script>
</body>

</html>
