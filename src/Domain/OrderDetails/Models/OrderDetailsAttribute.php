<?php

namespace Domain\OrderDetails\Models;

use Domain\Option\Models\Option;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetailsAttribute extends Model
{
    use HasFactory;

    protected $table = 'order_details_attributes';

    public function orderDetail()
    {
        return $this->belongsTo(OrderDetail::class);
    }

    public function option()
    {
        return $this->belongsTo(Option::class);
    }
}