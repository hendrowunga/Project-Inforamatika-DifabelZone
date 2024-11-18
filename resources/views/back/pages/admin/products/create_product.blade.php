@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Create Product')
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Create New Product</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.home') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.manage-products.product_list') }}">Products</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Create New Product
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="pd-20 card-box mb-30">

        <form action="{{ route('admin.manage-products.product_store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group mb-3">
                        <label for="name">Product Name <span class="text-danger">*</span></label>
                        <input type="text" name="name"
                            class="form-control form-control-sm @error('name') is-invalid @enderror" id="name"
                            value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="slug">Slug <span class="text-danger"></span></label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                            name="slug" value="{{ old('slug') }}" readonly>
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="category_id">Category <span class="text-danger">*</span></label>
                        <select class="form-control @error('category_id') is-invalid @enderror" id="category_id"
                            name="category_id">
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

                    <div class="form-group mb-3">
                        <label for="description">Description <span class="text-danger">*</span></label>
                        <ul class="wysihtml5-toolbar" style="">
                            <li class="dropdown"><a class="btn dropdown-toggle" data-toggle="dropdown" href="#"><i
                                        class="fa fa-font"></i>&nbsp;<span class="current-font">Normal
                                        text</span>&nbsp;<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="div"
                                            href="javascript:;" unselectable="on">Normal text</a></li>
                                    <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1"
                                            href="javascript:;" unselectable="on">Heading 1</a></li>
                                    <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h2"
                                            href="javascript:;" unselectable="on">Heading 2</a></li>
                                    <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h3"
                                            href="javascript:;" unselectable="on">Heading 3</a></li>
                                </ul>
                            </li>
                            <li>
                                <div class="btn-group"><a class="btn" data-wysihtml5-command="bold" title="CTRL+B"
                                        href="javascript:;" unselectable="on">Bold</a><a class="btn"
                                        data-wysihtml5-command="italic" title="CTRL+I" href="javascript:;"
                                        unselectable="on">Italic</a><a class="btn" data-wysihtml5-command="underline"
                                        title="CTRL+U" href="javascript:;" unselectable="on">Underline</a></div>
                            </li>
                            <li>
                                <div class="btn-group"><a class="btn" data-wysihtml5-command="insertUnorderedList"
                                        title="Unordered list" href="javascript:;" unselectable="on"><i
                                            class="fa fa-list"></i></a><a class="btn"
                                        data-wysihtml5-command="insertOrderedList" title="Ordered list"
                                        href="javascript:;" unselectable="on"><i class="fa fa-th-list"></i></a><a
                                        class="btn" data-wysihtml5-command="Outdent" title="Outdent"
                                        href="javascript:;" unselectable="on"><i class="fa fa-outdent"></i></a><a
                                        class="btn" data-wysihtml5-command="Indent" title="Indent"
                                        href="javascript:;" unselectable="on"><i class="fa fa-indent"></i></a></div>
                            </li>
                            <li>
                                <div class="btn-group"><a class="btn" data-wysihtml5-action="change_view"
                                        title="Edit HTML" href="javascript:;" unselectable="on"><i
                                            class="fa fa-pencil"></i></a></div>
                            </li>
                            <li><a class="btn" data-wysihtml5-command="createLink" title="Insert link"
                                    href="javascript:;" unselectable="on"><i class="fa fa-link"></i></a></li>
                            <li>
                                <div class="bootstrap-wysihtml5-insert-image-modal modal fade bs-example-modal-lg"
                                    style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header"><a class="close" data-dismiss="modal"></a>
                                                <h3>Insert image</h3>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group"><input value="http://"
                                                        class="bootstrap-wysihtml5-insert-image-url  m-wrap large form-control"
                                                        type="text"></div>
                                            </div>
                                            <div class="modal-footer"><a href="#" class="btn"
                                                    data-dismiss="modal">Cancel</a><a href="#"
                                                    class="btn  green btn-primary" data-dismiss="modal">Insert
                                                    image</a></div>
                                        </div>
                                    </div>
                                </div><a class="btn" data-wysihtml5-command="insertImage" title="Insert image"
                                    href="javascript:;" unselectable="on"><i class="fa fa-image "></i></a>
                            </li>
                        </ul>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                            rows="4">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group mb-3">
                        <label for="price">Price <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                            name="price" value="{{ old('price') }}" step="0.01">
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="images">Product Images <span class="text-danger">*</span></label>
                        <input type="file" class="form-control @error('images') is-invalid @enderror" id="images"
                            name="images[]" multiple accept="image/*">
                        <small class="text-muted">Allowed formats: JPG, PNG, SVG. Max size: 2MB</small>
                        @error('images')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @error('images.*')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="is_active" name="is_active"
                                        {{ old('is_active', true) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="is_active">Active Status</label>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="is_featured"
                                        name="is_featured" {{ old('is_featured') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="is_featured">Featured Product</label>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="in_stock" name="in_stock"
                                        {{ old('in_stock', true) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="in_stock">In Stock</label>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="on_sale" name="on_sale"
                                        {{ old('on_sale') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="on_sale">On Sale</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Create Product
                </button>
                <a href="{{ route('admin.manage-products.product_list') }}" class="btn btn-secondary">
                    Cancel
                </a>
            </div>
        </form>
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
