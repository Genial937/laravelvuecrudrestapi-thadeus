<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['order_number'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
