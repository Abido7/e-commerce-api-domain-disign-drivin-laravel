<?php

namespace App\Http\Controllers;

use App\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderDetailResource;
use Domain\Order\Actions\CreateOrderAction;
use Domain\Order\DataTransferObjects\OrderData;

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
        // dd($data);
        $order = $action->execute($data);
        // dd($order);
        return response()->json(new OrderResource($order));
    }

    /** update New Order */
    public function update(
        UpdateOrderRequest $request,
        CreateOrderAction $action
    ) {
        $data = OrderData::fromRequest($request);
        // dd($data);
        $order = $action->execute($data);
        // dd($order);
        return response()->json(new OrderResource($order));
    }
}