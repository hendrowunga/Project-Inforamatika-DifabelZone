@extends('back.layout.pages-layout')
@section('pageTitle', $pageTitle)
@section('content')
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
                            <th>Category</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th class="text-center">Featured</th>
                            <th class="text-center">Sale</th>
                            <th class="text-center">Stock</th>
                            <th class="text-center">Active</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $index => $product)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->name }}</td>
                                <td>${{ number_format($product->price, 2) }}</td>
                                <td class="text-center">
                                    <span class="status-dot {{ $product->is_featured ? 'active' : 'inactive' }}">
                                        <i class="fas {{ $product->is_featured ? 'fa-check' : 'fa-times' }}"></i>
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="status-dot {{ $product->on_sale ? 'active' : 'inactive' }}">
                                        <i class="fas {{ $product->on_sale ? 'fa-check' : 'fa-times' }}"></i>
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="status-dot {{ $product->in_stock ? 'active' : 'inactive' }}">
                                        <i class="fas {{ $product->in_stock ? 'fa-check' : 'fa-times' }}"></i>
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="status-dot {{ $product->is_active ? 'active' : 'inactive' }}">
                                        <i class="fas {{ $product->is_active ? 'fa-check' : 'fa-times' }}"></i>
                                    </span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0" data-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a class="dropdown-item text-danger" href="#">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
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

    <style>
        .status-dot {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 24px;
            height: 24px;
            border-radius: 50%;
        }

        .status-dot.active {
            background-color: #28a745;
            color: white;
        }

        .status-dot.inactive {
            background-color: #dc3545;
            color: white;
        }

        .status-dot i {
            font-size: 12px;
        }
    </style>
@endsection
