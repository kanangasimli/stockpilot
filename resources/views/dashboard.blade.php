@extends('layouts.app')

@section('content')

<h1 class="mb-4">Dashboard</h1>

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card shadow-sm border-primary">
            <div class="card-body">
                <h6 class="text-muted">Categories</h6>
                <h2 class="text-primary">{{ $totalCategories }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-warning">
            <div class="card-body">
                <h6 class="text-muted">Suppliers</h6>
                <h2 class="text-warning">{{ $totalSuppliers }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-success">
            <div class="card-body">
                <h6 class="text-muted">Products</h6>
                <h2 class="text-success">{{ $totalProducts }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-danger">
            <div class="card-body">
                <h6 class="text-muted">Low Stock</h6>
                <h2 class="text-danger">{{ $lowStockProducts }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-header">
        <h4 class="mb-0">Recent Stock Movements</h4>
    </div>

    <div class="card-body">
        <table class="table table-bordered align-middle mb-0">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Type</th>
                    <th>Quantity</th>
                    <th>User</th>
                    <th>Date</th>
                </tr>
            </thead>

            <tbody>
                @forelse($recentMovements as $movement)
                    <tr>
                        <td>{{ $movement->product->name }}</td>
                        <td>
                            @if($movement->type === 'in')
                                <span class="badge bg-success">Stock In</span>
                            @else
                                <span class="badge bg-danger">Stock Out</span>
                            @endif
                        </td>
                        <td>{{ $movement->quantity }}</td>
                        <td>{{ $movement->user->name }}</td>
                        <td>{{ $movement->movement_date->format('Y-m-d H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No recent stock movements.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection