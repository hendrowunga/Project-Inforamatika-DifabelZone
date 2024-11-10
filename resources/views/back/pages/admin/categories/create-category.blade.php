@extends('back.layout.pages-layout')

@section('pageTitle', $pageTitle)

@section('content')


    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h2 class="card-title">{{ $pageTitle }}</h2>
            <a href="{{ route('admin.manage-categories.cats-subcats-list') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left-circle"></i> Back to Categories
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.manage-categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label for="name">Category Name<span class="text-danger">*</span></label>
                    <input type="text" name="name"
                        class="form-control form-control-sm @error('name') is-invalid @enderror" id="name"
                        value="{{ old('name') }}" onkeyup="createSlug()">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug"
                        class="form-control form-control-sm @error('slug') is-invalid @enderror" id="slug"
                        value="{{ old('slug') }}" readonly>
                    @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="image">Category Image</label>
                    <input type="file" name="image"
                        class="form-control form-control-sm @error('image') is-invalid @enderror" id="image"
                        onchange="previewImage(event)">
                    <small class="text-muted">Allowed formats: JPG, PNG, SVG. Max size: 2MB</small>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-2" id="imagePreviewContainer" style="display: none;">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Image Preview</h5>
                            <img id="preview" src="" alt="Preview" class="img-fluid" style="max-height: 200px;">
                        </div>
                    </div>
                </div>
        </div>

        <div class="form-group mb-3">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1"
                    {{ old('is_active') ? 'checked' : '' }}>
                <label class="custom-control-label" for="is_active">Active Status</label>
            </div>
        </div>

        <div class="form-group d-flex justify-content-end gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Create Category
            </button>
        </div>
        </form>
    </div>
    </div>

    @push('scripts')
        <script>
            // Function to create slug from name
            function createSlug() {
                let name = document.getElementById('name').value;
                let slug = name.toLowerCase()
                    .replace(/[^\w\s-]/g, '') // Remove special characters
                    .replace(/\s+/g, '-') // Replace spaces with -
                    .replace(/--+/g, '-') // Replace multiple - with single -
                    .trim(); // Trim - from start and end
                document.getElementById('slug').value = slug;
            }

            // Function to preview image
            function previewImage(input) {
                const preview = document.getElementById('preview');
                const previewContainer = document.getElementById('imagePreviewContainer');

                if (input.files && input.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        previewContainer.style.display = 'block';
                    }

                    reader.readAsDataURL(input.files[0]);
                } else {
                    preview.src = '';
                    previewContainer.style.display = 'none';
                }
            }
        </script>
    @endpush


@endsection
