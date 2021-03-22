<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Product;


class Order_detail extends Model
{
    use HasFactory;

    protected $fillable = ['order_id','product_id'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
