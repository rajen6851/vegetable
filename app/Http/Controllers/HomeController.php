<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    //  public function index()
    // {
    //     return view('User.home');
    // }

     public function index()
    {
         $products = Product::all();


        $categories = Category::all();
        return view('User.home', compact('categories','products'));
    }
}
