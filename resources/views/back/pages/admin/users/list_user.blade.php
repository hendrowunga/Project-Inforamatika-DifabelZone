@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
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
                                        {{-- <form action="{{ route('admin.manage-users.user_destroy', $usr->id) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item" type="submit"
                                                onclick="return confirm('Are you sure?')">
                                                <i class="bi bi-trash"></i> Delete
                                            </button> --}}
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
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
