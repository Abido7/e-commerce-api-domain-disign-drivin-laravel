<?php

namespace Domain\Attribute\Models;

use Domain\Option\Models\Option;
use Domain\Product\Models\OrderDetails;
use Domain\Product\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}