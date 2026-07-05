@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="mb-0">Low Stock Report</h1>

    @if(auth()->user()->isAdmin())
        <a href="{{ route('products.index') }}" class="btn btn-secondary">
            Back to Products
        </a>
    @endif
</div>

<table class="table table-striped table-bordered align-middle bg-white">
    <thead>
        <tr>
            <th>#</th>
            <th>Product</th>
            <th>SKU</th>
            <th>Category</th>
            <th>Supplier</th>
            <th>Current Stock</th>
            <th>Minimum Stock</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
        @forelse($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->sku }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->supplier->name ?? '-' }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->minimum_quantity }}</td>
                <td>
                    <span class="badge bg-danger">Low Stock</span>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center">No low stock products found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

{{ $products->links() }}

@endsection