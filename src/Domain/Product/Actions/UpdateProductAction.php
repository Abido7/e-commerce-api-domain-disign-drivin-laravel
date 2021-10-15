<?php

namespace Domain\Product\Actions;

use Domain\Product\DataTransferObjects\ProductData;
use Domain\Product\Models\Product;

class UpdateProductAction
{

    public function execute(
        ProductData $data,
        Product $product
    ) {

        $imagePath = $data->img ? (new ImageAction())->execute($data) : $product->img;
        $product->update([
            'name' => ['en' => $data->name_en, 'ar' => $data->name_ar],
            'description' => ['en' => $data->description_en, 'ar' => $data->description_ar],
            'img' => $imagePath,
            'price' => $data->price,
            'pices_no' => $data->pices_no,
        ]);
        $product->category()->associate($data->category);
        return $product->refresh();
    }
}