@extends('layouts.app')

@section('content')

<div class="card shadow-sm">

    <div class="card-header">
        <h3 class="mb-0">Add Product</h3>
    </div>

    <div class="card-body">

        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Category</label>

                <select name="category_id" class="form-select">
                    <option value="">Select category</option>

                    @foreach($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            @selected(old('category_id') == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Supplier</label>

                <select name="supplier_id" class="form-select">
                    <option value="">No supplier</option>

                    @foreach($suppliers as $supplier)
                        <option
                            value="{{ $supplier->id }}"
                            @selected(old('supplier_id') == $supplier->id)>
                            {{ $supplier->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Product Name</label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">SKU</label>

                <input
                    type="text"
                    name="sku"
                    class="form-control"
                    value="{{ old('sku') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>

                <textarea
                    name="description"
                    rows="4"
                    class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="row">

                <div class="col-md-6">

                    <div class="mb-3">
                        <label class="form-label">Purchase Price</label>

                        <input
                            type="number"
                            step="0.01"
                            name="purchase_price"
                            class="form-control"
                            value="{{ old('purchase_price',0) }}">
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="mb-3">
                        <label class="form-label">Selling Price</label>

                        <input
                            type="number"
                            step="0.01"
                            name="selling_price"
                            class="form-control"
                            value="{{ old('selling_price',0) }}">
                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-6">

                    <div class="mb-3">
                        <label class="form-label">Quantity</label>

                        <input
                            type="number"
                            name="quantity"
                            class="form-control"
                            value="{{ old('quantity',0) }}">
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="mb-3">
                        <label class="form-label">Minimum Quantity</label>

                        <input
                            type="number"
                            name="minimum_quantity"
                            class="form-control"
                            value="{{ old('minimum_quantity',5) }}">
                    </div>

                </div>

            </div>

            <button class="btn btn-success">
                Save
            </button>

            <a href="{{ route('products.index') }}"
               class="btn btn-secondary">
                Back
            </a>

        </form>

    </div>

</div>

@endsection