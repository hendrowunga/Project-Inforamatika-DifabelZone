@extends('back.layout.pages-layout')

@section('pageTitle', $pageTitle)

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">{{ $pageTitle }}</h2>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Category Name</label>
                <p>{{ $category->name }}</p>
            </div>
            <div class="form-group">
                <label>Slug</label>
                <p>{{ $category->slug }}</p>
            </div>
            <div class="form-group">
                <label>Image</label>
                <img src="{{ Storage::url($category->image) }}" width="100" alt="">
            </div>
            <div class="form-group">
                <label>Is Active</label>
                <p>{{ $category->is_active ? 'Yes' : 'No' }}</p>
            </div>
        </div>
    </div>
@endsection
