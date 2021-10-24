<?php

namespace Domain\Product\Models;

use Domain\Attribute\Models\Attribute;
use Domain\Category\Models\Category;
use Domain\Order\Models\Order;
use Domain\OrderDetails\Models\OrderDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['name', 'description'];


    protected $fillable = [
        'name',
        'description',
        'img',
        'price',
        'pices_no',
        'is_active',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function  details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }
}