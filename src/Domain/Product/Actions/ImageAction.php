<?php

namespace Domain\Product\Actions;


use Domain\Product\DataTransferObjects\ProductData;
use Domain\Product\Models\Product;
use Illuminate\Support\Facades\Storage;

class ImageAction
{
    public function execute(ProductData $data)
    {
        return Storage::disk('uploads')->put('/products', $data->img);
    }

    public static function destroy(Product $product)
    {
        return Storage::disk('uploads')->delete('/products', $product->img);
    }
}