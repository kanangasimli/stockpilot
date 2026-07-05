@extends('layouts.app')

@section('content')

<div class="card shadow-sm">

    <div class="card-header">
        <h3 class="mb-0">Edit Supplier</h3>
    </div>

    <div class="card-body">

        <form action="{{ route('suppliers.update', $supplier) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Name</label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name', $supplier->name) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email', $supplier->email) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Phone</label>

                <input
                    type="text"
                    name="phone"
                    class="form-control"
                    value="{{ old('phone', $supplier->phone) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Address</label>

                <textarea
                    name="address"
                    rows="4"
                    class="form-control">{{ old('address', $supplier->address) }}</textarea>
            </div>

            <button class="btn btn-success">
                Update
            </button>

            <a href="{{ route('suppliers.index') }}"
               class="btn btn-secondary">
                Back
            </a>

        </form>

    </div>

</div>

@endsection