<?php

namespace Domain\Order\DataTransferObjects;


use Domain\Option\Models\Option;

class OrderProductAttributeData
{

    public function __construct(
        public ?Option $option,
    ) {
    }
    public static function create(
        array $data
    ): self {
        return new self(
            option: Option::findorfail($data['option_id']),
        );
    }
}