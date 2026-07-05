@extends('layouts.app')

@section('content')

<h1>Add Category</h1>

<form action="{{ route('categories.store') }}" method="POST">
    @csrf

    <p>
        <label>Name</label><br>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name')
            <br><small style="color:red;">{{ $message }}</small>
        @enderror
    </p>

    <p>
        <label>Description</label><br>
        <textarea name="description">{{ old('description') }}</textarea>
        @error('description')
            <br><small style="color:red;">{{ $message }}</small>
        @enderror
    </p>

    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('categories.index') }}" class="btn">Back</a>
</form>

@endsection