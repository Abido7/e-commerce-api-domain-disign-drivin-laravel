<?php


namespace Domain\Order\Collections;

use Domain\Order\DataTransferObjects\OrderProductData;
use Illuminate\Database\Eloquent\Collection;


class OrderProductDataCollection extends Collection
{
    public static function create(array $data): self
    {
        return new self(
            collect($data)
                ->transform(
                    function ($value, $key) {
                        return  OrderProductData::create($value);
                    }
                )
        );
    }
}