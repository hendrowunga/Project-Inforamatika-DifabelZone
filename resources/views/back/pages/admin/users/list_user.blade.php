@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
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
                            User
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h2 class="card-title">{{ $pageTitle }}</h2>
            <a href="{{ route('admin.manage-users.user_create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> New User
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
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Firstname</th>
                        <th class="text-center">Lastname</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Email Verified At</th>
                        <th class="text-center">Created At</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($user as $index => $usr)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="text-center">{{ $usr->username }}</td>
                            <td class="text-center">{{ $usr->firstname }}</td>
                            <td class="text-center">{{ $usr->lastname }}</td>
                            <td class="text-center">{{ $usr->email }}</td>
                            <td class="text-center">
                                {{ $usr->email_verified_at ? $usr->email_verified_at->format('d-m-Y H:i:s') : 'Not Verified' }}
                            </td> <!-- Menampilkan tanggal verifikasi -->
                            <td class="text-center">{{ $usr->created_at->format('d-m-Y H:i:s') }}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-link" type="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <!-- View Action -->
                                        <a class="dropdown-item"
                                            href="{{ route('admin.manage-users.user_show', $usr->id) }}">
                                            <i class="bi bi-eye"></i> View
                                        </a>

                                        <!-- Edit Action -->
                                        <a class="dropdown-item"
                                            href="{{ route('admin.manage-users.user_edit', $usr->id) }}">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>

                                        <!-- Delete Action -->
                                        <button class="dropdown-item" data-toggle="modal"
                                            data-target="#deleteModal{{ $usr->id }}">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <!-- Modal for Delete Confirmation -->
                        <div class="modal fade" id="deleteModal{{ $usr->id }}" tabindex="-1"
                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this user? This action cannot be undone.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancel</button>
                                        <form action="{{ route('admin.manage-users.user_destroy', $usr->id) }}"
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
                            <td colspan="8" class="text-center">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
