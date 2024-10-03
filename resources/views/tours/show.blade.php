<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneWayGoTrip</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/css/app.css')

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

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

        .carousel-cell {
            width: 66%;
            margin-right: 10px;
            border-radius: 5px;
        }

        ul {
            list-style: disc;
        }

        ol {
            list-style: decimal;
        }

        .tab-btn.active {
            color: black;
            border-bottom-width: 2px;
            border-color: black;
        }

        /* position dots up a bit */
        .flickity-page-dots {
            bottom: -22px;
        }

        /* dots are lines */
        .flickity-page-dots .dot {
            height: 4px;
            width: 40px;
            margin: 0;
            border-radius: 0;
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

        <ul class="hidden sm:flex gap-10 items-center font-semibold list-none">
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
                        src="{{ $company_profile->blue_logo ? asset('storage/' . $company_profile->blue_logo) : asset('storage/images/not_found/image_not_available.png') }}"
                        alt="" class="w-1/2 py-3 border-b-2 mx-auto"></a>
                <i class="fas fa-times text-black text-2xl absolute top-5 right-5" id="hamburgerMenuCloseTrigger"></i>
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
        <div class="p-3 md:p-10 flex flex-col lg:flex-row gap-6">
            <!-- Deskripsi Section (dipindah ke atas pada tampilan mobile) -->
            <div class="w-full lg:w-1/3 lg:order-1">
                <div class="rounded-lg bg-[#f5f5f5] p-2 h-fit mb-3">
                    <div class="w-full bg-white rounded-md p-4">
                        <h1 class="font-bold text-2xl mb-3">{{ $trip->name }}</h1>
                        <div class="px-3">
                            <h1 class="text-base font-semibold text-[rgba(0,0,0,0.5)]">Description</h1>
                            <p class="text-sm">{!! $trip->description ? $trip->description : 'Description is empty.' !!}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carousel Section -->
            <div class="w-full lg:w-2/3 mb-6 lg:mb-0">
                <img id="heroImg"
                    src="{{ $trip->image ? asset('storage/' . $trip->image) : asset('storage/images/not_found/image_not_available.png') }}"
                    alt="" class="w-full max-h-[75vh] object-cover rounded-lg mb-3">

                <div class="main-carousel" data-flickity='{ "autoPlay": true }'>
                    @foreach ($trip_images as $image)
                        <div class="carousel-cell h-[150px] md:h-[200px] lg:h-[250px] overflow-hidden rounded-lg">
                            <img class="img-detail hover:scale-105 duration-300 object-cover"
                                src="{{ asset('storage/' . $image->image) }}" alt="">
                        </div>
                    @endforeach
                </div>
                @if ($trip_images->isEmpty())
                    <div class="py-10">
                        <p class="text-center"><strong>We apologize, we currently do not have trip detail
                                images.</strong></p>
                    </div>
                @endif

                <div class="flex space-x-4 border-b">
                    @forelse ($trip->packages as $package)
                        <button id="tab{{ $trip->id }}-{{ $package->id }}-btn"
                            class="tab-btn relative py-2 px-1.5 text-sm text-gray-600 hover:text-black transition duration-300 focus:outline-none"
                            data-tab="#tab{{ $trip->id }}-{{ $package->id }}-content">
                            {{ $package->name }}
                            <span
                                class="absolute left-0 bottom-0 w-full h-0.5 bg-transparent hover:bg-black transition duration-300"></span>
                        </button>
                    @empty
                        <strong class="py-2">Trip package is empty.</strong>
                    @endforelse
                </div>

                @foreach ($trip->packages as $package)
                    <div id="tab{{ $trip->id }}-{{ $package->id }}-content" class="tab-content hidden py-3">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div class="flex flex-col w-full space-y-4">
                                <div>
                                    <strong class="text-[rgba(0,0,0,0.5)]">Price:</strong>
                                    <div>
                                        {!! $package->pivot->price !!}
                                    </div>
                                </div>
                                <div>
                                    <strong class="text-[rgba(0,0,0,0.5)]">What Will You Get:</strong>
                                    <div>
                                        {!! $package->pivot->include !!}
                                    </div>
                                </div>
                                <div>
                                    <strong class="text-[rgba(0,0,0,0.5)]">Exclusion:</strong>
                                    <div>
                                        {!! $package->pivot->exclude !!}
                                    </div>
                                </div>
                                @if ($package->pivot->notes)
                                    <div>
                                        <strong class="text-[rgba(0,0,0,0.5)]">Notes:</strong>
                                        <div>
                                            {!! $package->pivot->notes !!}
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="flex flex-col w-full h-full">
                                <strong class="text-[rgba(0,0,0,0.5)]">Itinerary:</strong>
                                <div class="h-full">
                                    {!! $package->pivot->itinerary !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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
                        @forelse ($trips->take(10) as $trip)
                            <h2><a href="{{ route('landing.tour.show', $trip->slug) }}">{{ $trip->name }}</a>
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
                        <h2><a href="/#about_us">About Us</a></h2>
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

    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.tab-content').hide();
            $('.tab-content').first().show();
            $('.tab-btn').first().addClass('active border-b-2 border-black text-black');
            $('button[id^="tab"]').click(function() {
                var tabId = $(this).attr('id');
                $('.tab-content').hide();
                $('#' + tabId.replace('-btn', '-content')).show();
                $('.tab-btn').removeClass('active border-b-2 border-black text-black');
                $(this).addClass('active border-b-2 border-black text-black');
            });
        });

        $(document).ready(function() {
            $('.main-carousel').flickity({
                cellAlign: 'left',
                contain: true,
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

        var originalSrc = $('#heroImg').attr('src');

        $('.carousel-cell').on('mouseenter', function() {
            var newSrc = $(this).find('img').attr('src');
            $('#heroImg').attr('src', newSrc);
        });

        $('.carousel-cell').on('mouseleave', function() {
            $('#heroImg').attr('src', originalSrc);
        });
    </script>
</body>

</html>
