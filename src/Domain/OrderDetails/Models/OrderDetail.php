<?php

namespace Domain\OrderDetails\Models;

use Domain\Order\Models\Order;
use Domain\Product\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = ['quantity'];


    public function options()
    {
        return $this->hasMany(OrderDetailsAttribute::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}