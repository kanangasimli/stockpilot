@extends('layouts.app')

@section('content')

<h1>Edit Category</h1>

<form action="{{ route('categories.update', $category) }}" method="POST">
    @csrf
    @method('PUT')

    <p>
        <label>Name</label><br>
        <input type="text" name="name" value="{{ old('name', $category->name) }}">
        @error('name')
            <br><small style="color:red;">{{ $message }}</small>
        @enderror
    </p>

    <p>
        <label>Description</label><br>
        <textarea name="description">{{ old('description', $category->description) }}</textarea>
        @error('description')
            <br><small style="color:red;">{{ $message }}</small>
        @enderror
    </p>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('categories.index') }}" class="btn">Back</a>
</form>

@endsection