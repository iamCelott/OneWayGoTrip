<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneWayGoTrip</title>
    <link rel="icon"
        href="{{ $company_profile->raw_logo ? asset('storage/' . $company_profile->raw_logo) : asset('storage/images/not_found/image_not_available.png') }}"
        type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/css/app.css')

    <!-- CSS CDN -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
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
        ::-webkit-scrollbar {
            display: none;
        }

        html {
            scrollbar-width: none;
            scroll-behavior: smooth;
        }

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
    @php
        $images = [];

        if ($hero_backgrounds->isNotEmpty()) {
            foreach ($hero_backgrounds as $index => $background) {
                array_push($images, asset('storage/' . $background->image));
            }
        } else {
            array_push($images, asset('storage/images/highlights/WIL05715-HDR.jpg'));
        }
    @endphp
    <div class="w-full relative font-poppins">
        <div class="flex sticky top-0 z-50 p-6 text-white justify-between duration-300 items-center" id="navbar">
            <a href="/" class="text-white font-bold text-2xl xl:text-3xl font-sofandi">
                <img src="{{ $company_profile->white_logo ? asset('storage/' . $company_profile->white_logo) : asset('storage/images/not_found/image_not_available.png') }}"
                    class="h-8" id="navLogo" alt="">
            </a>

            <ul class="hidden sm:flex gap-10 items-center font-semibold">
                <li><a href="{{ route('landing.tour') }}"
                        class="text-sm lg:text-lg duration-300 hover:text-[rgba(255,255,255,0.8)]">Tours</a>
                </li>
                <li><a href="{{ route('landing.gallery') }}"
                        class="text-sm lg:text-lg duration-300 hover:text-[rgba(255,255,255,0.8)]">Gallery</a>
                </li>
                <li><a href="#about_us" class="text-sm lg:text-lg duration-300 hover:text-[rgba(255,255,255,0.8)]">About
                        Us</a></li>
                <li><a href="#footer" class="text-sm lg:text-lg duration-300 hover:text-[rgba(255,255,255,0.8)]">Get In
                        Touch</a></li>
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

            <div id="hamburgerMenu" class="w-full sm:hidden absolute duration-300 left-0 -top-96 bg-[#f5f5f5]">
                <div class="relative">
                    <a href="/"><img
                            src="{{ $company_profile->blue_logo ? asset('storage/' . $company_profile->blue_logo) : asset('storage/images/not_found/image_not_available.png') }}"
                            alt="" class="w-1/2 py-3 border-b-2 mx-auto"></a>
                    <i class="fas fa-times text-black text-2xl absolute top-5 right-5"
                        id="hamburgerMenuCloseTrigger"></i>
                </div>
                <div class="flex flex-col text-lg p-3 text-[rgba(0,0,0,0.8)]">
                    <a href="{{ route('landing.tour') }}" class="py-1 font-semibold">Tours</a>
                    <a href="{{ route('landing.gallery') }}" class="py-1 font-semibold">Gallery</a>
                    <a href="#about_us" class="py-1 font-semibold">About Us</a>
                    <a href="#footer" class="py-1 font-semibold">Get In Touch</a>
                </div>
            </div>

            <script>
                var hamburgerTrigger = document.getElementById('hamburgerTrigger');
                var menu = document.getElementById('hamburgerMenu');

                function toggleMenu() {
                    if (hamburgerTrigger.checked) {
                        menu.classList.remove('-top-96');
                        menu.classList.add('top-0');
                    } else {
                        menu.classList.remove('top-0');
                        menu.classList.add('-top-96');
                    }
                }

                hamburgerTrigger.addEventListener('change', toggleMenu);
                document.getElementById('hamburgerMenuCloseTrigger').addEventListener('click', function() {
                    hamburgerTrigger.checked = false;
                    toggleMenu();
                });
            </script>
        </div>

        @foreach ($images as $index => $image)
            <div class="hero-image-background absolute inset-0 bg-cover h-screen bg-center transition-opacity brightness-75 duration-1000 ease-in-out z-0 {{ $loop->first ? 'opacity-100' : 'opacity-0' }}"
                style="background-image: url('{{ $image }}');" id="image-{{ $index }}"></div>
        @endforeach

        <div class="relative z-30 h-[90vh] sm:h-[93vh] lg:h-[90vh] xl:h-[91vh]">
            <div class="px-3">
                <div class="flex items-center space-x-2 gap-1 md:gap-2 p-4 ">
                    <div class="w-[2px] h-9 sm:h-10 lg:h-12 xl:h-14 bg-white"></div>
                    <p class="text-white font-medium text-xs sm:text-sm lg:text-lg xl:text-xl">
                        Over <span id="used-services">0</span>+ have used <br /> our services
                    </p>
                </div>

                <div class="flex w-full my-10 sm:my-20 items-center justify-center" data-aos="zoom-in-down"
                    data-aos-duration="1150" data-aos-easing="ease">
                    <h1 class="text-white text-4xl sm:text-3xl md:text-4xl xl:text-6xl font-poppins text-center">
                        <span class="font-semibold">
                            Explore the World with
                            <span class="font-extrabold stroked-text">Us</span>,
                        </span>
                        <br />
                        <span class="font-bold">
                            Your <span class="text-5xl md:text-5xl sm:text-4xl xl:text-7xl stroked-text"
                                id="typewriter"></span>
                            Travel
                            Partner
                        </span>
                    </h1>
                </div>
            </div>
        </div>

        {{-- Main Content --}}
        <div class="p-6 lg:p-10">

            <style>
                .img-trip {
                    transition: transform 300ms ease-in-out;
                }

                .img-trip-detail {
                    transition: 300ms ease-in-out;
                }

                .image-hover:hover .img-trip {
                    transform: scale(1.1);
                    transition: transform 300ms ease-in-out;
                }

                .image-hover:hover .img-trip-detail {
                    transition: 300ms ease-in-out;
                }
            </style>

            <div class="pb-0 px-6 pt-6 xl:p-6 rounded-sm mb-20" style="box-shadow: 0px 0px 20px rgba(0,0,0,0.2)">
                <div class="flex flex-col sm:flex-row justify-between sm:items-center mb-3">
                    <h1 class="text-3xl font-bold mb-3 text-[rgba(0,0,0,0.8)]">
                        Our Latest Tours</h1>

                    <p class="border-b-2 text-[rgba(0,0,0,0.8)]">Here's some interesting tours that will definitely
                        satisfy you. <a href="" class="text-blue-600 hover:text-blue-900">Click here to see other
                            tours.</a></p>
                </div>
                <div data-aos="fade-up" data-aos-easing="ease" data-aos-duration="600" class="owl-carousel">
                    @foreach ($trips->take(10) as $trip)
                        <a href="{{ route('landing.tour.show', $trip->slug) }}"
                            class="image-hover relative rounded-sm">
                            <div class="overflow-hidden">
                                <img src="{{ $trip->image ? asset('storage/' . $trip->image) : asset('storage/images/not_found/image_not_available.png') }}"
                                    class="img-trip brightness-75 h-[250px]" alt="">
                            </div>
                            <div class="absolute w-full bottom-3 left-3 text-white">
                                <h1 class="font-semibold text-xl {{ $trip->image ? 'text-white' : 'text-black' }}">
                                    {{ $trip->name }}</h1>
                                <span class="text-lg {{ $trip->image ? 'text-white' : 'text-black' }}">See More >>
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
                @if ($trips->isEmpty())
                    <div class="py-10">
                        <p class="text-center"><strong>We apologize, we currently do not have any new tours
                                available</strong></p>
                    </div>
                @endif
            </div>

            <div class="mb-20">
                <h1 class="text-3xl">Why <span class="font-bold">{{ $company_profile->name }}</span></h1>
                <p class="mb-3">Here are the reasons why you should choose OneWayGoTrip as your travel partner</p>

                <div class="grid grid-cols-1 grid-rows-4 lg:grid-cols-2 lg:grid-rows-2 gap-3">
                    <div data-aos="zoom-in" data-aos-easing="ease" data-aos-duration="600"
                        class="aspect-w-16 aspect-h-9 flex flex-col sm:flex-row sm:gap-3">
                        <img src="{{ asset('storage/images/whychoose/img1.jpg') }}" class="w-full sm:w-1/3"
                            alt="">
                        <div class="mt-3 sm:mt-0">
                            <span class="font-semibold text-xl md:text-2xl lg:text-lg xl:text-xl">#1</span>
                            <h1 class="font-bold text-2xl md:text-3xl lg:text-xl xl:text-2xl">Interesting Tourist
                                Destinations</h1>
                            <p class="sm:text-sm md:text-lg lg:text-xs xl:text-lg">Offers a variety of experiences,
                                from stunning beaches to stunning natural views. This destination promises beauty and
                                lasting, unforgettable memories for every tourist.</p>
                        </div>
                    </div>

                    <div data-aos="zoom-in" data-aos-easing="ease" data-aos-duration="600"
                        class="aspect-w-16 aspect-h-9 flex flex-col sm:flex-row sm:gap-3">
                        <img src="{{ asset('storage/images/whychoose/img2.jpg') }}" class="w-full sm:w-1/3"
                            alt="">
                        <div class="mt-3 sm:mt-0">
                            <span class="font-semibold text-xl md:text-2xl lg:text-lg xl:text-xl">#2</span>
                            <h1 class="font-bold text-2xl md:text-3xl lg:text-xl xl:text-2xl">Best Service Quality</h1>
                            <p class="sm:text-sm md:text-lg lg:text-xs xl:text-lg">ensuring every traveler enjoys a
                                smooth and memorable experience, from personalized itineraries to attentive customer
                                support. Making your trip as enjoyable as the destination itself.</p>
                        </div>
                    </div>

                    <div data-aos="zoom-in" data-aos-easing="ease" data-aos-duration="600"
                        class="aspect-w-16 aspect-h-9 flex flex-col sm:flex-row sm:gap-3">
                        <img src="{{ asset('storage/images/whychoose/img3.jpg') }}" class="w-full sm:w-1/3"
                            alt="">
                        <div class="mt-3 sm:mt-0">
                            <span class="font-semibold text-xl md:text-2xl lg:text-lg xl:text-xl">#3</span>
                            <h1 class="font-bold text-2xl md:text-3xl lg:text-xl xl:text-2xl">Experienced Agent</h1>
                            <p class="sm:text-sm md:text-lg lg:text-xs xl:text-lg">Providing expert guidance and
                                personalized recommendations for your trip. We guarantee a smooth and hassle-free travel
                                experience. Trust us to make every trip unforgettable.</p>
                        </div>
                    </div>

                    <div data-aos="zoom-in" data-aos-easing="ease" data-aos-duration="600"
                        class="aspect-w-16 aspect-h-9 flex flex-col sm:flex-row sm:gap-3">
                        <img src="{{ asset('storage/images/whychoose/img4.jpg') }}" class="w-full sm:w-1/3"
                            alt="">
                        <div class="mt-3 sm:mt-0">
                            <span class="font-semibold text-xl md:text-2xl lg:text-lg xl:text-xl">#4</span>
                            <h1 class="font-bold text-2xl md:text-3xl lg:text-xl xl:text-2xl">Affordable prices</h1>
                            <p class="sm:text-sm md:text-lg lg:text-xs xl:text-lg">Enjoy an extraordinary travel
                                experience at our affordable prices. We offer tour packages for all budgets, ensuring
                                you can explore your dream destination without worrying about costs.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-6 rounded-sm mb-20" style="box-shadow: 0px 0px 20px rgba(0,0,0,0.2)">
                <div class="flex flex-col sm:flex-row justify-between sm:items-center mb-3">
                    <h1 class="text-3xl font-bold mb-3 text-[rgba(0,0,0,0.8)]">
                        Gallery</h1>

                    <a href="" class="text-blue-600 hover:text-blue-900">More image >></a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 py-3">
                    @foreach ($galleries->take(9) as $gallery)
                        <div class="h-full rounded-lg overflow-hidden" data-aos="fade-up" data-aos-easing="ease"
                            data-aos-duration="600">
                            <img src="{{ asset('storage/' . $gallery->image) }}" alt=""
                                class="w-full h-[250px] hover:scale-105">
                        </div>
                    @endforeach
                </div>
                @if ($galleries->isEmpty())
                    <div class="py-10">
                        <p class="text-center"><strong>We apologize, we currently do not have gallery
                                images</strong></p>
                    </div>
                @endif
            </div>
        </div>

        <div id="about_us" class="text-center text-3xl mb-3">About <span class="font-semibold">Us</span></div>
        <div class="lg:h-[100vh] flex justify-end"
            style="background-size: 100%;background-image: url({{ asset('storage/images/highlights/WIL05715-HDR.jpg') }});">
            <div class="bg-[rgba(0,0,0,0.5)] w-full lg:w-1/2 flex justify-center items-center">
                <div class="text-white h-4/5 w-3/4 overflow-auto">
                    <img src="{{ $company_profile->white_logo ? asset('storage/' . $company_profile->white_logo) : asset('storage/images/not_found/image_not_available.png') }}"
                        class="w-2/3 object-cover mb-3" alt="">

                    <p class="text-sm">{!! $company_profile->about_us !!}</p>
                </div>
            </div>
        </div>

        <div id="footer" class="w-full bg-[#efefef] py-3">
            <div class="p-6 flex flex-col lg:flex-row gap-10 lg:gap-3 mb-3">
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
                            @forelse ($trips->take(5) as $index=> $trip)
                                <h2 class="mb-1"><a href="{{ route('landing.tour.show', $trip->slug) }}">{{ $trip->name }}</a>
                                </h2>
                            @empty
                                <h2>Coming Soon</h2>
                            @endforelse
                        </div>
                    </div>
                    <div class="">
                        <h1 class="font-bold">INFORMATION</h1>
                        <div class="text-sm md:text-lg lg:text-sm">
                            <h2><a href="{{ route('landing.tour') }}">Tours</a></h2>
                            <h2><a href="{{ route('landing.gallery') }}">Gallery</a></h2>
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
    </div>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: {{ $trips->count() < 4 ? 'false' : 'true' }},
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

        document.addEventListener('DOMContentLoaded', function() {
            AOS.init();

            let usedService = 0;
            const targetService = "{{ $company_profile->have_used_over }}";
            const incrementTime = 10;

            const updateCounter = setInterval(() => {
                if (usedService < targetService) {
                    usedService++;
                    document.getElementById('used-services').textContent = usedService;
                } else {
                    clearInterval(updateCounter);
                }
            }, incrementTime);

            var typed = new Typed('#typewriter', {
                strings: ['Trusted', 'The Best', 'Expert', 'Reliable'],
                typeSpeed: 80,
                backSpeed: 60,
                backDelay: 2000,
                loop: true,
                loopCount: Infinity,
                smartBackspace: false,
            });

            const images = @json($images);
            let currentImageIndex = 0;

            setInterval(() => {
                document.getElementById('image-' + currentImageIndex).classList.remove('opacity-100');
                document.getElementById('image-' + currentImageIndex).classList.add('opacity-0');

                currentImageIndex = (currentImageIndex + 1) % images.length;

                document.getElementById('image-' + currentImageIndex).classList.remove('opacity-0');
                document.getElementById('image-' + currentImageIndex).classList.add('opacity-100');
            }, 5000);
        });

        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            const heroHeight = document.querySelectorAll('.hero-image-background')[0].offsetHeight;
            const navbarLists = document.querySelectorAll('ul li a');
            const hamburgerLists = document.querySelectorAll('.hamburgerLists');
            const navLogo = document.getElementById('navLogo');

            if (window.scrollY > 0) {
                navbar.classList.add('backdrop-blur-sm');
            } else {
                navbar.classList.remove('backdrop-blur-sm');
            }

            if (window.scrollY > heroHeight) {
                navbarLists.forEach(list => {
                    list.classList.add('text-[rgba(0,0,0,0.5)]')
                    list.classList.remove('hover:text-[rgba(255,255,255,0.8)]')
                    list.classList.add('hover:text-black')
                });

                hamburgerLists.forEach(list => {
                    list.classList.add('bg-[rgba(0,0,0,0.5)]')
                    list.classList.remove('bg-white')
                });

                navbar.classList.add('bg-[#f5f5f5]')
                navLogo.src =
                    "{{ $company_profile->colored_logo ? asset('storage/' . $company_profile->colored_logo) : asset('storage/images/not_found/image_not_available.png') }}"
            } else {
                navbarLists.forEach(list => {
                    list.classList.remove('text-[rgba(0,0,0,0.5)]')
                    list.classList.add('hover:text-[rgba(255,255,255,0.8)]')
                    list.classList.remove('hover:text-black')
                });

                hamburgerLists.forEach(list => {
                    list.classList.remove('bg-[rgba(0,0,0,0.5)]')
                    list.classList.add('bg-white')
                });

                navbar.classList.remove('bg-[#f5f5f5]')
                navLogo.src =
                    "{{ $company_profile->white_logo ? asset('storage/' . $company_profile->white_logo) : asset('storage/images/not_found/image_not_available.png') }}"
            }

        })

        function setCopyrightYear(elementId) {
            const currentYear = new Date().getFullYear();
            var companyName = "{{ $company_profile->name }}"
            document.getElementById(elementId).textContent = 'Copyright © ' + currentYear + ' - ' + companyName;
        }

        window.onload = function() {
            setCopyrightYear('copyrightYear');
        };
    </script>

</body>

</html>
