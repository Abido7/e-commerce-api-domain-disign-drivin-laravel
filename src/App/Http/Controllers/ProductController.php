<?php

namespace App\Http\Controllers;

use App\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Domain\Product\Models\Product;

class ProductController extends Controller
{
    public function construct()
    {
        // $this->middleware('auth:sanctum', ['only' => ['update', 'store', 'destroy']]);
    }

    /** Show All poducts */
    public function index()
    {
        return ProductResource::collection(Product::Paginate(10));
    }

    /** Show poduct */
    public function show(Product $product)
    {
        return new ProductResource($product->with('attributes')->first());
    }
}