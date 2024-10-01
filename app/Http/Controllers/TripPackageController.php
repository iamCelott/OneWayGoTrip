<?php

namespace App\Http\Controllers;

use App\Http\Requests\TripPackageRequest;
use App\Models\Package;
use App\Models\Trip;
use App\Models\TripPackage;
use Illuminate\Http\Request;

class TripPackageController extends Controller
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
    public function store(TripPackageRequest $request)
    {
        $trip = Trip::find($request->trip_id);
        $package_id = Package::find($request->package_id)->id;

        $pivotData = [
            'price' => $request->price,
            'include' => $request->include,
            'exclude' => $request->exclude,
            'destination' => $request->destination,
            'notes' => $request->notes,
        ];

        $trip->packages()->attach($package_id, $pivotData);

        return redirect()->back()->with('success', 'Success set package.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TripPackage $tripPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TripPackage $tripPackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TripPackage $tripPackage)
    {
        $validatedData = $request->validate([
            'price' => 'required|string',
            'include' => 'required|string',
            'exclude' => 'required|string',
            'destination' => 'required|string',
            'notes' => 'nullable|string'
        ]);

        $tripPackage->update($validatedData);

        return redirect()->back()->with('success', 'Success updated package details.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TripPackage $tripPackage)
    {
        $tripPackage->delete();
        return redirect()->back()->with('success', 'Success removed package');
    }
}
