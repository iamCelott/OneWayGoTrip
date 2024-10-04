<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSocialMediaRequest;
use App\Http\Requests\UpdateSocialMediaRequest;
use App\Models\SocialMedia;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $social_media = SocialMedia::all();
        return view('pages.social_media.index', compact('social_media'));
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
    public function store(StoreSocialMediaRequest $request)
    {
        $iconPath = $request->icon->store('social_media_icons', 'public');

        SocialMedia::create([
            'icon' => $iconPath,
            'url' => $request->url,
        ]);

        return redirect()->route('social_media.index')->with('success', 'Success created social media.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SocialMedia $socialMedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SocialMedia $socialMedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSocialMediaRequest $request, SocialMedia $socialMedia)
    {
        if ($request->icon) {

            $oldIconPath = storage_path('app/public/' . $socialMedia->icon);

            if (file_exists($oldIconPath) && is_file($oldIconPath)) {
                unlink($oldIconPath);
            }

            $iconPath = $request->icon->store('social_media_icons', 'public');

            $socialMedia->update([
                'icon' => $iconPath,
                'url' => $request->url,
            ]);
        } else {
            $socialMedia->update([
                'url' => $request->url,
            ]);
        }

        return redirect()->route('social_media.index')->with('success', 'Success updated social media.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SocialMedia $socialMedia)
    {
        $iconPath = storage_path('app/public/' . $socialMedia->icon);

        if (file_exists($iconPath) && is_file($iconPath)) {
            unlink($iconPath);
        }

        $socialMedia->delete();
        return redirect()->route('social_media.index')->with('success', 'Success deleted social media.');
    }
}
