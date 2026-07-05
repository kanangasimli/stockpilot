@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="mb-0">Suppliers</h1>

    <a href="{{ route('suppliers.create') }}"
       class="btn btn-primary">
        Add Supplier
    </a>
</div>

<br><br>

<table class="table table-bordered table-hover align-middle bg-white">
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
                    <a href="{{ route('suppliers.edit', $supplier) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
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