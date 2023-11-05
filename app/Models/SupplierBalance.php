<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierBalance extends Model
{
    use HasFactory;
    protected $table="supplier_balances";
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
