<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product API</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand">Product API</span>
        <div class="navbar-nav ms-auto">
            <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
            <a class="nav-link" href="{{ route('products.index') }}">Products</a>
        </div>
    </div>
</nav>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1 class="display-4 mb-4">Welcome to Product API</h1>
            <p class="lead mb-5">Manage your categories and products with ease</p>
            
            <div class="d-flex justify-content-center gap-4">
                <a href="{{ route('categories.index') }}" class="btn btn-primary btn-lg">
                    View Categories
                </a>
                <a href="{{ route('products.index') }}" class="btn btn-success btn-lg">
                    View Products
                </a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
