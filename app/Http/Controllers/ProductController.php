<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('product.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|unique:products|max:255',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = $newImageName;
        $product->description = $request->description;
        $product->save();
        return redirect()->route('products.index')->with('success', 'Product has been added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $product = Product::find($id);
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'description' => 'required'
        ]);
        $image = "";
        if($request->hasFile('image')){
            $request->validate([
                'image' => 'required|mimes:jpg,png,jpeg|max:5048'
            ]);
            $newImageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            $image = $newImageName;
        }else{
            $image = $request->image_old;
        }
        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = $image;
        $product->description = $request->description;
        $product->save();
        return redirect()->route('products.index')->with('success', 'Product has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product has been deleted successfully!');
    }
}
