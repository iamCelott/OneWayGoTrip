<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CompanyProfile;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\HeroBackground;
use App\Models\Package;
use App\Models\SocialMedia;
use App\Models\Trip;
use App\Models\TripImage;
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
        $trips = Trip::orderByRaw("
        CASE
            WHEN name LIKE 'SUPERIOR%' THEN 1
            WHEN name LIKE 'DELUXE%' THEN 2
            WHEN name LIKE 'LUXURY%' THEN 3
            ELSE 4
        END
    ")->latest()->get();
        $hero_backgrounds = HeroBackground::all();
        $galleries = Gallery::latest()->get();
        $showed_contacts = Contact::where('show_hero', true)->get();
        return view('home', compact('showed_contacts', 'trips', 'social_media', 'contacts', 'hero_backgrounds', 'galleries', 'company_profile'));
    }

    public function tours(Request $request)
    {
        $social_media = SocialMedia::all();
        $contacts = Contact::all();
        $company_profile = CompanyProfile::first();
        $categories = Category::all();
        $packages = Package::all();

        $search = $request->search;
        $filterPackage = $request->filterPackage;
        $filterCategory = $request->filterCategory;
        $showed_contacts = Contact::where('show_hero', true)->get();

        $trips = Trip::with(relations: ['packages', 'trip_images', 'category'])
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->when($filterPackage, function ($query) use ($filterPackage) {
                $query->whereHas('packages', function ($query) use ($filterPackage) {
                    $query->where('packages.id', $filterPackage);
                });
            })
            ->when($filterCategory, function ($query) use ($filterCategory) {
                $query->where('category_id', $filterCategory);
            })
            ->orderByRaw("
            CASE
                WHEN name LIKE 'SUPERIOR%' THEN 1
                WHEN name LIKE 'DELUXE%' THEN 2
                WHEN name LIKE 'LUXURY%' THEN 3
                ELSE 4
            END
        ")
            ->latest()->get();

        return view('tours.index', compact('categories', 'packages', 'trips', 'social_media', 'contacts', 'company_profile', 'showed_contacts'));
    }

    public function tour_show(string $slug)
    {
        $social_media = SocialMedia::all();
        $contacts = Contact::all();
        $trip = Trip::where('slug', $slug)->firstOrFail();
        $trip_images = TripImage::where('trip_id', $trip->id)->get();
        $company_profile = CompanyProfile::first();
        $trips = Trip::orderByRaw("
        CASE
            WHEN name LIKE 'SUPERIOR%' THEN 1
            WHEN name LIKE 'DELUXE%' THEN 2
            WHEN name LIKE 'LUXURY%' THEN 3
            ELSE 4
        END
    ")
            ->latest()->get();
        $showed_contacts = Contact::where('show_hero', true)->get();
        return view('tours.show', compact('trips', 'trip', 'social_media', 'contacts', 'company_profile', 'trip_images', 'showed_contacts'));
    }

    public function galleries()
    {
        $social_media = SocialMedia::all();
        $contacts = Contact::all();
        $company_profile = CompanyProfile::first();
        $galleries = Gallery::latest()->get();
        $trips = Trip::orderByRaw("
        CASE
            WHEN name LIKE 'SUPERIOR%' THEN 1
            WHEN name LIKE 'DELUXE%' THEN 2
            WHEN name LIKE 'LUXURY%' THEN 3
            ELSE 4
        END
    ")
            ->latest()->get();
        $showed_contacts = Contact::where('show_hero', true)->get();
        return view('gallery', compact('trips', 'social_media', 'contacts', 'company_profile', 'galleries', 'showed_contacts'));
    }

    public function contact_show(string $name)
    {
        $social_media = SocialMedia::all();
        $contacts = Contact::all();
        $contact = Contact::where('name', $name)->firstOrFail();
        $company_profile = CompanyProfile::first();
        $trips = Trip::orderByRaw("
        CASE
            WHEN name LIKE 'SUPERIOR%' THEN 1
            WHEN name LIKE 'DELUXE%' THEN 2
            WHEN name LIKE 'LUXURY%' THEN 3
            ELSE 4
        END
    ")
            ->latest()->get();
        return view('contact_show', compact('contact', 'social_media', 'contacts', 'company_profile', 'trips'));
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
