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

    <div class="p-3 lg:p-10 font-poppins min-h-[100vh]">
        <div class="flex justify-between items-center py-3 border-b-2">
            <h1 class="text-2xl font-semibold">EXPLORE OUR TOURS</h1>
            <form action="{{ route('landing.tour') }}" method="GET" class="relative w-1/2">
                @csrf
                <input type="text" name="search" class="w-full outline-none rounded-md px-10 text-sm"
                    placeholder="search for trip here..." value="{{ request('search') }}">
                <i class="far fa-search absolute top-3.5 left-3.5"></i>
            </form>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 py-3">
            @forelse ($trips as $trip)
                <div class="card sm:rounded-lg overflow-hidden h-full flex flex-col justify-between shadow-lg">
                    <a href="{{ route('landing.tour.show', $trip->slug) }}" class="cursor-pointer">
                        <img class="w-full h-[200px] sm:rounded-tl-md sm:rounded-none rounded-t-md object-cover border-b-2"
                            src="{{ $trip->image ? asset('storage/' . $trip->image) : asset('storage/images/not_found/image_not_available.png') }}"
                            alt="{{ $trip->name }}">
                        <div class="px-6 pt-3 pb-3">
                            <h3 class="mb-3 font-bold">{{ $trip->name }}</h3>
                            <div class="ellipsis text-sm">
                                @if ($trip->description)
                                    {!! $trip->description !!}
                                @else
                                    <p>Empty description.</p>
                                @endif
                            </div>
                        </div>
                    </a>
                    <div class="px-6 pb-6">
                        <p><small>Created at {{ \Carbon\Carbon::parse($trip->updated_at)->format('j F Y, H:i') }}
                            </small></p>
                    </div>
                </div>
            @empty
                <div class="">
                    <h1 class="font-semibold">
                        {{ request('search') ? 'Trip ' . request('search') . ' not found' : 'Trip is empty.' }}</h1>
                </div>
            @endforelse
        </div>
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
