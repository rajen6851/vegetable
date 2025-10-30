<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    // Cart belongs to a Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
