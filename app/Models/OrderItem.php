<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    public function user()
    {
        return $this->belongsTo(user::class,'user_id');
    }
}
