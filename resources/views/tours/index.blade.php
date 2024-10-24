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
    </style>
</head>

<body>
    <div class="fixed z-50 bottom-5 right-5">
        @foreach ($showed_contacts as $contact)
            @if ($contact->has_qrcode == true)
                <a href="{{ route('landing.contact_show', $contact->name) }}" target="_blank">
                    <img src="{{ asset('storage/' . $contact->logo) }}" alt=""
                        class="w-12 h-12 rounded-lg mb-3">
                </a>
            @else
                <a href="{{ $contact->url }}" target="_blank">
                    <img src="{{ asset('storage/' . $contact->logo) }}" alt=""
                        class="w-12 h-12 rounded-lg mb-3">
                </a>
            @endif
        @endforeach
    </div>
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
        <div class="lg:flex justify-between items-center py-3 border-b-2">
            <h1 class="text-2xl font-semibold mb-3 lg:mb-0">EXPLORE OUR TOURS</h1>
            <form action="{{ route('landing.tour') }}" method="GET" class="md:flex gap-2" id="search_filter_form">
                <div class="relative flex-grow mb-3 md:mb-0">
                    @csrf
                    <input type="search" name="search" class="w-full outline-none rounded-md px-10 text-base"
                        placeholder="search..." value="{{ request('search') }}">
                    <i class="far fa-search absolute top-3.5 left-3.5"></i>
                </div>
                <div class="flex gap-3">
                    <select class="rounded-md flex-grow" id="category_id" name="filterCategory"
                        onchange="document.getElementById('search_filter_form').submit();">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request('filterCategory') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    <select class="rounded-md flex-grow" id="package_id" name="filterPackage"
                        onchange="document.getElementById('search_filter_form').submit();">
                        @foreach ($packages as $package)
                            <option value="{{ $package->id }}"
                                {{ request('filterPackage') == $package->id ? 'selected' : '' }}>
                                {{ $package->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 py-3">
            @forelse ($trips as $trip)
                <div class="card sm:rounded-lg overflow-hidden h-full flex flex-col justify-between shadow-lg">
                    <a href="{{ route('landing.tour.show', $trip->slug) }}" class="cursor-pointer">
                        <img class="w-full h-[250px] lg:h-[200px] xl:h-[275px] 2xl:h-[300px] sm:rounded-tl-md sm:rounded-none rounded-t-md border-b-2"
                            src="{{ $trip->image ? asset('storage/' . $trip->image) : asset('storage/images/not_found/image_not_available.png') }}"
                            alt="{{ $trip->name }}">
                        <div class="p-3">
                            <h1 class="text-lg font-bold">{{ $trip->name }}</h1>
                            <h3 class="font-semibold text-[#0097b2]">{{ $trip->category->name }}</h3>
                            {{-- <div class="ellipsis text-sm">
                                @if ($trip->description)
                                    {!! $trip->description !!}
                                @else
                                    <p>Empty description.</p>
                                @endif
                            </div> --}}
                            <p><small>Created at {{ \Carbon\Carbon::parse($trip->updated_at)->format('j F Y, H:i') }}
                                </small></p>
                        </div>
                    </a>
                </div>
            @empty
                <div class="">
                    <h1 class="font-semibold">
                        {{ request('search') ? 'Trip ' . request('search') . ' not found' : 'Trip is empty.' }}</h1>
                </div>
            @endforelse
        </div>
    </div>

    <div id="footer" class="w-full bg-[#efefef] py-3">
        <div class="p-6 flex flex-col lg:flex-row gap-10 lg:gap-3 mb-3 container mx-auto">
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

    <script>
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
