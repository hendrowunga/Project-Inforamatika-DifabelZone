@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Update User</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.home') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            {{-- {{ route('admin.manage-users.user_edit')->$id }} --}}
                            <a href="">Update</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Update User
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="pd-20 card-box mb-30">
        <form action="{{ route('admin.manage-users.user_update', $users->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="firstname">First Name <span class="text-danger"></span></label>
                <input type="text" name="firstname"
                    class="form-control form-control-sm @error('firstname') is-invalid @enderror"
                    value="{{ old('firstname', $users->firstname) }}" id="firstname">
                @error('firstname')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="lastname">Last Name <span class="text-danger"></span></label>
                <input type="text" name="lastname"
                    class="form-control form-control-sm @error('lastname') is-invalid @enderror"
                    value="{{ old('lastname', $users->lastname) }}" id="lastname">
                @error('lastname')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="username">Username <span class="text-danger"></span></label>
                <input type="text" name="username"
                    class="form-control form-control-sm @error('username') is-invalid @enderror"
                    value="{{ old('username', $users->username) }}" id="username">
                @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="email">Email <span class="text-danger"></span></label>
                <input type="email" name="email"
                    class="form-control form-control-sm @error('email') is-invalid @enderror"
                    value="{{ old('email', $users->email) }}" id="email">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email_verified_at">Email Verified At</label>
                <input type="datetime-local" name="email_verified_at"
                    class="form-control form-control-sm @error('email_verified_at') is-invalid @enderror"
                    value="{{ old('email_verified_at', $users->email_verified_at ? $users->email_verified_at->format('Y-m-d\TH:i') : '') }}"
                    id="email_verified_at">
                @error('email_verified_at')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update User</button>
            <a href="{{ route('admin.manage-users.user_list') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

@endsection
