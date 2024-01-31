<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Checkout;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;

class AdminController extends Controller
{
    public function index()
    {
        // Get the sum of total_amounts for each month with status 'confirmed' for the current year
        $monthlyTotalAmounts = Checkout::where('status', 'confirmed')
            ->whereMonth('created_at', '=', date('m'))
            ->selectRaw('MONTH(created_at) as month, YEAR(created_at) as year, SUM(total_amount) as total_amount')
            ->groupByRaw('MONTH(created_at), YEAR(created_at)')
            ->get();

        return view('admin.index', [
            'categories' => Category::all(),
            'products' => Product::all(),
            'purchases' => Purchase::all(),
            'suppliers' => Supplier::all(),
            'orders' => Checkout::all(),
            'monthlyTotalAmounts' => $monthlyTotalAmounts,
        ]);
    }
}