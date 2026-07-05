@extends('layouts.app')

@section('content')

<h1>Edit Product</h1>

<form action="{{ route('products.update', $product) }}" method="POST">
    @csrf
    @method('PUT')

    <p>
        <label>Category</label><br>
        <select name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>
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
                <option value="{{ $supplier->id }}" @selected(old('supplier_id', $product->supplier_id) == $supplier->id)>
                    {{ $supplier->name }}
                </option>
            @endforeach
        </select>
        @error('supplier_id') <br><small style="color:red;">{{ $message }}</small> @enderror
    </p>

    <p>
        <label>Name</label><br>
        <input type="text" name="name" value="{{ old('name', $product->name) }}">
        @error('name') <br><small style="color:red;">{{ $message }}</small> @enderror
    </p>

    <p>
        <label>SKU</label><br>
        <input type="text" name="sku" value="{{ old('sku', $product->sku) }}">
        @error('sku') <br><small style="color:red;">{{ $message }}</small> @enderror
    </p>

    <p>
        <label>Description</label><br>
        <textarea name="description">{{ old('description', $product->description) }}</textarea>
    </p>

    <p>
        <label>Purchase Price</label><br>
        <input type="number" step="0.01" name="purchase_price" value="{{ old('purchase_price', $product->purchase_price) }}">
        @error('purchase_price') <br><small style="color:red;">{{ $message }}</small> @enderror
    </p>

    <p>
        <label>Selling Price</label><br>
        <input type="number" step="0.01" name="selling_price" value="{{ old('selling_price', $product->selling_price) }}">
        @error('selling_price') <br><small style="color:red;">{{ $message }}</small> @enderror
    </p>

    <p>
        <label>Quantity</label><br>
        <input type="number" name="quantity" value="{{ old('quantity', $product->quantity) }}">
        @error('quantity') <br><small style="color:red;">{{ $message }}</small> @enderror
    </p>

    <p>
        <label>Minimum Quantity</label><br>
        <input type="number" name="minimum_quantity" value="{{ old('minimum_quantity', $product->minimum_quantity) }}">
        @error('minimum_quantity') <br><small style="color:red;">{{ $message }}</small> @enderror
    </p>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('products.index') }}" class="btn">Back</a>
</form>

@endsection