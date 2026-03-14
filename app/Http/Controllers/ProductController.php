<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $products = Product::all();
    return view('all-products', compact('products'));
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
    $image = $request->file('product_image');
    if ($image) {
      $imageName = time() . '_' . $image->getClientOriginalName();
      $image->move(public_path('images'), $imageName);
    } else {
      $imageName = null; // No image uploaded
    }

    // return $imageName;

    $product = new Product();
    $product->product_image = $imageName;
    $product->product_name = $request->product_name;
    $product->category = $request->category;
    $product->brand = $request->brand;
    $product->price = $request->price;
    $product->offer_price = $request->offer_price;
    $product->stock = $request->stock;
    $product->description = $request->description;
    $product->save();
    return redirect()->back()->with('success', 'প্রোডাক্ট সফলভাবে যোগ করা হয়েছে!');
  }

  /**
   * Display the specified resource.
   */
  public function show(Product $product)
  {
    return view('product-view', compact('product'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Product $product)
  {
    return view('product-update', compact('product'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Product $product)
  {
    $image = $request->file('product_image');
    if ($image) {

      if ($product->product_image) {
        $path = public_path("images/{$product->product_image}");
        if (file_exists($path)) {
          unlink($path);
        }
      }

      $imageName = time() . '_' . $image->getClientOriginalName();
      $image->move(public_path('images'), $imageName);
      $product->product_image = $imageName; // Update the image if a new one is uploaded
    }

    $product->product_name = $request->product_name;
    $product->category = $request->category;
    $product->brand = $request->brand;
    $product->price = $request->price;
    $product->offer_price = $request->offer_price;
    $product->stock = $request->stock;
    $product->description = $request->description;
    $product->update();
    return redirect()->back()->with('success', 'প্রোডাক্ট সফলভাবে আপডেট করা হয়েছে!');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Product $product)
  {
    if ($product->product_image) {
      $path = public_path("images/{$product->product_image}");
      if (file_exists($path)) {
        unlink($path);
      }
    }

    $product->delete();
    return redirect()->back()->with('success', 'প্রোডাক্ট সফলভাবে মুছে ফেলা হয়েছে!');
  }
}
