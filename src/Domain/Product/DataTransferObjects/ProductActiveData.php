<?php

namespace Domain\Product\DataTransferObjects;

use App\Http\Requests\UpdateProductActivationRequest;
use phpDocumentor\Reflection\Types\Boolean;

class ProductActiveData
{
    public function __construct(public string $is_active)
    {
    }
    public static function fromRequest(
        UpdateProductActivationRequest $request
    ): self {
        return new self(
            is_active: $request->is_active,
        );
    }
}