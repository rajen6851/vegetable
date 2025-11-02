<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Wishlist;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\CartOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class WebController extends Controller
{
    public function Home()
    {
        $categories = Category::all();

        $products = Product::all();

          $carts=DB::table('carts')
                ->join('products','carts.product_id','=','products.id')
                ->select(
                    'carts.*',
                    'products.name as product_name',
                    'products.image as product_img',
                     'products.description as product_desc',
                    'products.unit as product_weight'
                )->get();



        //  $product= DB::table('product')
        //             ->leftJoin('category', 'product.cat_id', '=', 'category.id')
        //             ->leftJoin('subcategory', 'product.subcat_id', '=', 'subcategory.id')
        //              ->leftJoin('stock', 'product.id', '=', 'stock.pro_id')

        //             ->select('product.*', 'category.name as cat_name','subcategory.name as subcat_name','stock.stock as sto','category.image as img' ,'product.stock as product_stock',)
        //             ->latest()
        //             ->get();
        return view('User.home', compact('categories','products','carts'));
    }

    // public function shop()
    // {
    //      $products = Product::all();
    //     return view('User.shops',compact('products'));
    // }

  public function shop($categoryId = null)
{
    if($categoryId) {
        $products = Product::where('category_id', $categoryId)->get();
    } else {
        $products = Product::all();
    }

    return view('User.shops', compact('products'));
}



    // public function cart(){
    //     $userId = Auth::id();
    //             $carts=DB::table('carts')
    //             ->join('products','carts.product_id','=','products.id')
    //             ->select(
    //                 'carts.*',
    //                 'products.name as product_name',
    //                 'products.image as product_img',
    //                  'products.description as product_desc',
    //                 'products.unit as product_weight'
    //             )
    //             ->where('carts.user_id',$userId)
    //             ->get();

    //             return view('User.cart',compact('carts'));
    // }


public function cart()
{
    // Default userId = null
    $userId = Auth::id();

    // Agar user login nahi hai, to $userId null rahega,
    // aur hum empty collection return kar denge
   if ($userId) {
    $carts = DB::table('carts')
        ->join('products', 'carts.product_id', '=', 'products.id')
        ->select(
            'carts.*',
            'products.name as product_name',
            'products.image as product_img',
            'products.description as product_desc',
            'products.unit as product_weight'
        )
        ->whereNotNull('carts.user_id')
        ->where('carts.user_id', $userId)
        ->get();
} else {
    $carts = collect();
}

    return view('User.cart', compact('carts'));
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
// public function savecart(Request $request){
//     if(!Auth::check()){
//         return back()->with('fail', 'You must be logged in to add items to the wishlist.');
//     }

//     $existingCartItem = Cart::where('user_id', Auth::id())
//                             ->where('product_id', $request->product_id)
//                             ->first();

//     if($existingCartItem){
//         return back()->with('fail','This product is already in your cart');
//     }

//    try {
//         $cart = new Cart();
//         $cart->user_id = auth()->id();
//         $cart->product_id = $request->product_id;
//         $cart->price = $request->price;
//         $cart->quantity = $request->quantity;
//         $cart->save();

//         // AJAX ke liye JSON response
//         return response()->json([
//             'status' => true,
//             'message' => 'Product added to cart successfully!'
//         ]);

//     } catch (\Exception $e) {
//         return response()->json([
//             'status' => false,
//             'message' => 'Failed to add to cart'
//         ]);
//     }
// }

public function savecart(Request $request)
{
    if (!Auth::check()) {
        return response()->json([
            'status' => false,
            'message' => 'You must be logged in to add items to the cart.'
        ]);
    }

    // return response()->json($request->all());


    $request->validate([
        'product_id' => 'required|integer|exists:products,id',
        'price' => 'required|numeric|min:0',
        'weight' => 'required|string|max:50',
        'quantity' => 'required|integer|min:1',
    ]);

    

    // Check if product already exists in cart
    $existingCartItem = Cart::where('user_id', Auth::id())
        ->where('product_id', $request->product_id)
        ->first();

    if ($existingCartItem) {
        return response()->json([
            'status' => false,
            'message' => 'This product is already in your cart.'
        ]);
    }

    // Save new cart item
    try {
        $cart = new Cart();
        $cart->user_id = Auth::id();
        $cart->product_id = $request->product_id;
        $cart->price = $request->price;
        $cart->weight = $request->weight;
        $cart->quantity = $request->quantity;
        $cart->save();

        return response()->json([
            'status' => true,
            'message' => 'Product added to cart successfully!'
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => 'Failed to add to cart: ' . $e->getMessage()
        ]);
    }
}

public function checkout()
{
    $dbCart = Cart::with('product')
        ->where('user_id', auth()->id())
        ->get()
        ->filter(function ($cart) {
            return $cart->product !== null;
        });

        $customer = User::find(auth()->id()); 

        // dd($dbCart); 

    // Pass this filtered data to the view
    return view('User.checkout', compact('dbCart', 'customer'));
}

public function savecheckout(Request $request)
{
    $request->validate([
        'country' => 'required',
        'name'    => 'required',
        'email'   => 'required|email',
        'number'  => 'required',
        'pmode'   => 'required'
    ]);

    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'Please login to continue.');
    }

    $userId = auth()->id();

    DB::beginTransaction();

    try {
        // ✅ STEP 1: Check input
        // dd('STEP 1: Request Data', $request->all());

        // Update user info
        $customer = User::findOrFail($userId);
        $customer->update([
            'country'   => $request->country,
            'name'      => $request->name,
            'email'     => $request->email,
            'number'    => $request->number,
            'address'   => $request->address,
            'appartment'=> $request->appartment,
            'town'      => $request->town,
            'state'     => $request->state,
            'zip'       => $request->zip
        ]);

        // ✅ STEP 2: Check updated user
        // dd('STEP 2: Customer Updated', $customer);

        // Fetch cart items
        $cartItems = Cart::where('user_id', $userId)->get();
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        // ✅ STEP 3: Cart items check
        // dd('STEP 3: Cart Items', $cartItems->toArray());

        // Calculate total price
        $totalPrice = $cartItems->sum(fn($item) => $item->price * $item->quantity);
        $deliveryCharge = $request->input('deliveryCharge', 0);
        $finalTotal = $totalPrice + $deliveryCharge;

        // ✅ STEP 4: Total calculation check
        // dd('STEP 4: Total Price Details', [
        //     'totalPrice' => $totalPrice,
        //     'deliveryCharge' => $deliveryCharge,
        //     'finalTotal' => $finalTotal
        // ]);

        // Create Order
        $order = Order::create([
            'user_id' => $userId,
            'pmode'   => $request->pmode,
            'price'   => $finalTotal,
            'status'  => 1
        ]);

        // ✅ STEP 5: Order creation check
        // dd('STEP 5: Order Created', $order);

        // Save cart items into cart_order
        foreach ($cartItems as $cartItem) {
            $cartOrder = CartOrder::create([
                'order_id'   => $order->id,
                'cart_id'    => $cartItem->id,
                'product_id' => $cartItem->product_id,
                'quantity'   => $cartItem->quantity,
                'price'      => $cartItem->price,
                'weight'     => $cartItem->weight ?? '',
                'message'    => $cartItem->message ?? '',
                'date'       => now()->toDateString(),
                'time'       => now()->toTimeString(),
            ]);

            // ✅ STEP 6: Each cart order check
            // dd('STEP 6: CartOrder Created', $cartOrder);
        }

        // Clear user's cart
        Cart::where('user_id', $userId)->delete();

        DB::commit();

        // return redirect()->route('ordersuccess',[$order->id])->with('success', 'Order placed successfully.');
return redirect()->route('ordersuccess', ['id' => $order->id])
                 ->with('success', 'Order placed successfully.');



    }catch (\Exception $e) {
    DB::rollback();
    dd('Checkout Error:', $e->getMessage(), $e->getTraceAsString());
    }
}

