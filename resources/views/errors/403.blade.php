@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="card shadow-sm text-center" style="max-width: 520px;">
        <div class="card-body p-5">
            <h1 class="display-1 fw-bold text-danger">403</h1>

            <h3 class="mb-3">Access Denied</h3>

            <p class="text-muted mb-4">
                You do not have permission to access this page.
            </p>

            <a href="{{ route('dashboard') }}" class="btn btn-primary">
                Go to Dashboard
            </a>
        </div>
    </div>
</div>

@endsection