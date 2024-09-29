<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\HeroBackground;
use App\Models\SocialMedia;
use App\Models\Trip;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $social_media = SocialMedia::all();
        $company_profile = CompanyProfile::first();
        $contacts = Contact::all();
        $trips = Trip::latest()->get();
        $hero_backgrounds = HeroBackground::all();
        $galleries = Gallery::latest()->get();
        return view('home', compact('trips', 'social_media', 'contacts', 'hero_backgrounds', 'galleries', 'company_profile'));
    }

    public function tours(Request $request)
    {
        $social_media = SocialMedia::all();
        $contacts = Contact::all();
        $company_profile = CompanyProfile::first();

        $search = $request->search;
        $trips = Trip::query()->when($search, function ($query) use ($search) {
            $query->whereLike('name', '%' . $search . '%');
        })->latest()->get();

        return view('tours.index', compact('trips', 'social_media', 'contacts', 'company_profile'));
    }

    public function tour_show(string $slug)
    {
        $social_media = SocialMedia::all();
        $contacts = Contact::all();
        $trip = Trip::where('slug', $slug)->firstOrFail();
        return view('tours.show', compact('trip', 'social_media', 'contacts'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
