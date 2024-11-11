@extends('back.layout.pages-layout')

@section('pageTitle', $pageTitle)

@section('content')
    <div class="card">
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
    </div>



@endsection
