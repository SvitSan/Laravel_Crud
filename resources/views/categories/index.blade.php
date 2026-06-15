<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand">Product API</span>
        <div class="navbar-nav ms-auto">
            <a class="nav-link active" href="{{ route('categories.index') }}">Categories</a>
            <a class="nav-link" href="{{ route('products.index') }}">Products</a>
        </div>
    </div>
</nav>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Categories</h1>
        <a href="/categories/create" class="btn btn-primary">Create Category</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-bordered table-hover mb-0">
                <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Products</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>{{ $category->products_count }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-outline-primary me-2">Edit</a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Delete this category?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if($categories->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center">No categories found.</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
