<?php

namespace Domain\Product\DataTransferObjects;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Domain\Category\Models\Category;
use Domain\Product\Support\ImageUploadHandeller;

class ProductData
{
    public function __construct(
        public ?string $name_en,
        public ?string $name_ar,
        public ?string $description_en,
        public ?string $description_ar,
        public ?string $img,
        public ?float $price,
        public ?string $pices_no,
        public ?Category $category
    ) {
    }

    // store function
    public static function fromRequest(
        StoreProductRequest|UpdateProductRequest $request
    ): self {
        return new self(
            name_en: $request->name_en,
            name_ar: $request->name_ar,
            description_en: $request->description_en,
            description_ar: $request->description_ar,
            img: $request->img,
            price: $request->price,
            pices_no: $request->pices_no,
            category: Category::findOrFail($request->category_id)
        );
    }
}