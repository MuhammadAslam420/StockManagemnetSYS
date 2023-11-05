<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnItem extends Model
{
    use HasFactory;
    protected $table="return_items";
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
        return $this->belongsTo(User::class,'user_id');
    }
}
