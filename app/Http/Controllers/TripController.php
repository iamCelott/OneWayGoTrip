<?php

namespace App\Http\Controllers;

use App\Http\Requests\TripRequest;
use App\Models\Trip;
use Illuminate\Http\Request;
use App\Helpers\SlugHelper;
use App\Models\Package;
use Illuminate\Support\Facades\Storage;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $trips = Trip::query()->when($search, function ($query, $search) {
            return $query->where('name', 'LIKE', '%' . $search . '%');
        })->latest()->paginate(6);

        $packages = Package::all();
        return view('pages.trips.index', compact('trips', 'packages'));
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
    public function store(TripRequest $request)
    {
        if ($request->image) {
            $imagePath = $request->image->store('trip_images', 'public');
            Trip::create([
                'image' => $imagePath,
                'name' => $request->name,
                'description' => $request->description,
                'slug' => SlugHelper::generateSlug($request->name),
            ]);
        } else {
            Trip::create([
                'name' => $request->name,
                'description' => $request->description,
                'slug' => SlugHelper::generateSlug($request->name),
            ]);
        }

        return redirect()->route('trips.index')->with('success', 'Success created trip.');
    }

    /**
     * Display the specified resource.
     */
    public function setpackage(Trip $trip)
    {
        $existingPackageIds = $trip->packages()->pluck('package_id');
        $packages = Package::whereNotIn('id', $existingPackageIds)->get();
        return view('pages.trips.setpackage', compact('trip', 'packages'));
    }

    public function show(Trip $trip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trip $trip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TripRequest $request, Trip $trip)
    {
        if ($request->image) {

            $oldImagePath = storage_path('app/public/' . $trip->image);

            if (file_exists($oldImagePath) && is_file($oldImagePath)) {
                unlink($oldImagePath);
            }

            $imagePath = $request->image->store('trip_images', 'public');

            $trip->update([
                'image' => $imagePath,
                'name' => $request->name,
                'description' => $request->description,
                'slug' => SlugHelper::generateSlug($request->name),
            ]);
        } else {
            $trip->update([
                'name' => $request->name,
                'description' => $request->description,
                'slug' => SlugHelper::generateSlug($request->name),
            ]);
        }

        return redirect()->route('trips.index')->with('success', 'Success updated trip.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trip $trip)
    {
        $imagePath = storage_path('app/public/' . $trip->image);

        if (file_exists($imagePath) && is_file($imagePath)) {
            unlink($imagePath);
        }

        $trip->delete();
        return redirect()->route('trips.index')->with('success', 'Success deleted trip.');
    }
}
