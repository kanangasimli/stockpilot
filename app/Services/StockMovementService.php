<?php

namespace App\Services;

use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class StockMovementService
{
    public function create(array $data): StockMovement
    {
        return DB::transaction(function () use ($data) {
            $product = Product::lockForUpdate()->findOrFail($data['product_id']);

            if ($data['type'] === 'out' && $product->quantity < $data['quantity']) {
                throw new InvalidArgumentException('Not enough stock available.');
            }

            if ($data['type'] === 'in') {
                $product->increment('quantity', $data['quantity']);
            }

            if ($data['type'] === 'out') {
                $product->decrement('quantity', $data['quantity']);
            }

            return StockMovement::create($data);
        });
    }
}