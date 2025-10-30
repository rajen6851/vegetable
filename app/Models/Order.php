<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pmode',
        'price',
        'status',
        'product_id',
        'merchant_transaction_id'
    ];

    // Relationship with Cart_Order
    public function cartOrders()
    {
        return $this->hasMany(CartOrder::class);
    }

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship with carts (CartOrder)
    public function carts()
    {
        return $this->hasMany(CartOrder::class, 'order_id', 'id');
    }

    // Relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
