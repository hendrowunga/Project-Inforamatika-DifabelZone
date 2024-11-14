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
                            Category
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>



    {{-- <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h2 class="card-title">{{ $pageTitle }}</h2>
            <a href="{{ route('admin.manage-categories.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> New
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

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Category</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Slug</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $index => $category)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td class="text-center"><img src="{{ Storage::url($category->image) }}" width="70"
                                    height="70" alt="category image"></td>
                            <td class="text-center">{{ $category->name }}</td>
                            <td class="text-center">{{ $category->slug }}</td>
                            <td class="text-center">
                                <span class="badge {{ $category->is_active ? 'badge-success' : 'badge-secondary' }}">
                                    <i class="bi {{ $category->is_active ? 'bi-check-circle' : 'bi-x-circle' }}"></i>
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-link" type="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <!-- View Action -->
                                        <a class="dropdown-item"
                                            href="{{ route('admin.manage-categories.show', $category->id) }}">
                                            <i class="bi bi-eye"></i> View
                                        </a>

                                        <!-- Edit Action -->
                                        <a class="dropdown-item"
                                            href="{{ route('admin.manage-categories.edit', $category->id) }}">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>

                                        <!-- Delete Action -->
                                        <button class="dropdown-item" data-toggle="modal"
                                            data-target="#deleteModal{{ $category->id }}">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- Modal for Delete Confirmation -->
                        <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1"
                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this category? This action cannot be undone.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancel</button>
                                        <form action="{{ route('admin.manage-categories.destroy', $category->id) }}"
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
                            <td colspan="10" class="text-center">No category found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div> --}}

    <div class="page-header mt-4">
        <div class="row">
            <div class="col-md-12 col-sm-12">


                <div class="row mt-4">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Categories</h4>
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">
                            <a class="btn btn-primary" href="{{ route('admin.manage-categories.create') }}" role="button">
                                New Categori
                            </a>
                        </div>
                    </div>
                </div>
                <div class="pb-20 mt-4">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row d-flex justify-content-between">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="DataTables_Table_0_length">
                                    <label>Show
                                        <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0"
                                            class="custom-select custom-select-sm form-control form-control-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="-1">All</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 d-flex justify-content-end">
                                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                    <label>Search:
                                        <input type="search" class="form-control form-control-sm" placeholder="Search"
                                            aria-controls="DataTables_Table_0">
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <table class="data-table table stripe hover nowrap dataTable" id="DataTables_Table_0"
                                    role="grid">
                                    <thead>
                                        <tr role="row">

                                            <th class="text-center">No</th>
                                            <th class="text-center">Category</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Slug</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($categories as $index => $category)
                                            <tr>
                                                <td class="text-center">{{ $index + 1 }}</td>
                                                <td class="text-center"><img src="{{ Storage::url($category->image) }}"
                                                        width="70" height="70" alt="category image"></td>
                                                <td class="text-center">{{ $category->name }}</td>
                                                <td class="text-center">{{ $category->slug }}</td>
                                                <td class="text-center">
                                                    <span
                                                        class="badge {{ $category->is_active ? 'badge-success' : 'badge-secondary' }}">
                                                        <i
                                                            class="bi {{ $category->is_active ? 'bi-check-circle' : 'bi-x-circle' }}"></i>
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
                                                                href="{{ route('admin.manage-categories.show', $category->id) }}">
                                                                <i class="bi bi-eye"></i> View
                                                            </a>

                                                            <!-- Edit Action -->
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.manage-categories.edit', $category->id) }}">
                                                                <i class="bi bi-pencil-square"></i> Edit
                                                            </a>

                                                            <!-- Delete Action -->
                                                            <button class="dropdown-item" data-toggle="modal"
                                                                data-target="#deleteModal{{ $category->id }}">
                                                                <i class="bi bi-trash"></i> Delete
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Modal for Delete Confirmation -->
                                            <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1"
                                                aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel">Delete Category
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this category? This action
                                                            cannot be undone.
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cancel</button>
                                                            <form
                                                                action="{{ route('admin.manage-categories.destroy', $category->id) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Yes,
                                                                    Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <tr>
                                                <td colspan="10" class="text-center">No category found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="DataTables_Table_0_info" role="status"
                                    aria-live="polite">
                                    1-10 of 12 entries</div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled"
                                            id="DataTables_Table_0_previous"><a href="#"
                                                aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0"
                                                class="page-link"><i class="ion-chevron-left"></i></a></li>
                                        <li class="paginate_button page-item active"><a href="#"
                                                aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0"
                                                class="page-link">1</a></li>
                                        <li class="paginate_button page-item "><a href="#"
                                                aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0"
                                                class="page-link">2</a></li>
                                        <li class="paginate_button page-item next" id="DataTables_Table_0_next"><a
                                                href="#" aria-controls="DataTables_Table_0" data-dt-idx="3"
                                                tabindex="0" class="page-link"><i class="ion-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
