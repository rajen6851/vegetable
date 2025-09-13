<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('Admin.Category.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categories = new Category();
        $categories->name=$request->name;
        // $categories->slug=$request->slug;
        $categories->description=$request->description;
        if($request->hasFile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
          $file->move(public_path('images/category'), $filename);
            $categories->image=$filename;
        }


        // if(!empty($request->image)){
        //     if($request->post('id')){
        //         $row = DB::table('category')->where('id', $request->post('id'))->first();
        //         $image_path = public_path("/images/category/").$row->image;
        //                 if(File::exists($image_path)) {
        //                     File::delete($image_path);
        //             }
        //     }
        // $image = 'image-'.time().'.'.$request->image->extension();
        // $request->image->move(public_path('images/category'), $image);
        // $category->image=$image;
        // }
        $categories->save();
        return redirect()->back()->with('status','Category Added Successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
