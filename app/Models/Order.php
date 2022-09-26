<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasOne(User::class);
    }
    public function product(){
        return $this->hasMany(product::class);
    }
    
}
