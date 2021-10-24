<?php

namespace App\Http\Controllers;

use App\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Domain\Category\Models\Category;


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

    public function test()
    {
        // $attributes = [];
        // foreach ($product->attributes as $attribute) {
        //     // dd($attribute->options);
        // }
        return response()->json('test');
    }
}