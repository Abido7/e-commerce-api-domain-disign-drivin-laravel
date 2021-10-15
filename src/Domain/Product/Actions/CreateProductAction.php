<?php

namespace Domain\Product\Actions;

use Domain\Product\DataTransferObjects\ProductData;
use Domain\Product\Models\Product;

class CreateProductAction
{

    public function execute(
        ProductData $data
    ) {
        $product = new Product([
            'price' => $data->price,
            'pices_no' => $data->pices_no,
            'img' => $data->img,
        ]);
        $product->name = ['en' => $data->name_en, 'ar' => $data->name_ar];
        $product->description = ['en' => $data->description_en, 'ar' => $data->description_ar];
        $product->category()->associate($data->category);
        $product->save();

        return $product->refresh();
    }
}