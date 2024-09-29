<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company_profile = CompanyProfile::latest()->first();
        return view('pages.company_profile.index', compact('company_profile'));
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
    public function show(CompanyProfile $companyProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyProfile $companyProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompanyProfile $companyProfile)
    {
        if ($request->hasFile('white_logo')) {
            if ($companyProfile->white_logo && Storage::exists($companyProfile->white_logo)) {
                Storage::delete($companyProfile->white_logo);
            }
    
            $whiteLogoPath = $request->file('white_logo')->store('logos', 'public');
            $companyProfile->white_logo = $whiteLogoPath;
        }
    
        if ($request->hasFile('colored_logo')) {
            if ($companyProfile->colored_logo && Storage::exists($companyProfile->colored_logo)) {
                Storage::delete($companyProfile->colored_logo);
            }
    
            $coloredLogoPath = $request->file('colored_logo')->store('logos', 'public');
            $companyProfile->colored_logo = $coloredLogoPath;
        }
    
        if ($request->hasFile('raw_logo')) {
            if ($companyProfile->raw_logo && Storage::exists($companyProfile->raw_logo)) {
                Storage::delete($companyProfile->raw_logo);
            }
    
            $rawLogoPath = $request->file('raw_logo')->store('logos', 'public');
            $companyProfile->raw_logo = $rawLogoPath;
        }
        $companyProfile->name = $request->name;
        $companyProfile->about_us = $request->about_us;
        $companyProfile->address = $request->address;
        $companyProfile->save();

        return redirect()->route('company_profile.index')->with('success', 'Success updated company profile.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyProfile $companyProfile)
    {
        //
    }
}
