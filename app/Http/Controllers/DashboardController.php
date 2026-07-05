<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\StockMovement;
use App\Models\Supplier;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('dashboard', [
            'totalCategories' => Category::count(),
            'totalSuppliers' => Supplier::count(),
            'totalProducts' => Product::count(),
            'lowStockProducts' => Product::whereColumn('quantity', '<=', 'minimum_quantity')->count(),
            'recentMovements' => StockMovement::with(['product', 'user'])
                ->latest()
                ->take(5)
                ->get(),
        ]);
    }
}