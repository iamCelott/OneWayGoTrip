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
    <div class="flex sticky top-0 z-50 p-6 text-white justify-between duration-300 items-center bg-[#f5f5f5]"
        id="navbar">
        <a href="/" class="text-white font-bold text-2xl xl:text-3xl font-sofandi">
            <img src="{{ $company_profile->colored_logo ? asset('storage/' . $company_profile->colored_logo) : asset('storage/images/not_found/image_not_available.png') }}"
                class="h-8" id="navLogo" alt="">
        </a>

        <ul class="hidden sm:flex gap-10 items-center font-semibold">
            <li><a href="{{ route('landing.tour') }}"
                    class="text-sm lg:text-lg duration-300 text-[rgba(0,0,0,0.8)]">Tours</a>
            </li>
            <li><a href="#" class="text-sm lg:text-lg duration-300 text-[rgba(0,0,0,0.8)]">Gallery</a>
            </li>
            <li><a href="/#about_us" class="text-sm lg:text-lg duration-300 text-[rgba(0,0,0,0.8)]">About
                    Us</a></li>
            <li><a href="#footer" class="text-sm lg:text-lg duration-300 text-[rgba(0,0,0,0.8)]">Get In
                    Touch</a></li>
        </ul>

        <div class="relative sm:hidden">
            <div class="">
                <div class="hamburgerLists w-6 h-[3px] bg-[rgba(0,0,0,0.8)] mb-1.5 rounded-lg"></div>
                <div class="hamburgerLists w-6 h-[3px] bg-[rgba(0,0,0,0.8)] mb-1.5 rounded-lg"></div>
                <div class="hamburgerLists w-6 h-[3px] bg-[rgba(0,0,0,0.8)] mb-1.5 rounded-lg"></div>
            </div>
            <input type="checkbox" name="" id="hamburgerTrigger"
                class="absolute top-0 left-0 w-6 h-5 cursor-pointer opacity-0">
        </div>

        <div id="hamburgerMenu" class="w-full sm:hidden absolute duration-300 left-0 -top-64 bg-[#f5f5f5]">
            <div class="relative">
                <img src="{{ asset('storage/images/logo/blue.png') }}" alt=""
                    class="w-1/2 py-3 border-b-2 mx-auto">
                <i class="fas fa-times text-black text-2xl absolute top-5 right-5" id="hamburgerMenuCloseTrigger"></i>
            </div>
            <div class="flex flex-col text-lg p-3 text-[rgba(0,0,0,0.8)]">
                <a href="{{ route('landing.tour') }}" class="py-1">Tours</a>
                <a href="#" class="py-1">Gallery</a>
                <a href="#about_us" class="py-1">About Us</a>
                <a href="#footer" class="py-1">Get In Touch</a>
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

    <div class="min-h-[100vh] font-poppins">
        <div class="p-10 flex gap-6">
            <div class="w-2/3">
                <img id="heroImg"
                    src="{{ $trip->image ? asset('storage/' . $trip->image) : asset('storage/images/not_found/image_not_available.png') }}"
                    alt="" class="w-full max-h-[75vh] object-cover rounded-lg mb-3">

                <div class="owl-carousel">
                    <div class="overflow-hidden rounded-lg">
                        <img class="img-detail hover:scale-105 duration-300"
                            src="{{ asset('storage/images/views/view1.jpg') }}" alt="">
                    </div>
                    <div class="overflow-hidden rounded-lg">
                        <img class="img-detail hover:scale-105 duration-300"
                            src="{{ asset('storage/images/views/view2.jpg') }}" alt="">
                    </div>
                    <div class="overflow-hidden rounded-lg">
                        <img class="img-detail hover:scale-105 duration-300"
                            src="{{ asset('storage/images/views/view3.jpg') }}" alt="">
                    </div>
                    <div class="overflow-hidden rounded-lg">
                        <img class="img-detail hover:scale-105 duration-300"
                            src="{{ asset('storage/images/views/view4.jpg') }}" alt="">
                    </div>
                    <div class="overflow-hidden rounded-lg">
                        <img class="img-detail hover:scale-105 duration-300"
                            src="{{ asset('storage/images/views/view5.jpg') }}" alt="">
                    </div>
                    <div class="overflow-hidden rounded-lg">
                        <img class="img-detail hover:scale-105 duration-300"
                            src="{{ asset('storage/images/views/view6.jpg') }}" alt="">
                    </div>
                </div>

            </div>
            <div class="w-1/3">
                <div class="rounded-lg bg-[#f5f5f5] p-2 h-fit mb-3">
                    <div class="w-full bg-white rounded-md p-4">
                        <h1 class="font-bold text-2xl mb-3">{{ $trip->name }}</h1>

                        <div class="">
                            <h1 class="text-base font-semibold text-[rgba(0,0,0,0.5)]">Description</h1>
                            <p class="text-sm">{!! $trip->description ? $trip->description : 'Description is empty.' !!}</p>
                        </div>
                    </div>
                </div>
                @forelse ($trip->packages as $package)
                    <div class="px-3">
                        <details class="cursor-pointer py-5 border-b-2">
                            <summary>{{ $package->name }}</summary>

                            <div class="mb-3">
                                <h1 class="text-[rgba(0,0,0,0.5)] font-semibold ">PRICE</h1>
                                <p class="text-sm">{!! $package->pivot->price !!}</p>
                            </div>

                            <div class="mb-3">
                                <h1 class="text-[rgba(0,0,0,0.5)] font-semibold ">INCLUDE</h1>
                                <p class="text-sm">{!! $package->pivot->include !!}</p>
                            </div>

                            <div class="mb-3">
                                <h1 class="text-[rgba(0,0,0,0.5)] font-semibold ">EXCLUDE</h1>
                                <p class="text-sm">{!! $package->pivot->exclude !!}</p>
                            </div>

                            <div class="mb-3">
                                <h1 class="text-[rgba(0,0,0,0.5)] font-semibold ">DESTINATIONS</h1>
                                <p class="text-sm">{!! $package->pivot->destination !!}</p>
                            </div>

                            <div class="mb-3">
                                <h1 class="text-[rgba(0,0,0,0.5)] font-semibold ">NOTES</h1>
                                <p class="text-sm">{!! $package->pivot->notes !!}</p>
                            </div>
                        </details>
                    </div>
                @empty
                    <div class="px-3 text-center text-[rgba(0,0,0,0.5)]">
                        <strong>Packages is empty.</strong>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <div id="footer" class="w-full bg-[#efefef] py-3">
        <div class="p-6 flex flex-col lg:flex-row gap-20 lg:gap-3 mb-3">
            <div class="">
                <img src="{{ $company_profile->colored_logo ? asset('storage/' . $company_profile->colored_logo) : asset('storage/images/not_found/image_not_available.png') }}"
                    alt="" class="w-full md:w-1/2 lg:w-2/3 mx-auto">

                <div class="flex flex-col items-center mt-3">
                    <h1 class="font-bold mb-1">FOLLOW US</h1>
                    <div class="text-sm md:text-lg lg:text-sm flex gap-3 flex-wrap justify-center">
                        @forelse ($social_media as $media)
                            <a href="{{ $media->url }}" target="__blank">
                                <img src="{{ asset('storage/' . $media->icon) }}" alt="{{ $media->name }}"
                                    class="w-8 h-8 object-cover">
                            </a>
                            <a href="{{ $media->url }}" target="__blank">
                                <img src="{{ asset('storage/' . $media->icon) }}" alt="{{ $media->name }}"
                                    class="w-8 h-8 object-cover">
                            </a>
                            <a href="{{ $media->url }}" target="__blank">
                                <img src="{{ asset('storage/' . $media->icon) }}" alt="{{ $media->name }}"
                                    class="w-8 h-8 object-cover">
                            </a>
                            <a href="{{ $media->url }}" target="__blank">
                                <img src="{{ asset('storage/' . $media->icon) }}" alt="{{ $media->name }}"
                                    class="w-8 h-8 object-cover">
                            </a>
                            <a href="{{ $media->url }}" target="__blank">
                                <img src="{{ asset('storage/' . $media->icon) }}" alt="{{ $media->name }}"
                                    class="w-8 h-8 object-cover">
                            </a>
                        @empty
                            <h1>Coming Soon</h1>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 grid-rows-2 lg:grid-cols-4 lg:grid-rows-1 gap-6 lg:gap-6">
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
                        <h2><a href="{{ route('landing.tour') }}">Tours</a></h2>
                        <h2><a href="#">Gallery</a></h2>
                        <h2><a href="#about_us">About Us</a></h2>
                        <h2><a href="#footer">Get In Touch</a></h2>
                    </div>
                </div>
                <div class="">
                    <h1 class="font-bold">ADDRESS</h1>
                    <p class="text-sm md:text-lg lg:text-sm">
                        {{ $company_profile->address ? $company_profile->address : 'Coming Soon' }}</p>
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
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                nav: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false,
                    },
                    640: {
                        items: 2,
                        nav: false,
                    },
                    768: {
                        items: 3,
                        nav: false,
                    },
                    1024: {
                        items: 3,
                        nav: false,
                    },
                    1440: {
                        items: 4,
                        nav: false,
                    }
                }
            });
        });

        function setCopyrightYear(elementId) {
            const currentYear = new Date().getFullYear();
            var companyName = "{{ $company_profile->name }}"
            document.getElementById(elementId).textContent = 'Copyright © ' + currentYear + ' - ' + companyName;
        }

        window.onload = function() {
            setCopyrightYear('copyrightYear');
        };

        var imgDetail = document.querySelectorAll('.img-detail');
        var heroImg = document.getElementById('heroImg');

        imgDetail.forEach(list => {
            list.addEventListener('mouseenter', function() {
                var imgSrc = list.getAttribute("src");
                heroImg.src = imgSrc;
            })

            list.addEventListener('mouseleave', function() {
                heroImg.src =
                    "{{ $trip->image ? asset('storage/' . $trip->image) : asset('storage/images/not_found/image_not_available.png') }}";
            })
        });
    </script>
</body>

</html>
