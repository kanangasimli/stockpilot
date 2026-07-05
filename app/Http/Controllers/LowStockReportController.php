<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class LowStockReportController extends Controller
{
    public function __invoke(): View
    {
        $products = Product::with(['category', 'supplier'])
            ->whereColumn('quantity', '<=', 'minimum_quantity')
            ->orderBy('quantity')
            ->paginate(10);

        return view('reports.low-stock', compact('products'));
    }
}