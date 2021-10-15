<?php

namespace Domain\Order\Actions;

use Domain\Order\DataTransferObjects\OrderData;

class CalculateTotalAction
{

    public static function execute(
        OrderData $data,
    ): int {
        $total = 0;
        foreach ($data->products as $product) {
            $total += $product->product->price * $product->quantity;
        }
        return $total;
    }
}