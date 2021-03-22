<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Supplier;
use App\Models\Order;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','quantity','description'];

    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
