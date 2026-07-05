@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="mb-0">Stock Movements</h1>

    <a href="{{ route('stock-movements.create') }}"
       class="btn btn-primary">
        Add Stock Movement
    </a>
</div>

<table class="table table-striped table-bordered align-middle bg-white">
    <thead>
        <tr>
            <th>#</th>
            <th>Product</th>
            <th>Type</th>
            <th>Quantity</th>
            <th>User</th>
            <th>Date</th>
            <th>Note</th>
        </tr>
    </thead>

    <tbody>
        @forelse($stockMovements as $movement)
            <tr>
                <td>{{ $loop->iteration }}</td>
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
                <td>{{ $movement->note ?? '-' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">No stock movements found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

{{ $stockMovements->links() }}

@endsection