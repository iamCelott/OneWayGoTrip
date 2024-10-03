<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('pages.galleries.index', compact('galleries'));
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
        $image = $request->images;
        $imagePath = $image->store('gallery_images', 'public');

        Gallery::create([
            'image' => $imagePath,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        //
    }

    public function destroy_multiple(Request $request)
    {
        $imageId = $request->input('image_id');

        $images = Gallery::whereIn('id', $imageId)->get();

        foreach ($images as $image) {
            $imagePath = storage_path('app/public/' . $image->image);

            if (file_exists($imagePath) && is_file($imagePath)) {
                unlink($imagePath);
            }

            $image->delete();
        }
        return redirect()->route('galleries.index')->with('success', 'Success delete selected image.');
    }
}
