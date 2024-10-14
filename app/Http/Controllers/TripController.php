<?php

namespace App\Http\Controllers;

use App\Http\Requests\TripRequest;
use App\Models\Trip;
use Illuminate\Http\Request;
use App\Helpers\SlugHelper;
use App\Models\Category;
use App\Models\Package;
use App\Models\TripImage;
use Illuminate\Support\Facades\Storage;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $classOrder = ['SUPERIOR', 'DELUXE', 'LUXURY'];

        $trips = Trip::with(['packages', 'trip_images', 'category'])
            ->when($search, function ($query, $search) {
                return $query->where('name', 'LIKE', '%' . $search . '%');
            })
            ->orderByRaw("
            CASE
                WHEN name LIKE 'SUPERIOR%' THEN 1
                WHEN name LIKE 'DELUXE%' THEN 2
                WHEN name LIKE 'LUXURY%' THEN 3
                ELSE 4
            END
        ")
            ->latest()
            ->paginate(9);

        $packages = Package::all();
        $categories = Category::all();
        return view('pages.trips.index', compact('trips', 'packages', 'categories'));
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
                'category_id' => $request->category_id,
                'description' => $request->description,
                'slug' => SlugHelper::generateSlug($request->name),
            ]);
        } else {
            Trip::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
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

    public function setimage(Trip $trip)
    {
        $trip_images = TripImage::where('trip_id', $trip->id)->latest()->get();
        return view('pages.trips.setimage', compact('trip_images', 'trip'));
    }

    public function deleteimage(Request $request, Trip $trip)
    {
        if (!$request->has('image_id')) {
            return redirect()->route('galleries.index')->with('error', 'No images selected.');
        }

        $imageId = $request->input('image_id');

        $images = TripImage::whereIn('id', $imageId)->get();

        foreach ($images as $image) {
            $imagePath = storage_path('app/public/' . $image->image);

            if (file_exists($imagePath) && is_file($imagePath)) {
                unlink($imagePath);
            }

            $image->delete();
        }

        return redirect()->back()->with('success', 'Success deleted image.');
    }

    public function show(Trip $trip)
    {
        $trip_images = TripImage::where('trip_id', $trip->id)->latest()->get();
        return view('pages.trips.show', compact('trip', 'trip_images'));
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
                'category_id' => $request->category_id,
                'description' => $request->description,
                'slug' => SlugHelper::generateSlug($request->name),
            ]);
        } else {
            $trip->update([
                'name' => $request->name,
                'category_id' => $request->category_id,
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
