<?php

namespace App\Http\Controllers;

use App\Models\AuthorizedPartne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AuthorizedPartnerRequest;

class AuthorizedPartnerController extends Controller
{
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authorizedPartners = AuthorizedPartne::all();
        return view('website.pages.authorized-partner.index', compact('authorizedPartners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('website.pages.authorized-partner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorizedPartnerRequest $request)
    {
        // dd($request->all());
        $image = $request->hasFile('image') ? Storage::url($request->image->store('public/authorized-partner')) : null;
        // dd($image);
        AuthorizedPartne::create([
            'name' => $request->name,
            'image' => $image,
        ]);
        return redirect()->route('authorized-partner.index')->with(['message' => 'Authorized Partner created successfully', 'alert-type' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(AuthorizedPartne $authorizedPartner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AuthorizedPartne $authorizedPartner)
    {

        return view('website.pages.authorized-partner.edit', compact('authorizedPartner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorizedPartnerRequest $request, AuthorizedPartne $authorizedPartner)
    {
        if ($request->hasFile('image')) {
            if ($authorizedPartner->image) {
                $filename = substr($authorizedPartner->image, 17);
                Storage::delete('public/authorized-partner/' . $filename);
            }
        }
        $image = $request->hasFile('image') ? Storage::url($request->image->store('public/authorized-partner')) : $authorizedPartner->image;
        $authorizedPartner->update([
            'image' => $image,
            'name' => $request->name,
        ]);
        return redirect()->route('authorized-partner.index')->with(['message' => 'Authorized Partner successfully', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AuthorizedPartne $authorizedPartner)
    {
        $authorizedPartner->delete();
        return redirect()->back()->with(['message' => 'Authorized Partner deleted successfully', 'alert-type' => 'success']);
    }
}
