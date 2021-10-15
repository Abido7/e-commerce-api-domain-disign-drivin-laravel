<?php

namespace Domain\Category\Models;

use Domain\Product\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['name'];


    protected $fillable = [
        'name',
        'is_active',
    ];

    public function products()
    {
        return $this->hasMany(Product::class)->where('is_active', 1);
    }
}