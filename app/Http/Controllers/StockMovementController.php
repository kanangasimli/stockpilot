<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockMovementRequest;
use App\Models\Product;
use App\Models\StockMovement;
use App\Services\StockMovementService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use InvalidArgumentException;

class StockMovementController extends Controller
{
    public function index(): View
    {
        $stockMovements = StockMovement::with(['product', 'user'])
            ->latest()
            ->paginate(10);

        return view('stock-movements.index', compact('stockMovements'));
    }

    public function create(): View
    {
        $products = Product::orderBy('name')->get();

        return view('stock-movements.create', compact('products'));
    }

    public function store(
        StockMovementRequest $request,
        StockMovementService $stockMovementService
    ): RedirectResponse {
        try {
            $stockMovementService->create([
                ...$request->validated(),
                'user_id' => $request->user()->id,
                'movement_date' => now(),
            ]);

            return redirect()
                ->route('stock-movements.index')
                ->with('success', 'Stock movement created successfully.');
        } catch (InvalidArgumentException $exception) {
            return back()
                ->withInput()
                ->withErrors(['quantity' => $exception->getMessage()]);
        }
    }
}