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
    $product = new Product();
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
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Product $product)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Product $product)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Product $product)
  {
    //
  }
}
