<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
  

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('website.pages.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('website.pages.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        // dd($request->all());
        $image = $request->hasFile('image') ? Storage::url($request->image->store('public/product')) : null;
        // dd($image);
        Product::create([
            'product_name' => $request->product_name,
            'old_price' => $request->old_price,
            'new_price' => $request->new_price,
            'weight' => $request->weight,
            'description' => $request->description,
            'image' => $image,
            'category_id' => $request->category_id,
        ]);
        return redirect()->route('product.index')->with(['message' => 'Product created successfully', 'alert-type' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $selectedCategory = Category::find($product->category_id);
        $categories = Category::all();
        return view('website.pages.product.edit', compact('product', 'categories', 'selectedCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        if ($request->hasFile('image')) {
            if ($product->image) {
                $filename = substr($product->image, 17);
                Storage::delete('public/product/' . $filename);
            }
        }
        $image = $request->hasFile('image') ? Storage::url($request->image->store('public/product')) : $product->image;
        $product->update([
            'product_name' => $request->product_name,
            'old_price' => $request->old_price,
            'new_price' => $request->new_price,
            'weight' => $request->weight,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'image' => $image,
        ]);
        return redirect()->route('product.index')->with(['message' => 'Product updated successfully', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with(['message' => 'Product deleted successfully', 'alert-type' => 'success']);
    }
       public function productDetails($productId)
    {
        $productDetails = Product::findOrfail($productId);
        // dd($review);
        return view('frontend.pages.product-details', compact('productDetails'));
    }
}
