<?php

namespace Domain\Order\DataTransferObjects;

use Domain\Product\Models\Product;
use Domain\Order\Collections\OrderProductAttributesCollection;

class OrderProductData
{
    public function __construct(
        public ?Product $product,
        public ?int $quantity,
        public OrderProductAttributesCollection $options,
    ) {
    }

    // store function
    public static function create(
        array $data
    ): self {
        return   new self(
            product: Product::findOrFail($data['product_id']),
            quantity: $data['quantity'],
            options: OrderProductAttributesCollection::create($data['options'])
        );
    }
}