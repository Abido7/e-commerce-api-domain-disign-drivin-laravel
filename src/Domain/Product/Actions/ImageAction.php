<?php

namespace Domain\Product\Actions;


use Domain\Product\DataTransferObjects\ProductData;
use Illuminate\Support\Facades\Storage;

class ImageAction
{
    public function execute(ProductData $data)
    {
        return Storage::disk('uploads')->put('/products', $data->img);
    }
}