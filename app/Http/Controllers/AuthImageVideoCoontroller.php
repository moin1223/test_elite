<?php

namespace App\Http\Controllers;

use App\Models\AuthImageVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthImageVideoCoontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataCollection = AuthImageVideo::all();
        return view('website.pages.auth-image-video.index', compact('dataCollection'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('website.pages.auth-image-video.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $image = $request->hasFile('image') ? Storage::url($request->image->store('public/slider')) : null;
        // dd($image);
        AuthImageVideo::create([
            'video_url' => $request->video_url,
            'image' => $image,
        ]);
        return redirect()->route('auth-image-video.index')->with(['message' => 'Auth image Video created successfully', 'alert-type' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(AuthImageVideo $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AuthImageVideo $AuthImageVideo)
    {
        // dd($AuthImageVideo);
        return view('website.pages.auth-image-video.edit', compact('AuthImageVideo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AuthImageVideo $AuthImageVideo)
    {
        if ($request->hasFile('image')) {
            if ($AuthImageVideo->image) {
                $filename = substr($AuthImageVideo->image, 17);
                Storage::delete('public/auth-image-video/' . $filename);
            }
        }
        $image = $request->hasFile('image') ? Storage::url($request->image->store('public/auth-image-video')) : $AuthImageVideo->image;
        $AuthImageVideo->update([
            'video_url' => $request->video_url,
            'image' => $image,
        ]);
        return redirect()->route('auth-image-video.index')->with(['message' => 'Auth image Video updated successfully', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AuthImageVideo $authImageVideo)
    {
        $authImageVideo->delete();
        return redirect()->back()->with(['message' => 'Auth image Video  deleted successfully', 'alert-type' => 'success']);
    }
}
