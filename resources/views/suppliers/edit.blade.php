@extends('layouts.app')

@section('content')

<h1>Edit Supplier</h1>

<form action="{{ route('suppliers.update', $supplier) }}" method="POST">
    @csrf
    @method('PUT')

    <p>
        <label>Name</label><br>
        <input type="text" name="name" value="{{ old('name', $supplier->name) }}">
        @error('name') <br><small style="color:red;">{{ $message }}</small> @enderror
    </p>

    <p>
        <label>Email</label><br>
        <input type="email" name="email" value="{{ old('email', $supplier->email) }}">
        @error('email') <br><small style="color:red;">{{ $message }}</small> @enderror
    </p>

    <p>
        <label>Phone</label><br>
        <input type="text" name="phone" value="{{ old('phone', $supplier->phone) }}">
        @error('phone') <br><small style="color:red;">{{ $message }}</small> @enderror
    </p>

    <p>
        <label>Address</label><br>
        <textarea name="address">{{ old('address', $supplier->address) }}</textarea>
        @error('address') <br><small style="color:red;">{{ $message }}</small> @enderror
    </p>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('suppliers.index') }}" class="btn">Back</a>
</form>

@endsection