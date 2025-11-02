<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

    use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    // public function boot(): void
    // {
    //     //
    // }


public function boot()
{
    View::composer('*', function ($view) {
        if (Auth::check()) {
            $userId = Auth::id();

            $carts = DB::table('carts')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->select(
                    'carts.*',
                    'products.name as product_name',
                    'products.image as product_img',
                    'products.description as product_desc',
                    'products.unit as product_weight'
                )
                ->where('carts.user_id', $userId)
                ->get();
        } else {
            $carts = collect(); // Empty collection for guest user
        }

        $view->with('carts', $carts);
    });
}


}


