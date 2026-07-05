@extends('layouts.app')

@section('content')

<h1>Products</h1>

<a href="{{ route('products.create') }}" class="btn">Add Product</a>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<br><br>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>SKU</th>
            <th>Category</th>
            <th>Supplier</th>
            <th>Stock</th>
            <th>Minimum</th>
            <th>Status</th>
            <th>Selling Price</th>
            <th width="180">Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    {{ $product->name }}

                    @if($product->isLowStock())
                        <br><small style="color:red;">Low stock</small>
                    @endif
                </td>
                <td>{{ $product->sku }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->supplier->name ?? '-' }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->minimum_quantity }}</td>
                <td>
                    @if($product->isLowStock())
                        <span style="color:red; font-weight:bold;">Low Stock</span>
                    @else
                        <span style="color:green; font-weight:bold;">In Stock</span>
                    @endif
                </td>
                <td>{{ number_format($product->selling_price, 2) }}</td>
                <td>
                    <a href="{{ route('products.edit', $product) }}" class="btn">Edit</a>

                    <form action="{{ route('products.destroy', $product) }}"
                          method="POST"
                          style="display:inline-block;">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger"
                                onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="10">No products found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<br>

{{ $products->links() }}

@endsection