<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('Admin.Product.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.Product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $products = new Product();
        $products->name=$request->name;
        $products->price=$request->price;
        $products->category_id=$request->category_id;
        $products->unit=$request->unit;
        $products->description=$request->description;
        $products->stock=$request->stock;
        $products->status=$request->status;
        $products->description=$request->description;
        if($request->hasfile('image')){
            $file=$request->file('image');
            $ext=$file->getclientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move(public_path('assets/images/product'), $filename);
            $products->image=$filename;
        }
        $products->save();
        return redirect()->back()->with('status','Product Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // $products = Product::all();
         $products = Product::with('category')->get();

        return view('Admin.Product.list', compact('products'));
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
