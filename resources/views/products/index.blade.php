<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand">Product API</span>
        <div class="navbar-nav ms-auto">
            <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
            <a class="nav-link active" href="{{ route('products.index') }}">Products</a>
        </div>
    </div>
</nav>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Products</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Create Product</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            @if($products->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        <span class="badge bg-info">{{ $product->category->name }}</span>
                                    </td>
                                    <td>${{ number_format($product->price, 2) }}</td>
                                    <td>
                                        <span class="badge bg-{{ $product->qty > 0 ? 'success' : 'danger' }}">
                                            {{ $product->qty }} units
                                        </span>
                                    </td>
                                    <td>{{ $product->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-outline-primary me-2">Edit</a>
                                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Delete this product?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $products->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <p class="text-muted">No products found. <a href="{{ route('products.create') }}">Create one now</a></p>
                </div>
            @endif
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
