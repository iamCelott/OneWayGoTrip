@extends('layouts.app')

@section('content')

    <div class="bg-[#f5f5f5] w-full flex flex-col sm:flex-row justify-between sm:items-center shadow-lg p-6 rounded-lg mb-3">
        <h1 class="text-2xl font-bold text-black mb-3 sm:m-0">TRIP</h1>
        <div class="relative w-full sm:w-1/2">
            <i class="far fa-search absolute left-3 top-3.5"></i>
            <input type="text" class="px-9 outline-none rounded-lg text-sm w-full" placeholder="search trip here...">
        </div>
    </div>

    <div class="grid sm:grid-cols-3 gap-6 sm:gap-3">
        <div class="card sm:rounded-none sm:rounded-s-md h-full">
            <img class="w-full h-auto sm:rounded-tl-md sm:rounded-none rounded-t-md" src="assets/images/small/small-1.jpg"
                alt="Image Description">
            <div class="p-6">
                <h3 class="card-title mb-4">Card title</h3><!-- end card title -->
                <p class="mt-1 text-gray-800 dark:text-gray-400">This is a wider card with supporting text below as a
                    natural
                    lead-in to additional content. This content is a little bit longer.</p>
                <p class="mt-5 pb-5"><small>Last updated 3 mins ago</small></p>
            </div>
        </div><!-- Card End -->

        <div class="card sm:rounded-none h-full">
            <img class="w-full h-auto sm:rounded-none rounded-md" src="assets/images/small/small-2.jpg"
                alt="Image Description">
            <div class="p-6">
                <h3 class="card-title mb-4">Card title</h3><!-- end card title -->
                <p class="mt-1 text-gray-800 dark:text-gray-400">This card has supporting text below as a natural lead-in to
                    additional content.</p>
                <p class="mt-5 pb-5"><small>Last updated 3 mins ago</small></p>
            </div>
        </div><!-- Card End -->

        <div class="card sm:rounded-none sm:rounded-e-md h-full">
            <img class="w-full h-auto sm:rounded-tr-md sm:rounded-none rounded-t-md" src="assets/images/small/small-3.jpg"
                alt="Image Description">
            <div class="p-6">
                <h3 class="card-title mb-4">Card title</h3><!-- end card title -->
                <p class="mt-1 text-gray-800 dark:text-gray-400">This is a wider card with supporting text below as a
                    natural lead-in to additional content. This card has even longer content than the first to show that
                    equal height action.</p>
                <p class="mt-5"><small>Last updated 3 mins ago</small></p>
            </div>
        </div><!-- Card End -->
    </div>
@endsection
