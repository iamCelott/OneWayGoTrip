<?php

namespace App\Http\Controllers;

use App\Models\TripImage;
use Illuminate\Http\Request;

class TripImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $images = $request->images;
        $imagePath = $images->store('trip_detail_images', 'public');

        TripImage::create([
            'trip_id' => $request->trip_id,
            'image' => $imagePath,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(TripImage $tripImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TripImage $tripImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TripImage $tripImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TripImage $tripImage)
    {
        //
    }
}
