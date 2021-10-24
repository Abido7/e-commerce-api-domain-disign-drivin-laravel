<?php

namespace App\Http\Controllers\Admin;

use App\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use Domain\Admin\Product\Filters\FilterAction;
use Domain\Product\Actions\CreateProductAction;
use Domain\Product\Actions\ImageAction;
use Domain\Product\Actions\UpdateProductAction;
use Domain\Product\DataTransferObjects\ProductData;
use Domain\Product\Filters\FilterByprice;
use Domain\Product\Models\Product;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class ProductController extends Controller
{
    /** Show All poducts */
    public function index()
    {
        return ProductResource::collection(FilterAction::excute());
    }

    /** Show poduct */
    public function show(Product $product)
    {
        return new ProductResource($product->with(['category', 'attributes']));
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
    public function destroy(Product $product)
    {
        ImageAction::destroy($product);
        $product->delete();
        return response()->json(['msg' => 'Product Deleted Successfully']);
    }
}