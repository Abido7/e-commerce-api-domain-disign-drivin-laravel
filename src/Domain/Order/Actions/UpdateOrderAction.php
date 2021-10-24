<?php

namespace Domain\Order\Actions;

use Domain\Order\DataTransferObjects\OrderUpdateData;
use Domain\Order\Models\Order;

class UpdateOrderAction
{

    public function excute(
        OrderUpdateData $data,
        Order $order
    ) {
        $order->update([
            'status' => $data->status,
        ]);
    }
}