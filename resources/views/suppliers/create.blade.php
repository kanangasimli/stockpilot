@extends('layouts.app')

@section('content')

<h1>Add Supplier</h1>

<form action="{{ route('suppliers.store') }}" method="POST">
    @csrf

    <p>
        <label>Name</label><br>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name') <br><small style="color:red;">{{ $message }}</small> @enderror
    </p>

    <p>
        <label>Email</label><br>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email') <br><small style="color:red;">{{ $message }}</small> @enderror
    </p>

    <p>
        <label>Phone</label><br>
        <input type="text" name="phone" value="{{ old('phone') }}">
        @error('phone') <br><small style="color:red;">{{ $message }}</small> @enderror
    </p>

    <p>
        <label>Address</label><br>
        <textarea name="address">{{ old('address') }}</textarea>
        @error('address') <br><small style="color:red;">{{ $message }}</small> @enderror
    </p>

    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('suppliers.index') }}" class="btn">Back</a>
</form>

@endsection