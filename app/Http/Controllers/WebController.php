<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Wishlist;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class WebController extends Controller
{
    public function Home()
    {
        $categories = Category::all();

        $products = Product::all();


        //  $product= DB::table('product')
        //             ->leftJoin('category', 'product.cat_id', '=', 'category.id')
        //             ->leftJoin('subcategory', 'product.subcat_id', '=', 'subcategory.id')
        //              ->leftJoin('stock', 'product.id', '=', 'stock.pro_id')

        //             ->select('product.*', 'category.name as cat_name','subcategory.name as subcat_name','stock.stock as sto','category.image as img' ,'product.stock as product_stock',)
        //             ->latest()
        //             ->get();
        return view('User.home', compact('categories','products'));
    }

    public function shop()
    {
        return view('User.shops');
    }

    public function cart(){
                $carts=DB::table('carts')
                ->join('products','carts.product_id','=','products.id')
                ->select(
                    'carts.*',
                    'products.name as product_name',
                    'products.image as product_img',
                     'products.description as product_desc',
                    'products.unit as product_weight'
                )->get();

                return view('User.cart',compact('carts'));
    }

    // public function deletecart($id){
    //     $cart=Cart::find($id);
    //     $cart->delete();
    //     return  redirect()->back()->with('success', 'Item removed from cart.');

    // }
// public function deletecart($id)
// {
//     dd('Hit deletecart with id: '. $id);
// }

  public function deletecart(Request $request , $id){
        $data= Cart::findOrFail($id);
        $data->delete();
         return redirect()->back()->with('success', 'item delete in your wishlist');
    }


public function savecart(Request $request){
    if(!Auth::check()){
 return back()->with('fail', 'You must be logged in to add items to the wishlist.');
    }

    $existingCartItem=Cart::where('user_id',Auth::id())
                           ->where('product_id', $request->product_id)
                           ->first();

        if($existingCartItem){
            return back()->with('fail','This product is already in your cart');
        }

        $cart=new Cart;
        $cart->user_id=Auth::id();
        $cart->product_id=$request->product_id;
        $cart->price=$request->price;
        $cart->quantity=$request->quantity;
       $res = $cart->save();

         if ($res) {
        return back()->with('success', 'Product added to wishlist.');
    } else {
        return back()->with('fail', 'Error adding product to wishlist.');
    }
}



    public function productdetails($id)
    {
        // $productdetails=Product::all();

$productdetails = Product::where('id', $id)->first();

        return view('User.productdetails',compact('productdetails'));
    }

    
public function savewishlist(Request $request)
{
    // Ensure the user is authenticated
    if (!Auth::check()) {
        return back()->with('fail', 'You must be logged in to add items to the wishlist.');
    }

    // Check if the product is already in the wishlist
    $existingWishlistItem = Wishlist::where('user_id', Auth::id())
                                    ->where('product_id', $request->product_id)
                                    ->first();

    if ($existingWishlistItem) {
        // If the item already exists in the wishlist, return a message
        return back()->with('fail', 'This product is already in your wishlist.');
    }

    // Create a new wishlist entry
    $wishlist = new Wishlist;
    $wishlist->user_id = Auth::id();  // Use authenticated user's ID
    $wishlist->product_id = $request->product_id;
    $wishlist->price = $request->price;

    // Save the wishlist entry and return a response
    $res = $wishlist->save();
    
    if ($res) {
        return back()->with('success', 'Product added to wishlist.');
    } else {
        return back()->with('fail', 'Error adding product to wishlist.');
    }
}


    public function About()
    {
        return view('User.about');
    }

   public function Wishlist()
{
    // $wishlists=Wishlist::all();
   
    $wishlists=DB::table('wishlists')
    ->join('products','wishlists.product_id','=','products.id')
    ->select(
        'wishlists.*',
        'products.name as product_name',
        'products.description as product_desc',
        'products.unit as product_unit',
        'products.image as product_image',
    )->get();

    // $wishlists = DB::table('wishlists')
    // ->join('products', 'wishlists.product_id', '=', 'products.id')
    // ->select(
    //     'wishlists.*',
    //     'products.name as product_name',
    //     'products.image as product_image',
    //     'products.unit as product_unit'
    // )
    // ->get();

    


    return view('User.wishlist', compact('wishlists')); // ✅ data view me bhejna mat bhulo
}


    public function MyAccount()
    {
        return view('User.myaccount');
    }
}
