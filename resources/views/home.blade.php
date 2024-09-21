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

    <style>
        .stroked-text {
            font-weight: bold;
            color: transparent;
            -webkit-text-stroke: 2px #FFFF;
            text-align: center;
        }
    </style>
</head>

<body>
    @php
        $images = [
            asset('storage/images/views/view1.jpg'),
            asset('storage/images/views/view2.jpg'),
            asset('storage/images/views/view3.jpg'),
        ];
    @endphp
    <div class="w-full relative font-poppins">
        <div class="flex sticky top-0 z-50 p-6 text-white justify-between duration-300" id="navbar">
            <a class="text-white font-bold text-2xl xl:text-3xl font-sofandi">
                <img src="{{ asset('storage/images/logo/transparent_logo.png') }}" class="w-52 h-10 object-cover"
                    alt="">
            </a>

            <ul class="hidden sm:flex gap-10 items-center font-semibold">
                <li><a href="#" class="text-sm lg:text-lg hover:text-[rgba(255,255,255,0.8)]">Tours</a></li>
                <li><a href="#" class="text-sm lg:text-lg hover:text-[rgba(255,255,255,0.8)]">About Us</a></li>
                <li><a href="#" class="text-sm lg:text-lg hover:text-[rgba(255,255,255,0.8)]">Gallery</a></li>
                <li><a href="#" class="text-sm lg:text-lg hover:text-[rgba(255,255,255,0.8)]">Contact</a></li>
            </ul>
        </div>

        @foreach ($images as $index => $image)
            <div class="absolute inset-0 bg-cover h-screen bg-center transition-opacity brightness-75 duration-1000 ease-in-out z-0 {{ $loop->first ? 'opacity-100' : 'opacity-0' }}"
                style="background-image: url('{{ $image }}');" id="image-{{ $index }}"></div>
        @endforeach

        <div class="relative z-30 h-[83vh] lg:h-[87vh] xl:h-[89vh]">
            <div class="px-3">
                <div class="flex items-center space-x-2 gap-1 md:gap-2 p-4 ">
                    <div class="relative flex -space-x-4">
                        <img class="w-7 h-7 sm:w-8 sm:h-8 lg:w-10 lg:h-10 xl:w-12 xl:h-12 rounded-full border-2 border-white object-cover"
                            src="{{ asset('storage/images/avatars/huang.jpeg') }}" alt="Avatar 1" />
                        <img class="w-7 h-7 sm:w-8 sm:h-8 lg:w-10 lg:h-10 xl:w-12 xl:h-12 rounded-full border-2 border-white object-cover"
                            src="{{ asset('storage/images/avatars/mark.jpeg') }}" alt="Avatar 2" />
                        <img class="w-7 h-7 sm:w-8 sm:h-8 lg:w-10 lg:h-10 xl:w-12 xl:h-12 rounded-full border-2 border-white object-cover"
                            src="{{ asset('storage/images/avatars/tim.jpeg') }}" alt="Avatar 3" />
                        <img class="w-7 h-7 sm:w-8 sm:h-8 lg:w-10 lg:h-10 xl:w-12 xl:h-12 rounded-full border-2 border-white object-cover"
                            src="{{ asset('storage/images/avatars/elon.jpg') }}" alt="Avatar 4" />
                    </div>
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
        <div class="p-6 sm:p-10">

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

            <div class="p-6 rounded-sm" style="box-shadow: 0px 0px 20px rgba(0,0,0,0.2)">
                <div class="flex flex-col sm:flex-row justify-between sm:items-center mb-3">
                    <h1
                        class="text-3xl font-bold mb-3 text-[rgba(0,0,0,0.8)]">
                        Our Tours</h1>

                        <p class="border-b-2 text-[rgba(0,0,0,0.8)]">Here's some interesting tours that will definitely satisfy you</p>
                </div>
                <div class="owl-carousel">
                    <a href="" class="image-hover relative rounded-sm">
                        <div class="overflow-hidden">
                            <img src="{{ asset('storage/images/views/view1.jpg') }}"
                                class="img-trip h-[80vh] object-cover brightness-75" alt="">
                        </div>
                        <div class="absolute w-full bottom-3 left-3 text-white">
                            <h1 class="font-semibold text-xl">Komodo Island Trip</h1>
                            <span class="text-lg">See More >> </span>
                        </div>
                    </a>

                    <a href="" class="image-hover relative rounded-sm">
                        <div class="overflow-hidden">
                            <img src="{{ asset('storage/images/views/view2.jpg') }}"
                                class="img-trip h-[80vh] object-cover brightness-75" alt="">
                        </div>
                        <div class="absolute w-full bottom-3 left-3 text-white">
                            <h1 class="font-semibold text-xl">Siaba Island Trip</h1>
                            <span class="text-lg">See More >> </span>
                        </div>
                    </a>

                    <a href="" class="image-hover relative rounded-sm">
                        <div class="overflow-hidden">
                            <img src="{{ asset('storage/images/views/view3.jpg') }}"
                                class="img-trip h-[80vh] object-cover brightness-75" alt="">
                        </div>
                        <div class="absolute w-full bottom-3 left-3 text-white">
                            <h1 class="font-semibold text-xl">Padar Island Trip</h1>
                            <span class="text-lg">See More >> </span>
                        </div>
                    </a>
                </div>
            </div>



            {{-- <img src="{{ asset('storage/images/views/view1.jpg') }}" alt=""> --}}
        </div>


        {{-- <div class="flex justify-between gap-3">
                <div class="w-1/2">
                    <h1 class="font-bold text-3xl">Lorem ipsum dolor sit amet.</h1>
                    <p class="font-semibold">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit deserunt ab
                        praesentium ipsa
                        laborum nulla eum minima tenetur suscipit soluta, veniam atque, enim unde vero iusto, aliquid
                        magnam! Tempore sunt architecto quia sequi ratione sed deserunt accusamus consequatur explicabo
                        perferendis autem voluptatum, ut, neque expedita qui ad molestias quos impedit fuga nobis
                        voluptatibus possimus! Blanditiis, autem quas minus enim molestiae perferendis maxime ea
                        repudiandae, doloribus accusamus iure eos quis, corrupti amet aspernatur. Officia officiis
                        dolorum rerum et id sed saepe? Repellat velit perspiciatis molestiae nesciunt soluta nihil odit
                        laudantium mollitia laborum dolorem commodi molestias, repudiandae modi. Deleniti inventore
                        nulla quod magni enim aut quae asperiores! Odio, eaque magnam rerum veritatis quaerat
                        repellendus numquam saepe porro deserunt possimus beatae consectetur! Nostrum.</p>
                </div>
                <div class="overflow-hidden w-1/2">
                    <img src="{{ asset('storage/images/views/view1.jpg') }}" class="w-full duration-300 hover:scale-105"
                        alt="">
                </div> --}}
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    </div>
    </div>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    640: {
                        items: 2
                    },
                    768: {
                        items: 3
                    },
                    1024: {
                        items: 3
                    },
                    1280: {
                        items: 4
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
                strings: ['Thrusted', 'The Best', 'Funniest'],
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
            if (window.scrollY > 0) {
                navbar.classList.add('backdrop-blur-sm');
            } else {
                navbar.classList.remove('backdrop-blur-sm');
            }

        })
    </script>

</body>

</html>
