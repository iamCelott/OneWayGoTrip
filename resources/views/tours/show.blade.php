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

        .ellipsis {
            display: -webkit-box;
            -webkit-line-clamp: 5;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>

<body>
    <div class="flex sticky top-0 z-50 p-6 text-white justify-between duration-300 items-center" id="navbar">
        <a href="/" class="text-white font-bold text-2xl xl:text-3xl font-sofandi">
            <img src="{{ asset('storage/images/logo/white.png') }}" class="h-8" id="navLogo" alt="">
        </a>

        <ul class="hidden sm:flex gap-10 items-center font-semibold">
            <li><a href="{{ route('landing.tour') }}"
                    class="text-sm lg:text-lg duration-300 hover:text-[rgba(255,255,255,0.8)]">Tours</a></li>
            <li><a href="#" class="text-sm lg:text-lg duration-300 hover:text-[rgba(255,255,255,0.8)]">About
                    Us</a></li>
            <li><a href="#"
                    class="text-sm lg:text-lg duration-300 hover:text-[rgba(255,255,255,0.8)]">Gallery</a></li>
            <li><a href="#"
                    class="text-sm lg:text-lg duration-300 hover:text-[rgba(255,255,255,0.8)]">Contact</a></li>
        </ul>

        <div class="relative sm:hidden">
            <div class="">
                <div class="hamburgerLists w-6 h-[3px] bg-white mb-1.5 rounded-lg"></div>
                <div class="hamburgerLists w-6 h-[3px] bg-white mb-1.5 rounded-lg"></div>
                <div class="hamburgerLists w-6 h-[3px] bg-white mb-1.5 rounded-lg"></div>
            </div>
            <input type="checkbox" name="" id="hamburgerTrigger"
                class="absolute top-0 left-0 w-6 h-5 cursor-pointer opacity-0">
        </div>

        <div id="hamburgerMenu" class="w-full sm:hidden absolute duration-300 left-0 -top-64 bg-[#f5f5f5]">
            <div class="relative">
                <img src="{{ asset('storage/images/logo/blue.png') }}" alt=""
                    class="w-1/2 py-3 border-b-2 mx-auto">
                <i class="fas fa-times text-black text-2xl absolute top-5 right-5"
                    id="hamburgerMenuCloseTrigger"></i>
            </div>
            <div class="flex flex-col text-lg p-3 text-[rgba(0,0,0,0.8)]">
                <a href="" class="py-1">Tours</a>
                <a href="" class="py-1">About Us</a>
                <a href="" class="py-1">Gallery</a>
                <a href="" class="py-1">Contact</a>
            </div>
        </div>

        <script>
            var hamburgerTrigger = document.getElementById('hamburgerTrigger');
            var menu = document.getElementById('hamburgerMenu');

            function toggleMenu() {
                if (hamburgerTrigger.checked) {
                    menu.classList.remove('-top-64');
                    menu.classList.add('top-0');
                } else {
                    menu.classList.remove('top-0');
                    menu.classList.add('-top-64');
                }
            }

            hamburgerTrigger.addEventListener('change', toggleMenu);
            document.getElementById('hamburgerMenuCloseTrigger').addEventListener('click', function() {
                hamburgerTrigger.checked = false;
                toggleMenu();
            });
        </script>
    </div>

    <div class="min-h-[100vh]">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque delectus ad illum cum exercitationem. Iste alias officia provident cum nemo reprehenderit ab rerum aut nulla. Rerum aspernatur quis cupiditate possimus!
    </div>

    <div class="w-full bg-[#efefef] py-3">
        <div class="p-6 flex flex-col lg:flex-row gap-3 lg:gap-10 mb-3">
            <div class="sm:w-2/3 lg:h-32 lg:w-1/3">
                <img src="{{ asset('storage/images/logo/blue.png') }}" alt="">
            </div>
            <div class="grid grid-cols-2 grid-rows-2 lg:grid-cols-4 lg:grid-rows-1 lg:gap-20">
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
                        @forelse ($social_media as $media)
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('storage/' . $media->icon) }}" alt="{{ $media->name }}"
                                    class="w-4 h-4 object-cover">
                                <h2><a href="{{ $media->url }}" target="__blank">{{ $media->name }}</a></h2>
                            </div>
                        @empty
                            <h1>Coming Soon</h1>
                        @endforelse
                    </div>
                </div>
                <div class="">
                    <h1 class="font-bold">CONTACT</h1>
                    <div class="text-sm md:text-lg lg:text-sm">
                        @forelse ($contacts as $contact)
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('storage/' . $contact->icon) }}" alt="{{ $contact->name }}"
                                    class="w-4 h-4 object-cover">
                                <h2>{{ $contact->name }}</a></h2>
                            </div>
                        @empty
                            <h1>Coming Soon</h1>
                        @endforelse
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
