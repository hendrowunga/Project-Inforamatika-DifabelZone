@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">{{ $pageTitle }}</h2>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.manage-users.user_store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- First Name Field -->
                <div class="form-group">
                    <label for="firstname">First Name <span class="text-danger">*</span></label>
                    <input type="text" name="firstname"
                        class="form-control form-control-sm @error('firstname') is-invalid @enderror" id="firstname"
                        value="{{ old('firstname') }}">
                    @error('firstname')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Last Name Field -->
                <div class="form-group">
                    <label for="lastname">Last Name <span class="text-danger">*</span></label>
                    <input type="text" name="lastname"
                        class="form-control form-control-sm @error('lastname') is-invalid @enderror" id="lastname"
                        value="{{ old('lastname') }}">
                    @error('lastname')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Username Field -->
                <div class="form-group">
                    <label for="username">Username <span class="text-danger">*</span></label>
                    <input type="text" name="username"
                        class="form-control form-control-sm @error('username') is-invalid @enderror" id="username"
                        value="{{ old('username') }}">
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="form-group">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email"
                        class="form-control form-control-sm @error('email') is-invalid @enderror" id="email"
                        value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <!-- Email Verified Field with Date Picker -->
                <div class="form-group">
                    <label for="email_verified_at">Email Verified At <span class="text-danger">*</span></label>
                    <input type="datetime-local" name="email_verified_at" id="email_verified_at"
                        class="form-control form-control-sm @error('email_verified_at') is-invalid @enderror"
                        value="{{ old('email_verified_at') }}">
                    @error('email_verified_at')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="form-group">
                    <label for="password">Password <span class="text-danger">*</span></label>
                    <input type="password" name="password"
                        class="form-control form-control-sm @error('password') is-invalid @enderror" id="password"
                        value="{{ old('password') }}">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password Field -->
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                    <input type="password" name="password_confirmation"
                        class="form-control form-control-sm @error('password_confirmation') is-invalid @enderror"
                        id="password_confirmation" value="{{ old('password_confirmation') }}">
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Create User</button>
                <a href="{{ route('admin.manage-users.user_list') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
