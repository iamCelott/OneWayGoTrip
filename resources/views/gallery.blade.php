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

        .img-wrapper {
            position: relative;
        }

        .img-wrapper img {
            width: 100%;
        }

        .img-overlay {
            background: rgba(0, 0, 0, 0.7);
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.2ms ease;
        }

        .img-overlay i {
            color: #fff;
            font-size: 3em;
        }

        #overlay {
            background: rgba(0, 0, 0, 0.7);
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 999;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        #overlay img {
            margin: 0;
            width: 80%;
            height: auto;
            object-fit: contain;
            padding: 5%;
        }

        @media screen and (min-width: 768px) {
            #overlay img {
                width: 60%;
            }
        }

        @media screen and (min-width: 1200px) {
            #overlay img {
                width: 50%;
            }
        }

        #nextButton {
            color: #fff;
            font-size: 2em;
            transition: opacity 0.8s;
        }

        #nextButton:hover {
            opacity: 0.7;
        }

        @media screen and (min-width: 768px) {
            #nextButton {
                font-size: 3em;
            }
        }

        #prevButton {
            color: #fff;
            font-size: 2em;
            transition: opacity 0.8s;
        }

        #prevButton:hover {
            opacity: 0.7;
        }

        @media screen and (min-width: 768px) {
            #prevButton {
                font-size: 3em;
            }
        }

        #exitButton {
            color: #fff;
            font-size: 2em;
            transition: opacity 0.8s;
            position: absolute;
            top: 15px;
            right: 15px;
        }

        #exitButton:hover {
            opacity: 0.7;
        }

        @media screen and (min-width: 768px) {
            #exitButton {
                font-size: 3em;
            }
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
            <li><a href="{{ route('landing.gallery') }}"
                    class="text-sm lg:text-lg duration-300 text-[rgba(0,0,0,0.8)]">Gallery</a>
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

        <div id="hamburgerMenu" class="w-full sm:hidden absolute duration-300 left-0 -top-96 bg-[#f5f5f5]">
            <div class="relative">
                <a href="/"><img
                        src="{{ $company_profile->colored_logo ? asset('storage/' . $company_profile->colored_logo) : asset('storage/images/not_found/image_not_available.png') }}"
                        alt="" class="w-1/2 py-3 border-b-2 mx-auto"></a>
                <i class="fas fa-times text-black text-2xl absolute top-5 right-5" id="hamburgerMenuCloseTrigger"></i>
            </div>
            <div class="flex flex-col text-lg p-3 text-[rgba(0,0,0,0.8)]">
                <a href="{{ route('landing.tour') }}" class="py-1 font-semibold">Tours</a>
                <a href="{{ route('landing.gallery') }}" class="py-1 font-semibold">Gallery</a>
                <a href="/#about_us" class="py-1 font-semibold">About Us</a>
                <a href="#footer" class="py-1 font-semibold">Get In Touch</a>
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

    <div class="p-3 lg:p-10 font-poppins min-h-[100vh] container mx-auto">

        <div class="flex justify-between items-center py-3 border-b-2 mb-3">
            <h1 class="text-2xl font-bold">GALLERY</h1>
        </div>

        <section id="gallery">
            <div class="container">
                <div id="image-gallery">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mb-3 gap-3">
                        @foreach ($galleries as $gallery)
                            <div class="image relative rounded-lg overflow-hidden cursor-pointer" data-aos="fade-up"
                                data-aos-easing="ease" data-aos-duration="600">
                                <div class="img-wrapper relative">
                                    <a href="{{ asset('storage/' . $gallery->image) }}">
                                        <img class="hover:scale-105 duration-300 w-full h-[200px] xl:h-[250px] 2xl:h-[300px]"
                                            src="{{ asset('storage/' . $gallery->image) }}" alt="">
                                    </a>
                                    <div
                                        class="img-overlay absolute inset-0 bg-black bg-opacity-50 opacity-0 flex items-center justify-center transition-opacity duration-600">
                                        <i class="fa fa-plus-circle text-white text-2xl"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if ($galleries->isEmpty())
                        <div class="mt-10">
                            <p class="text-center"><strong>Sorry, we don't have any images at this time</strong></p>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <script>
            $(".img-wrapper").hover(
                function() {
                    $(this).find(".img-overlay").animate({
                        opacity: 1
                    }, 200);
                },
                function() {
                    $(this).find(".img-overlay").animate({
                        opacity: 0
                    }, 200);
                }
            );

            var $overlay = $('<div id="overlay"></div>');
            var $image = $("<img>");
            var $prevButton = $('<div id="prevButton"><i class="far fa-chevron-left"></i></div>');
            var $nextButton = $('<div id="nextButton"><i class="far fa-chevron-right"></i></div>');
            var $exitButton = $('<div id="exitButton"><i class="fal fa-times"></i></div>');

            $overlay.append($image).prepend($prevButton).append($nextButton).append($exitButton);
            $("#gallery").append($overlay);

            $overlay.hide();

            $(".img-overlay").click(function(event) {
                event.preventDefault();
                var imageLocation = $(this).prev().attr("href");
                $image.attr("src", imageLocation);
                $overlay.fadeIn("slow");
            });

            $overlay.click(function() {
                $(this).fadeOut("slow");
            });

            $nextButton.click(function(event) {
                $("#overlay img").hide();
                var $currentImgSrc = $("#overlay img").attr("src");
                var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');
                var $nextImg = $currentImg.closest(".image").next().find(
                    "img");

                var $images = $("#image-gallery img");
                if ($nextImg.length > 0) {
                    $("#overlay img").attr("src", $nextImg.attr("src")).fadeIn(800);
                } else {

                    $("#overlay img").attr("src", $($images[0]).attr("src")).fadeIn(800);
                }
                event.stopPropagation();
            });

            $prevButton.click(function(event) {
                $("#overlay img").hide();
                var $currentImgSrc = $("#overlay img").attr("src");
                var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');
                var $prevImg = $currentImg.closest(".image").prev().find(
                    "img");

                var $images = $("#image-gallery img");
                if ($prevImg.length > 0) {
                    $("#overlay img").attr("src", $prevImg.attr("src")).fadeIn(800);
                } else {
                    $("#overlay img").attr("src", $($images[$images.length - 1]).attr("src")).fadeIn(800);
                }
                event.stopPropagation();
            });
        </script>
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
                            <h2 class="mb-1"><a
                                    href="{{ route('landing.tour.show', $trip->slug) }}">{{ $trip->name }}</a>
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

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init();
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
