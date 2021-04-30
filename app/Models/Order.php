<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    public function items(){
	    return $this -> belongsToMany(Product::class, 'order_items', 'order_id', 'product_id');
    }
}
