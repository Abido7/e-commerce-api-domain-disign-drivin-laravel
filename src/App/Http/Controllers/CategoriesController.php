<?php

namespace App\Http\Controllers;

use App\Controllers\Controller;
use App\Http\Resources\AttributeResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\OptionResource;
use Domain\Attribute\Models\Attribute;
use Domain\Category\Models\Category;
use Domain\Product\Models\Product;


class CategoriesController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::get());
    }

    public function show(Category $category)
    {
        return new CategoryResource($category->with('products')->first());
    }

    public function test(Product $product)
    {
        // $attributes = [];
        // foreach ($product->attributes as $attribute) {
        //     // dd($attribute->options);
        // }
        return response()->json($product->attributes);
    }
}