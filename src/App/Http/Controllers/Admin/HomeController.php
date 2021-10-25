<?php

namespace App\Http\Controllers\Admin;

use App\Controllers\Controller;
use Domain\Order\Models\Order;
use Domain\Product\Actions\MonthlyTop5productAction;
use Domain\Product\Models\Product;
use Domain\User\Models\User;

class HomeController extends Controller
{

    public function index(
        MonthlyTop5productAction $action
    ) {
        /** get direct statistics */
        $statistics = [
            'users' => User::all()->count(),
            'products' => Product::get()->count(),
            'totalIncome' => Order::where('status', '!=', 'pending')
                ->sum('total'),
        ];
        $top_5_ProductInCurrentMonth = $action->excute();
        return response()->json(['data' => ['statistics' => $statistics, 'top_5_ProductInCurrentMonth' => $top_5_ProductInCurrentMonth]], 200);
    }
}