<?php

namespace App\Http\Controllers;

use App\Controllers\Controller;
use Domain\Product\Actions\CreateProductAction;
use Domain\Product\Actions\UpdateProductAction;
use Domain\Product\DataTransferObjects\ProductData;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use Domain\Product\Models\Product;

class ProductController extends Controller
{
    public function construct()
    {
        $this->middleware('auth:sanctum', ['only' => ['update', 'store', 'destroy']]);
    }

    /** Show All poducts */
    public function index()
    {
        return ProductResource::collection(Product::get());
    }


    /** Show poduct */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }


    /** Store New poduct */
    public function store(
        StoreProductRequest $request,
        CreateProductAction $action
    ) {
        $data = ProductData::fromRequest($request);
        $product = $action->execute($data);
        return response()->json(new ProductResource($product), 200);
    }


    /** Update  poduct */
    public function update(
        Product $product,
        UpdateProductRequest $UpdateProductRequest,
        UpdateProductAction $action
    ) {
        $productData =  ProductData::fromRequest($UpdateProductRequest, $product);
        $product = $action->execute($productData, $product);
        return response()->json([
            'msg' => 'updated successfully', 'product' => new ProductResource($product)
        ], 200);
    }

    /** destroy  poduct */
    // public function destroy(Product $product, ImageUploadHandeller $ImageHandeller)
    // {
    //     $ImageHandeller->delete($product);
    //     $product->delete();
    //     return response()->json(['msg' => 'Product Deleted Successfully']);
    // }
}