<?php

namespace Domain\Product\Actions;

use Domain\Product\DataTransferObjects\ProductActiveData;
use Domain\Product\Models\Product;

class UpdateProductActivationAction
{

    public function execute(
        ProductActiveData $productData,
        Product $product
    ): Product {

        $product->update([
            'is_active' => $productData->is_active,
        ]);
        return $product;
    }
}