@extends('layouts.app')

@section('content')

<h1>Add Product</h1>

<form action="{{ route('products.store') }}" method="POST">
    @csrf

    <p>
        <label>Category</label><br>
        <select name="category_id">
            <option value="">Select category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id') <br><small style="color:red;">{{ $message }}</small> @enderror
    </p>

    <p>
        <label>Supplier</label><br>
        <select name="supplier_id">
            <option value="">No supplier</option>
            @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}" @selected(old('supplier_id') == $supplier->id)>
                    {{ $supplier->name }}
                </option>
            @endforeach
        </select>
        @error('supplier_id') <br><small style="color:red;">{{ $message }}</small> @enderror
    </p>

    <p>
        <label>Name</label><br>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name') <br><small style="color:red;">{{ $message }}</small> @enderror
    </p>

    <p>
        <label>SKU</label><br>
        <input type="text" name="sku" value="{{ old('sku') }}">
        @error('sku') <br><small style="color:red;">{{ $message }}</small> @enderror
    </p>

    <p>
        <label>Description</label><br>
        <textarea name="description">{{ old('description') }}</textarea>
    </p>

    <p>
        <label>Purchase Price</label><br>
        <input type="number" step="0.01" name="purchase_price" value="{{ old('purchase_price', 0) }}">
        @error('purchase_price') <br><small style="color:red;">{{ $message }}</small> @enderror
    </p>

    <p>
        <label>Selling Price</label><br>
        <input type="number" step="0.01" name="selling_price" value="{{ old('selling_price', 0) }}">
        @error('selling_price') <br><small style="color:red;">{{ $message }}</small> @enderror
    </p>

    <p>
        <label>Quantity</label><br>
        <input type="number" name="quantity" value="{{ old('quantity', 0) }}">
        @error('quantity') <br><small style="color:red;">{{ $message }}</small> @enderror
    </p>

    <p>
        <label>Minimum Quantity</label><br>
        <input type="number" name="minimum_quantity" value="{{ old('minimum_quantity', 5) }}">
        @error('minimum_quantity') <br><small style="color:red;">{{ $message }}</small> @enderror
    </p>

    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('products.index') }}" class="btn">Back</a>
</form>

@endsection