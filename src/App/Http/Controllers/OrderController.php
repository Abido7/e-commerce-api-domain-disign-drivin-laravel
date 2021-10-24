<?php

namespace App\Http\Controllers;

use App\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderDetailResource;
use Domain\Order\Actions\CreateOrderAction;
use Domain\Order\DataTransferObjects\OrderData;
use Domain\Order\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        return OrderResource::collection(auth()->user()->orders);
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


    /** cancel New Order */
    public function destroy(Order $order)
    {
        $order->status == 'pending' ? $order->delete() : '';
        return response()->json([
            'msg' => 'order canceld successfully'
        ]);
    }
}