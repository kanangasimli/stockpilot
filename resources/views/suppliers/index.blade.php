@extends('layouts.app')

@section('content')

<h1>Suppliers</h1>

<a href="{{ route('suppliers.create') }}" class="btn">Add Supplier</a>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<br><br>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th width="180">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($suppliers as $supplier)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $supplier->name }}</td>
                <td>{{ $supplier->email ?? '-' }}</td>
                <td>{{ $supplier->phone ?? '-' }}</td>
                <td>
                    <a href="{{ route('suppliers.edit', $supplier) }}" class="btn">Edit</a>

                    <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No suppliers found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<br>

{{ $suppliers->links() }}

@endsection