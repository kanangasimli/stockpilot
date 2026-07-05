@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="mb-0">Categories</h1>

    <a href="{{ route('categories.create') }}"
       class="btn btn-primary">
        Add Category
    </a>
</div>

<br><br>

<table class="table table-bordered table-hover bg-white">
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
                    <a href="{{ route('categories.edit', $category) }}"
                        class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('categories.destroy', $category) }}"
                          method="POST"
                          style="display:inline-block;">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                            class="btn btn-danger btn-sm"
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