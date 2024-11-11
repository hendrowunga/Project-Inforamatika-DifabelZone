@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')


    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">View Product</h4>
            </div>
        </div>
        <form>

            <div class="col-md-6 col-sm-8">
                <div class="form-group">
                    <label>Name Product</label>
                    <input class="form-control" type="text" placeholder="" readonly="">
                </div>
            </div>
            <div class="col-md-6 col-sm-8">
                <div class="form-group">
                    <label>Slug</label>
                    <input class="form-control" type="text" placeholder="" readonly="">
                </div>
            </div>
            <div class="col-md-6 col-sm-8">
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>

            <div class="col-md-6 col-sm-8">
                <div class="form-group">
                    <label>Price</label>
                    <input class="form-control" type="text" placeholder="" readonly="">
                </div>
            </div>

            <div class="col-md-4 mb-20">

                <a class="card-box d-block mx-auto pd-20 text-secondary">
                    <div class="img pb-30">
                        <img src="" class="img-thumbnail" alt="Category Image">
                    </div>
                </a>

            </div>
            <div class="form-group mb-3">
                <label for="category_id">Category <span class="text-danger"></span></label>
                <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                    <option value="">Select Category</option>
                    {{-- @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach --}}
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-4 mb-20">
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
                                <input type="checkbox" class="custom-control-input" id="is_featured" name="is_featured"
                                    {{ old('is_featured') ? 'checked' : '' }}>
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


            <div class="form-group mt-4">
                <a href="{{ route('admin.manage-products.product_list') }}" class="btn btn-primary">
                    Cancel
                </a>
            </div>
        </form>

    </div>


@endsection
