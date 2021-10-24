<?php

namespace Domain\Option\Models;

use Domain\Attribute\Models\Attribute;
use Domain\OrderDetails\Models\OrderDetailsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
    ];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
    public function orderOptions()
    {
        return $this->hasMany(OrderDetailsAttribute::class);
    }
}