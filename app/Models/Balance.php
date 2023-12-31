<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;
    protected $table="balances";
    public function user()
    {
        return $this->belongsTo(user::class,'user_id');
    }
}
