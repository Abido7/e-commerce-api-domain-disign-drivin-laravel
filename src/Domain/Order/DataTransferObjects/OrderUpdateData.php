<?php

namespace Domain\Order\DataTransferObjects;

use App\Http\Requests\UpdateOrderRequest;

class OrderUpdateData
{
    public function __construct(public ?string $status)
    {
    }

    public static function fromRequest(UpdateOrderRequest $request): self
    {
        return new self(status: $request->status);
    }
}