public function ordersuccess($id)
{
    $order = Order::with('carts.product')->findOrFail($id);
    $customer = $order->user;
    return view('Order.ordersuccess', compact('order', 'customer'));
}



    public function productdetails($id)
    {
        // $productdetails=Product::all();

$productdetails = Product::where('id', $id)->first();
 $products = Product::inRandomOrder()->take(4)->get();

        return view('User.productdetails',compact('productdetails','products'));
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
    $userId = Auth::id(); // current logged-in user
    $orders = Order::where('user_id', $userId)->orderBy('created_at','desc')->get();

    return view('User.myaccount', compact('orders'));
}




public function contact()
{
    return view('User.contact');
}
//  public function searchProducts(Request $request)
//     {
//         $search = $request->input('search');

//         $products = Product::where('status', 1)
//             ->when($search, function ($query, $search) {
//                 return $query->where('name', 'like', "%{$search}%")
//                              ->orWhere('description', 'like', "%{$search}%");
//             })
//             ->take(10) // top 10 results
//             ->get();

//         // return HTML for AJAX
//         $html = '';
//         if($products->count() > 0){
//             $html .= '<ul class="search-result-list">';
//             foreach($products as $product){
//                 $html .= '<li onclick="window.location.href=\''.route('product.detail', $product->id).'\'">';
//                 $html .= '<img src="'.asset('uploads/products/'.$product->image).'" alt="'.$product->name.'" width="40">';
//                 $html .= '<span>'.$product->name.'</span> – ₹'.$product->price;
//                 $html .= '</li>';
//             }
//             $html .= '</ul>';
//         } else {
//             $html .= '<p class="text-center text-muted">No products found</p>';
//         }

//         return response()->json(['html' => $html]);
//     }
public function searchProducts(Request $request)
{
    $search = $request->input('search');
    $category = $request->input('category');

    $products = Product::where('status', 1)
        ->when($search, function($query, $search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        })
        ->when($category, function($query, $category) {
            $query->where('category_id', $category);
        })
        ->take(10)
        ->get();

    // Step 2a: Debug products
    // dd($products);  // Check backend array

    // Comment out HTML return for now
    
    $html = '';
    if($products->count() > 0){
        $html .= '<ul class="search-result-list">';
        foreach($products as $product){
            $html .= '<li onclick="window.location.href=\''.route('productdetails', $product->id).'\'">';
            $html .= '<img src="'.asset('assets/images/Product/'.$product->image).'" alt="'.$product->name.'" width="40">';
            $html .= '<span>'.$product->name.'</span> – ₹'.$product->price;
            $html .= '</li>';
        }
        $html .= '</ul>';
    } else {
        $html .= '<p class="text-center text-muted">No products found</p>';
    }

    return response()->json(['html' => $html]);
    
}


}