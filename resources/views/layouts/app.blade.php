<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StockPilot</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body{
            margin:0;
            font-family:Arial, Helvetica, sans-serif;
            background:#f4f6f9;
        }

        nav{
            background:#1f2937;
            padding:15px 30px;
        }

        nav a{
            color:white;
            text-decoration:none;
            margin-right:20px;
            font-weight:bold;
        }

        .container{
            width:90%;
            margin:30px auto;
        }

        table{
            width:100%;
            border-collapse:collapse;
            background:white;
        }

        table th,
        table td{
            border:1px solid #ddd;
            padding:10px;
        }

        table th{
            background:#eee;
        }

        .btn{
            display:inline-block;
            padding:8px 14px;
            background:#2563eb;
            color:white;
            text-decoration:none;
            border-radius:5px;
        }

        .btn-danger{
            background:#dc2626;
        }

        .btn-success{
            background:#16a34a;
        }
    </style>

</head>

<body>

<nav>

    <a href="{{ route('dashboard') }}">Dashboard</a>

    <a href="{{ route('categories.index') }}">Categories</a>

    <a href="{{ route('suppliers.index') }}">Suppliers</a>

    <a href="{{ route('products.index') }}">Products</a>

    <a href="{{ route('stock-movements.index') }}">Stock</a>

</nav>

<div class="container">

    @yield('content')

</div>

</body>
</html>