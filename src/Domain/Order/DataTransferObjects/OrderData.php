<?php

namespace Domain\Order\DataTransferObjects;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Domain\Order\Collections\OrderProductDataCollection;

class OrderData
{
    public function __construct(
        public ?OrderProductDataCollection $products,
        public ?string $address,
    ) {
    }
    // store function
    public static function fromRequest(
        StoreOrderRequest|UpdateOrderRequest $request
    ): self {
        return new self(
            address: $request->address,
            products: OrderProductDataCollection::create($request->products)
        );
    }
}