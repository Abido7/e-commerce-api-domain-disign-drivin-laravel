<?php

namespace App\Http\Controllers\Admin;

use App\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Domain\Order\Actions\UpdateOrderAction;
use Domain\Order\Actions\CreateOrderAction;
use Domain\Order\DataTransferObjects\OrderData;
use Domain\Order\DataTransferObjects\OrderUpdateData;
use Domain\Order\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        return OrderResource::collection(Order::with(['details', 'details.options'])->paginate(10));
    }

    public function show(Order $order)
    {
        return new OrderResource($order);
    }

    /** Store New Order */
    public function store(
        StoreOrderRequest $request,
        CreateOrderAction $action
    ) {
        $data = OrderData::fromRequest($request);
        $order = $action->execute($data);
        return response()->json(new OrderResource($order));
    }


    /** update New Order */
    public function update(
        UpdateOrderRequest $request,
        UpdateOrderAction $action,
        Order $order
    ) {
        $data = OrderUpdateData::fromRequest($request);
        $action->excute($data, $order);
        return response()->json(['msg' => 'order status updated successfully']);
    }

    /** destroy New Order */
    public function destroy(Order $order)
    {
        $order->status == 'pending' ? $order->delete() : '';
        return response()->json(['msg' => 'order canceld successfully']);
    }
}