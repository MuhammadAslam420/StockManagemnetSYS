<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table="orders";
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    // public function shipping()
    // {
    //     return $this->hasOne(Shipping::class);
    // }
    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
    public function gatepass()
    {
        return $this->hasOne(GatePass::class,'order_id');
    }
    public function retrun_items()
    {
        return $this->hasMany(ReturnItem::class);
    }
}
