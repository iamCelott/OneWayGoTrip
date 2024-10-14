@extends('layouts.app')

@section('content')
    <style>
        ul {
            list-style: disc;
        }

        ol {
            list-style: decimal;
        }

        .carousel-cell {
            margin-right: 10px;
            border-radius: 5px;
        }

        .flickity-page-dots {
            display: none
        }

        .flickity-page-dots .dot {
            display: none
        }
    </style>

    <div class="lg:flex gap-3">
        <div class="w-full lg:w-1/3 lg:order-1">
            <div class="rounded-lg bg-[#f5f5f5] p-2 h-fit mb-3">
                <div class="w-full bg-white rounded-md p-6">
                    <h1 class="font-semibold text-xl">{{ $trip->name }}</h1>
                    <h1 class="text-lg font-semibold mb-3 text-[#0097b2]">{{ $trip->category->name }}</h1>
                    <div class="">
                        <h1 class="text-base font-semibold text-[rgba(0,0,0,0.5)]">Description</h1>
                        <p class="text-sm">{!! $trip->description ? $trip->description : 'Description is empty.' !!}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-2/3 mb-3">
            <img class="w-full rounded-lg h-[250px] md:h-[400px] mb-3"
                src="{{ $trip->image ? asset('storage/' . $trip->image) : asset('storage/images/not_found/image_not_available.png') }}"
                alt="">

            @if ($trip_images->isNotEmpty())
                <div class="main-carousel" data-flickity='{ "autoPlay": true }'>
                    @foreach ($trip_images as $image)
                        <div class="carousel-cell overflow-hidden">
                            <img class="img-detail w-52 h-[140px] hover:scale-105 duration-300 object-bottom"
                                src="{{ asset('storage/' . $image->image) }}" alt="">
                        </div>
                    @endforeach
                </div>
            @endif
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
                    <h2 class="text-center py-3">
                        <strong>Trip package is empty.</strong>
                    </h2>
                @endforelse
            </div>

            @foreach ($trip->packages as $package)
                <div id="tab{{ $trip->id }}-{{ $package->id }}-content" class="tab-content hidden py-3">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        <div class="flex flex-col w-full space-y-4">
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
                            <div class="h-full px-4">
                                {!! $package->pivot->itinerary !!}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
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
                pageDots: false,
                contain: true,
            });
        });
    </script>
@endsection
