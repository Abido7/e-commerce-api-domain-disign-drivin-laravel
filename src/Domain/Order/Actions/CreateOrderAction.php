<?php

namespace Domain\Order\Actions;

use Domain\Order\DataTransferObjects\OrderData;
use Domain\Order\Models\Order;
use Domain\OrderDetails\Models\OrderDetail;
use Domain\OrderDetails\Models\OrderDetailsAttribute;

class CreateOrderAction
{

    public function execute(
        OrderData $data
    ): Order {
        $orderTotal = (new CalculateTotalAction($data))->execute($data);
        $order = auth()->user()->orders()->create([
            'address' => $data->address
        ]);
        foreach ($data->products as $orderData) {
            $detail = new OrderDetail([
                'quantity' => $orderData->quantity,
            ]);
            $detail->order()->associate($order);
            $detail->product()->associate($orderData->product);
            $order->update(['total' => $orderTotal]);
            $detail->save();
            $detail->refresh();
            foreach ($orderData->options as $option) {
                $orderDetailAttribute = new OrderDetailsAttribute();
                $orderDetailAttribute->option()->associate($option->option);
                $orderDetailAttribute->orderDetail()->associate($detail);
            }
            $orderDetailAttribute->save();
            $orderDetailAttribute->refresh();
        }
        return $order;
    }
}