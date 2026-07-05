@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="mb-0">Products</h1>

    <a href="{{ route('products.create') }}"
       class="btn btn-primary">
        Add Product
    </a>
</div>

<form id="productSearchForm"
      method="GET"
      action="{{ route('products.index') }}"
      class="mb-3">

    <div class="input-group">
        <input
            id="productSearchInput"
            type="text"
            name="search"
            class="form-control"
            placeholder="Search by product name or SKU..."
            value="{{ $search }}">

        <button class="btn btn-primary" type="submit">
            Search
        </button>

        <a href="{{ route('products.index') }}"
           id="clearSearch"
           class="btn btn-outline-secondary">
            Clear
        </a>
    </div>
</form>

<div id="productsTable">
    @include('products._table')
</div>

<br><br>

<script>
    const searchInput = document.getElementById('productSearchInput');
    const productsTable = document.getElementById('productsTable');
    const clearSearch = document.getElementById('clearSearch');

    let typingTimer;

    function fetchProducts(url) {
        fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {
            productsTable.innerHTML = html;
            bindPaginationLinks();
        });
    }

    searchInput.addEventListener('input', function () {
        clearTimeout(typingTimer);

        typingTimer = setTimeout(function () {
            const search = searchInput.value;
            const url = `{{ route('products.index') }}?search=${encodeURIComponent(search)}`;

            fetchProducts(url);
        }, 300);
    });

    clearSearch.addEventListener('click', function (event) {
        event.preventDefault();

        searchInput.value = '';
        fetchProducts(`{{ route('products.index') }}`);
        searchInput.focus();
    });

    function bindPaginationLinks() {
        document.querySelectorAll('#productsTable .pagination a').forEach(link => {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                fetchProducts(this.href);
            });
        });
    }

    bindPaginationLinks();
</script>

@endsection