<?php

namespace Domain\Product\Actions;

use Carbon\Carbon;
use Domain\OrderDetails\Models\OrderDetail;
use Illuminate\Support\Collection;

class MonthlyTop5productAction
{

    public function excute(): Collection
    {
        return OrderDetail::whereMonth('orders.created_at', Carbon::now()->month)
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('status', '!=', 'pending')
            ->selectRaw('count(order_id) as in_orders, product_id,  SUM(order_details.quantity) as total_pices_sold')
            ->groupBy('product_id')
            ->orderBy('total_pices_sold', 'DESC')
            ->limit(5)
            ->get();
    }
}