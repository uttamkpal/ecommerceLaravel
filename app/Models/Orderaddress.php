<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderaddress extends Model
{
    use HasFactory;
    public function orders(){
        return $this->hasMany(Order::class, 'invoice', 'order_id');
    }
}
