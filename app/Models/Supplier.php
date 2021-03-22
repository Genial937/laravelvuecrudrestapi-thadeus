<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function supply_products()
    {
      return $this->belongsToMany(Product::class);
    }
}
