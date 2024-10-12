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
        $iconPath = null;
        $logoPath = null;
        $qrCodePath = null;

        if ($request->hasFile('logo')) {
            $logoPath = $request->logo->store('contact_logos', 'public');
        }

        if ($request->hasFile('icon')) {
            $iconPath = $request->icon->store('contact_icons', 'public');
        }

        if ($request->hasFile('qr_code')) {
            $qrCodePath = $request->qr_code->store('contact_qrcodes', 'public');
        }

        Contact::create([
            'logo' => $logoPath,
            'icon' => $iconPath,
            'name' => $request->name,
            'url' => $request->url,
            'has_qrcode' => $request->has_qrcode,
            'qr_code' => $qrCodePath,
            'show_hero' => $request->show_hero,
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
        $contact->name = $request->name;
        $contact->url = $request->url;
        $contact->has_qrcode = $request->has_qrcode;
        $contact->show_hero = $request->show_hero;

        if ($request->has('logo')) {
            $oldLogoPath = storage_path('app/public/' . $contact->logo);

            if (file_exists($oldLogoPath) && is_file($oldLogoPath)) {
                unlink($oldLogoPath);
            }
            $logoPath = $request->logo->store('contact_logos', 'public');
            $contact->logo = $logoPath;
        }

        if ($request->has('icon')) {
            $oldIconPath = storage_path('app/public/' . $contact->icon);

            if (file_exists($oldIconPath) && is_file($oldIconPath)) {
                unlink($oldIconPath);
            }
            $iconPath = $request->icon->store('contact_icons', 'public');
            $contact->icon = $iconPath;
        }

        if ($request->has('qr_code')) {
            $oldQrCodePath = storage_path('app/public/' . $contact->qr_code);

            if (file_exists($oldQrCodePath) && is_file($oldQrCodePath)) {
                unlink($oldQrCodePath);
            }

            $qrCodePath = $request->qr_code->store('contact_qrcodes', 'public');
            $contact->qr_code = $qrCodePath;
        }

        $contact->save();

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

        $logoPath = storage_path('app/public/' . $contact->logo);

        if (file_exists($logoPath) && is_file($logoPath)) {
            unlink($logoPath);
        }

        $qrCodePath = storage_path('app/public/' . $contact->qr_code);

        if (file_exists($qrCodePath) && is_file($qrCodePath)) {
            unlink($qrCodePath);
        }

        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Success deleted contact.');
    }
}
