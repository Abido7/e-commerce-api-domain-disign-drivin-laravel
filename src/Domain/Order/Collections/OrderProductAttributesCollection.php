<?php


namespace Domain\Order\Collections;

use Domain\Order\DataTransferObjects\OrderProductAttributeData;
use Illuminate\Database\Eloquent\Collection;

class OrderProductAttributesCollection extends Collection
{
    public static function  create(array $data): self
    {
        return new self(
            collect($data)
                ->transform(
                    function ($value, $key) {
                        return  OrderProductAttributeData::create($value);
                    }
                )
        );
    }
}