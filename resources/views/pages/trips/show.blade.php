@extends('layouts.app')

@section('content')
    <div class="flex">
        <div class="w-2/3">
            <img class="h-full object-cover"
                src="{{ $trip->image ? asset('storage/' . $trip->image) : asset('storage/images/not_found/image_not_available.png') }}"
                alt="">
        </div>
        <div class="w-1/3">
            <div class="gap-3">
                <div class="bg-red-300 w-full h-full">
                    <div class="p-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis eligendi quas, blanditiis fuga enim provident ipsam, pariatur nesciunt eos praesentium ipsa unde ullam excepturi cumque in consequatur aspernatur? Deserunt, ut.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
