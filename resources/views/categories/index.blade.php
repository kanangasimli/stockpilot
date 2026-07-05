@extends('layouts.app')

@section('content')

<h1>Categories</h1>

<a href="{{ route('categories.create') }}" class="btn">Add Category</a>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<br><br>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th width="180">Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description ?? '-' }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category) }}" class="btn">Edit</a>

                    <form action="{{ route('categories.destroy', $category) }}"
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
                <td colspan="4">No categories found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<br>

{{ $categories->links() }}

@endsection