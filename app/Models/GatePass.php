<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GatePass extends Model
{
    use HasFactory;
    protected $table='gate_passes';
    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }
}
