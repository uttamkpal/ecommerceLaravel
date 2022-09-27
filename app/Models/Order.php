<?php

namespace App\Models;

use App\Models\User;
use App\Models\product;
use App\Models\Orderaddress;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function products(){
        return $this->hasOne(product::class, 'id', 'product_id');
    }
    public function orderaddress(){
        return $this->hasOne(Orderaddress::class, 'order_id', 'invoice');
    }
    
}
