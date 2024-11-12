{{-- @extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-dark">Add Category</h4>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('admin.manage-categories.cats-subcats-list') }}" class="btn btn-primary btn-sm">
                            <i class="ion-arrow-left-a"></i> Back to categories list
                        </a>
                    </div>
                </div>
                <hr>
                <form action="{{ route('admin.manage-categories.store-category') }}" method="POST"
                    enctype="multipart/form-data" class="mt-3">
                    @csrf
                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            <strong><i class="dw dw-checked"></i></strong>
                            {!! Session::get('success') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            <strong><i class="dw dw-checked"></i></strong>
                            {!! Session::get('fail') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="">Category nama</label>
                                <input type="text" class="form-control" name="category_name"
                                    placeholder="Enter category name" value="{{ old('category_name') }}">
                                @error('category_name')
                                    <span class="text-danger ml-2">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="">Category image</label>
                                <input type="file" name="category_image" id="" class="form-control">
                                @error('category_image')
                                    <span class="text-danger ml-2">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="avatar mb-3">
                                <img src="" alt="" data-ijabo-default-img="" width="50" height="50"
                                    id="category_image_preview">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">CREATE</button>
                </form>
            </div>
        </div>
    </div>
@endsection --}}
{{-- @push('scripts')
    <script>
        $('input[type="file"][name="category_image"]').ijaboViewer({
            preview: '#category_image_preview',
            imageShape: 'square',
            allowedExtensions: ['png', 'jpg', 'jpeg', 'svg'],
            onErrorShape: function(message, element) {
                alert(message);
            },
            onInvalidType: function(message, element) {
                alert(message);
            },
            onSuccess: function(message, element) {}
        });
    </script>
@endpush --}}

@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-dark">Add Category</h4>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('admin.manage-categories.cats-subcats-list') }}" class="btn btn-primary btn-sm">
                            <i class="ion-arrow-left-a"></i> Back to categories list
                        </a>
                    </div>
                </div>
                <hr>
                <form action="{{ route('admin.manage-categories.store-category') }}" method="POST"
                    enctype="multipart/form-data" class="mt-3">
                    @csrf
                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            <strong><i class="dw dw-checked"></i></strong>
                            {!! Session::get('success') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            <strong><i class="dw dw-checked"></i></strong>
                            {!! Session::get('fail') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="">Category name</label>
                                <input type="text" class="form-control" name="category_name"
                                    placeholder="Enter category name" value="{{ old('category_name') }}">
                                @error('category_name')
                                    <span class="text-danger ml-2">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="">Category image</label>
                                <input type="file" name="category_image" id="category_image" class="form-control"
                                    accept="image/*" onchange="previewImage(this);">
                                @error('category_image')
                                    <span class="text-danger ml-2">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="avatar mb-3">
                                <img src="" alt="Preview" id="preview_img"
                                    style="max-width: 200px; max-height: 200px; display: none;">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">CREATE</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function previewImage(input) {
            const preview = document.getElementById('preview_img');
            const file = input.files[0];
            const reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
                preview.style.display = 'block';
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        }

        // Validasi tipe file
        document.getElementById('category_image').addEventListener('change', function() {
            const file = this.files[0];
            const allowedTypes = ['image/jpeg', 'image/png', 'image/svg+xml'];

            if (file && !allowedTypes.includes(file.type)) {
                alert('Please select a valid image file (JPG, PNG, or SVG)');
                this.value = '';
                document.getElementById('preview_img').style.display = 'none';
            }
        });
    </script>
@endpush