<?php

namespace App\Http\Controllers;

use App\Http\Requests\HeroBackgroundRequest;
use App\Models\HeroBackground;
use Illuminate\Http\Request;

class HeroBackgroundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hero_backgrounds = HeroBackground::all();
        return view('pages.hero_backgrounds.index', compact('hero_backgrounds'));
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
    public function store(HeroBackgroundRequest $request)
    {
        $imagePath = $request->image->store('hero_background_images', 'public');
        HeroBackground::create([
            'image' => $imagePath,
        ]);
        return redirect()->route('hero_backgrounds.index')->with('success', 'Success created background.');
    }

    /**
     * Display the specified resource.
     */
    public function show(HeroBackground $heroBackground)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HeroBackground $heroBackground)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HeroBackground $heroBackground)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HeroBackground $heroBackground)
    {
        $imagePath = storage_path('app/public/' . $heroBackground->image);

        if (file_exists($imagePath) && is_file($imagePath)) {
            unlink($imagePath);
        }

        $heroBackground->delete();
        return redirect()->route('hero_backgrounds.index')->with('success', 'Success deleted hero background.');
    }
}
