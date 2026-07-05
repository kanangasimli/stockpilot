@extends('layouts.app')

@section('content')

<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="mb-0">Add Stock Movement</h3>
    </div>

    <div class="card-body">
        <form action="{{ route('stock-movements.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Product</label>

                <select name="product_id" class="form-select">
                    <option value="">Select product</option>

                    @foreach($products as $product)
                        <option value="{{ $product->id }}"
                                @selected(old('product_id') == $product->id)>
                            {{ $product->name }} — Current Stock: {{ $product->quantity }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Movement Type</label>

                <select name="type" class="form-select">
                    <option value="">Select type</option>
                    <option value="in" @selected(old('type') === 'in')>Stock In</option>
                    <option value="out" @selected(old('type') === 'out')>Stock Out</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Quantity</label>

                <input
                    type="number"
                    name="quantity"
                    class="form-control"
                    min="1"
                    value="{{ old('quantity') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Note</label>

                <textarea
                    name="note"
                    rows="4"
                    class="form-control">{{ old('note') }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">
                Save
            </button>

            <a href="{{ route('stock-movements.index') }}"
               class="btn btn-secondary">
                Back
            </a>
        </form>
    </div>
</div>

@endsection