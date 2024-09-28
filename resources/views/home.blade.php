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
        ::-webkit-scrollbar {
            display: none;
        }

        html {
            scrollbar-width: none;
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
        <div class="flex sticky top-0 z-50 p-6 text-white justify-between duration-300" id="navbar">
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
        </div>

        @foreach ($images as $index => $image)
            <div class="hero-image-background absolute inset-0 bg-cover h-screen bg-center transition-opacity brightness-75 duration-1000 ease-in-out z-0 {{ $loop->first ? 'opacity-100' : 'opacity-0' }}"
                style="background-image: url('{{ $image }}');" id="image-{{ $index }}"></div>
        @endforeach

        <div class="relative z-30 h-[83vh] lg:h-[87vh] xl:h-[89vh]">
            <div class="px-3">
                <div class="flex items-center space-x-2 gap-1 md:gap-2 p-4 ">
                    {{-- <div class="relative flex -space-x-4">
                        <img class="w-7 h-7 sm:w-8 sm:h-8 lg:w-10 lg:h-10 xl:w-12 xl:h-12 rounded-full border-2 border-white object-cover"
                            src="{{ asset('storage/images/avatars/huang.jpeg') }}" alt="Avatar 1" />
                        <img class="w-7 h-7 sm:w-8 sm:h-8 lg:w-10 lg:h-10 xl:w-12 xl:h-12 rounded-full border-2 border-white object-cover"
                            src="{{ asset('storage/images/avatars/mark.jpeg') }}" alt="Avatar 2" />
                        <img class="w-7 h-7 sm:w-8 sm:h-8 lg:w-10 lg:h-10 xl:w-12 xl:h-12 rounded-full border-2 border-white object-cover"
                            src="{{ asset('storage/images/avatars/tim.jpeg') }}" alt="Avatar 3" />
                        <img class="w-7 h-7 sm:w-8 sm:h-8 lg:w-10 lg:h-10 xl:w-12 xl:h-12 rounded-full border-2 border-white object-cover"
                            src="{{ asset('storage/images/avatars/elon.jpg') }}" alt="Avatar 4" />
                    </div> --}}
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

            <div class="p-6 rounded-sm mb-20" style="box-shadow: 0px 0px 20px rgba(0,0,0,0.2)">
                <div class="flex flex-col sm:flex-row justify-between sm:items-center mb-3">
                    <h1 class="text-3xl font-bold mb-3 text-[rgba(0,0,0,0.8)]">
                        Our Latest Tours</h1>

                    <p class="border-b-2 text-[rgba(0,0,0,0.8)]">Here's some interesting tours that will definitely
                        satisfy you. <a href="" class="text-blue-600 hover:text-blue-900">Click here to see other
                            tours.</a></p>
                </div>
                <div data-aos="fade-up" data-aos-easing="ease" data-aos-duration="600" class="owl-carousel">
                    @foreach ($trips->take(10) as $trip)
                        <a href="" class="image-hover relative rounded-sm">
                            <div class="overflow-hidden">
                                <img src="{{ $trip->image ? asset('storage/' . $trip->image) : asset('storage/images/not_found/image_not_available.png') }}"
                                    class="img-trip object-cover brightness-75 h-[200px]" alt="">
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
                <h1 class="text-3xl">Why <span class="font-bold">OneWayGoTrip</span></h1>
                <p class="mb-3">Here are the reasons why you should choose OneWayGoTrip as your travel partner</p>

                <div class="grid grid-cols-1 grid-rows-4 lg:grid-cols-2 lg:grid-rows-2 gap-3">
                    <div data-aos="zoom-in" data-aos-easing="ease" data-aos-duration="600"
                        class="aspect-w-16 aspect-h-9 flex flex-col sm:flex-row sm:gap-3">
                        <img src="{{ asset('storage/images/views/view1-square.jpg') }}" class="w-full sm:w-1/3"
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
                        <img src="{{ asset('storage/images/views/view2-square.jpg') }}" class="w-full sm:w-1/3"
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
                        <img src="{{ asset('storage/images/views/view3-square.jpg') }}" class="w-full sm:w-1/3"
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
                        <img src="{{ asset('storage/images/views/view4-square.jpg') }}" class="w-full sm:w-1/3"
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
                        <div class="h-full object-cover" data-aos="fade-up" data-aos-easing="ease"
                            data-aos-duration="600">
                            <img src="{{ asset('storage/' . $gallery->image) }}" alt="">
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

        <div class="text-center text-3xl mb-3">About <span class="font-semibold">Us</span></div>
        <div class="h-[100vh] flex justify-end"
            style="background-size: 100%;background-image: url({{ asset('storage/images/highlights/WIL05715-HDR.jpg') }});">
            <div class="bg-[rgba(0,0,0,0.5)] w-full lg:w-1/2 flex justify-center items-center">
                <div class="text-white h-4/5 w-3/4 overflow-auto">
                    <img src="{{ asset('storage/images/logo/white.png') }}" class="w-2/3 mb-3" alt="">

                    <p class="mb-3 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam voluptas
                        officiis
                        repudiandae
                        molestiae veniam perspiciatis fuga sequi corrupti, debitis eum maiores qui vero impedit
                        assumenda
                        nihil, unde, est voluptatum. Veniam.</p>

                    <p class="mb-3 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis nisi
                        voluptatum,
                        aliquam alias qui
                        ex quibusdam rerum aspernatur expedita voluptas! Alias eaque delectus voluptates labore sint
                        animi
                        error nulla consequuntur, id recusandae rerum veritatis inventore commodi numquam vel illo,
                        temporibus corrupti laborum dolor. Iure cupiditate deleniti dolor qui necessitatibus assumenda
                        officia excepturi, modi eligendi quod quas ipsa ratione iste quam, pariatur eius! Ratione
                        temporibus
                        quasi ducimus fuga ipsum necessitatibus voluptatem suscipit, ex dolor ab soluta itaque
                        praesentium
                        voluptatum atque in.</p>

                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos, veritatis dignissimos fugit
                        pariatur
                        excepturi quaerat fuga at consequuntur impedit nisi corporis architecto quae ullam vitae ad a
                        magni
                        iste aliquid?</p>
                </div>
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
    </div>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: {{ $trips->count() < 3 ? "false" : "true" }},
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
            const targetService = 300;
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
                navbar.classList.add('bg-[#f5f5f5]')
                navLogo.src = "{{ asset('storage/images/logo/blue.png') }}"
            } else {
                navbarLists.forEach(list => {
                    list.classList.remove('text-[rgba(0,0,0,0.5)]')
                    list.classList.add('hover:text-[rgba(255,255,255,0.8)]')
                    list.classList.remove('hover:text-black')
                });
                navbar.classList.remove('bg-[#f5f5f5]')
                navLogo.src = "{{ asset('storage/images/logo/white.png') }}"
            }

        })

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
