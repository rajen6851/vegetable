<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/', [WebController::class, 'Home'])->name('user_home');

Route::get('/about',[WebController::class,'About'])->name('about');

Route::get('/myaccount',[WebController::class,'MyAccount'])->name('myaccount');

Route::get('/productdetail/{id}',[WebController::class,'productdetails'])->name('productdetails');

// Route::get('/shop')
Route::get('/shop',[WebController::class,'shop'])->name('shop');

Route::get('/wishlist',[WebController::class,'Wishlist'])->name('wishlist');
Route::post('/savewishlist', [WebController::class, 'savewishlist'])->name('savewishlist');

Route::get('cart',[WebController::class,'cart'])->name('cart');
Route::post('savecart',[WebController::class,'savecart'])->name('savecart');
// Route::post('/deletecart/{id}', [WebController::class, 'deletecart'])->name('deletecart');
Route::get('/deletecart/{id}', [WebController::class, 'deletecart'])->name('deletecart');


// Only Logged-in Users
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('customer_dashboard');
});

// Route::middleware(['auth', 'user-access:user'])->group(function () {
  
//     Route::get('/home', [HomeController::class, 'index'])->name('home');        
// });

// Only Admin Access
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin_dashboard');

     Route::controller(CustomerController::class)->group(function(){
        Route::get('admin/users', 'index');
        Route::get('users-export', 'export')->name('users.export');
        Route::post('users-import', 'import')->name('users.import');
    });


 Route::prefix('admin/Category')->group(function () {
        Route::get('/', [categoryController::class, 'index'])->name('category.index');
        Route::get('/create', [categoryController::class, 'create'])->name('category.create');
        Route::post('/store', [categoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}', [categoryController::class, 'edit'])->name('category.edit');
        Route::put('/update/{id}', [categoryController::class, 'update'])->name('category.update');
        Route::get('/delete/{id}', [categoryController::class, 'destroy'])->name('category.destroy');
    });


    Route::prefix('admin/Product')->group(function (){
        Route::get('/', [ProductCOntroller::class, 'index'])->name('prduct.index');
        Route::get('/create',[ProductController::class,'create'])->name('product.create');
        Route::post('/store',[ProductController::class,'store'])->name('product.store');

    });

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
