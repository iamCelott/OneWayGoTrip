<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('pages.contacts.index', compact('contacts'));
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
    public function store(StoreContactRequest $request)
    {
        $iconPath = $request->icon->store('contact_icons', 'public');

        Contact::create([
            'icon' => $iconPath,
            'name' => $request->name,
        ]);

        return redirect()->route('contacts.index')->with('success', 'Success created contact.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        if ($request->icon) {

            $oldIconPath = storage_path('app/public/' . $contact->icon);

            if (file_exists($oldIconPath) && is_file($oldIconPath)) {
                unlink($oldIconPath);
            }

            $iconPath = $request->icon->store('contact_icons', 'public');

            $contact->update([
                'icon' => $iconPath,
                'name' => $request->name,
            ]);
        } else {
            $contact->update([
                'name' => $request->name,
            ]);
        }

        return redirect()->route('contacts.index')->with('success', 'Success updated contact.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $iconPath = storage_path('app/public/' . $contact->icon);

        if (file_exists($iconPath) && is_file($iconPath)) {
            unlink($iconPath);
        }

        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Success deleted contact.');
    }
}
