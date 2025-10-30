<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartOrder extends Model
{
    use HasFactory;

    protected $table = 'cart_order';

    protected $fillable = [
        'order_id',
        'cart_id',
        'product_id',
        'quantity',
        'price',
        'weight',
        'message',
        'date',
        'time'
    ];

    // Relationship with Order
    // public function order()
    // {
    //     return $this->belongsTo(Order::class);
    // }
public function order()
{
    return $this->belongsTo(Order::class, 'order_id');
}
    // Relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id', 'id');
    }

    // Optional: Relationship with Cart
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
