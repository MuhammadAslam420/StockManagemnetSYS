<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $table='materials';
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
