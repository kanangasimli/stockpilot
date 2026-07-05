@extends('layouts.app')

@section('content')

<div class="card shadow-sm">

    <div class="card-header">
        <h3 class="mb-0">Add Category</h3>
    </div>

    <div class="card-body">

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Name</label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>

                <textarea
                    name="description"
                    rows="4"
                    class="form-control">{{ old('description') }}</textarea>
            </div>

            <button class="btn btn-success">
                Save
            </button>

            <a href="{{ route('categories.index') }}"
               class="btn btn-secondary">
                Back
            </a>

        </form>

    </div>

</div>

@endsection