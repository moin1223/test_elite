<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('website.pages.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('website.pages.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        // dd($request->all());
        $image = $request->hasFile('image') ? Storage::url($request->image->store('public/slider')) : null;
        // dd($image);
        Slider::create([
            'slider_name' => $request->slider_name,
            'image' => $image,
        ]);
        return redirect()->route('slider.index')->with(['message' => 'Slider created successfully', 'alert-type' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('website.pages.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderRequest $request, Slider $slider)
    {
        if ($request->hasFile('image')) {
            if ($slider->image) {
                $filename = substr($slider->image, 17);
                Storage::delete('public/slider/' . $filename);
            }
        }
        $image = $request->hasFile('image') ? Storage::url($request->image->store('public/product')) : $slider->image;
        $slider->update([
            'slider_name' => $request->slider_name,
            'image' => $image,
        ]);
        return redirect()->route('slider.index')->with(['message' => 'Slider updated successfully', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->back()->with(['message' => 'Slider deleted successfully', 'alert-type' => 'success']);
    }
}
