@extends('back.layout.pages-layout')
@section('pageTitle', $pageTitle)
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Category</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.home') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Product
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h2 class="card-title">{{ $pageTitle }}</h2>
            <a href="{{ route('admin.manage-products.product_create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> New Product
            </a>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="text-center">Category</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Featured</th>
                            <th class="text-center">Sale</th>
                            <th class="text-center">Stock</th>
                            <th class="text-center">Active</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $index => $product)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="text-center">{{ $product->category->name }}</td>
                                <td class="text-center">{{ $product->name }}</td>
                                <td class="text-center">Rp {{ number_format($product->price, 2) }}</td>
                                <td class="text-center">
                                    <span class="badge {{ $product->is_featured ? 'badge-success' : 'badge-danger' }}">
                                        <i class="bi {{ $product->is_featured ? 'bi-check-circle' : 'bi-x-circle' }}"></i>
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="badge {{ $product->on_sale ? 'badge-success' : 'badge-danger' }}">
                                        <i class="bi {{ $product->on_sale ? 'bi-check-circle' : 'bi-x-circle' }}"></i>
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="badge {{ $product->in_stock ? 'badge-success' : 'badge-danger' }}">
                                        <i class="bi {{ $product->in_stock ? 'bi-check-circle' : 'bi-x-circle' }}"></i>
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="badge {{ $product->is_active ? 'badge-success' : 'badge-danger' }}">
                                        <i class="bi {{ $product->is_active ? 'bi-check-circle' : 'bi-x-circle' }}"></i>
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-link" type="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <!-- View Action -->
                                            <a class="dropdown-item"
                                                href="{{ route('admin.manage-products.view_product', $product->id) }}">
                                                <i class="bi bi-eye"></i> View
                                            </a>

                                            <!-- Edit Action -->
                                            <a class="dropdown-item"
                                                href="{{ route('admin.manage-products.product_edit', $product->id) }}">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>

                                            <!-- Delete Action -->
                                            <button class="dropdown-item" data-toggle="modal"
                                                data-target="#deleteModal{{ $product->id }}">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal for Delete Confirmation -->
                            <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1"
                                aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Delete Product</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this Product? This action cannot be undone.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancel</button>
                                            <form
                                                action="{{ route('admin.manage-products.product_destroy', $product->id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center">No products found</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
