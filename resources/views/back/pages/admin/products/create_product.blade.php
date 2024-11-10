@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Create Product')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Create New Product</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.manage-products.product_store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="name">Product Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="slug">Slug <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                                name="slug" value="{{ old('slug') }}" required readonly>
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category_id">Category <span class="text-danger">*</span></label>
                            <select class="form-control @error('category_id') is-invalid @enderror" id="category_id"
                                name="category_id" required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="price">Price <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="price" name="price"
                                value="{{ old('price') }}" required step="0.01">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="images">Product Images</label>
                            <input type="file" class="form-control-file" id="images" name="images[]" multiple
                                accept="image/*">
                            @error('images.*')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="is_active" name="is_active"
                                            checked>
                                        <label class="custom-control-label" for="is_active">Active Status</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="is_featured"
                                            name="is_featured">
                                        <label class="custom-control-label" for="is_featured">Featured Product</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="in_stock" name="in_stock"
                                            checked>
                                        <label class="custom-control-label" for="in_stock">In Stock</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="on_sale" name="on_sale">
                                        <label class="custom-control-label" for="on_sale">On Sale</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Create Product</button>
                    <a href="{{ route('admin.manage-products.product_list') }}" class="btn btn-secondary">Cancel</a>
                </div>
        </div>
    </div>
    </form>
    </div>
    </div>

    @push('scripts')
        <script>
            document.getElementById('name').addEventListener('input', function() {
                let slug = this.value
                    .toLowerCase()
                    .replace(/[^a-z0-9-]/g, '-')
                    .replace(/-+/g, '-')
                    .replace(/^-|-$/g, '');
                document.getElementById('slug').value = slug;
            });
        </script>
    @endpush
@endsection
