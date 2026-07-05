@extends('layouts.app')

@section('content')

<div class="card shadow-sm">

    <div class="card-header">
        <h3 class="mb-0">Add Supplier</h3>
    </div>

    <div class="card-body">

        <form action="{{ route('suppliers.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea name="address" rows="4" class="form-control">{{ old('address') }}</textarea>
            </div>

            <button class="btn btn-success">Save</button>
            <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Back</a>

        </form>

    </div>

</div>

@endsection