<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function orderItems()
    {
         return $this->hasMany(OrderItem::class,'product_id');
    }
    public function retrun_items()
    {
        return $this->hasMany(ReturnItem::class);
    }
}
