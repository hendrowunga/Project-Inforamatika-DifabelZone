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
                    <input class="form-control" type="text" placeholder="{{ $products->name }}"
                        readonly="{{ $products->name }}">
                </div>
            </div>
            <div class="col-md-6 col-sm-8">
                <div class="form-group">
                    <label>Slug</label>
                    <input class="form-control" type="text" placeholder="{{ $products->slug }}"
                        readonly="{{ $products->slug }}">
                </div>
            </div>
            <div class="col-md-6 col-sm-8">
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                        placeholder="{{ $products->description }}"></textarea>
                </div>
            </div>

            <div class="col-md-6 col-sm-8">
                <div class="form-group">
                    <label>Price</label>
                    <input class="form-control" type="text" placeholder="{{ $products->price }}"
                        readonly="{{ $products->price }}">
                </div>
            </div>

            <div class="col-md-4 mb-20">
                <a class="card-box d-block mx-auto pd-20 text-secondary">
                    <div class="img pb-30">
                        <img src="{{ Storage::url($products->images[0] ?? '') }}" class="img-thumbnail" alt="Product Image">
                    </div>
                </a>
            </div>
            <div class="form-group mb-3">
                <label for="product_id">Category <span class="text-danger"></span></label>
                <select class="form-control" id="product_id" name="product_id" disabled>
                    <option value="{{ $products->category->id }}">{{ $products->category->name }}</option>
                </select>
            </div>


            <div class="col-md-4 mb-20">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Status Product</label>
                            <div class="custom-control custom-switch">

                                <input type="checkbox" class="custom-control-input" id="statusToggle"
                                    {{ $products->is_active ? 'checked' : '' }} disabled>
                                <label class="custom-control-label" for="statusToggle">
                                    {{ $products->is_active ? 'Active' : 'Inactive' }}
                                </label>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Featured Product</label>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="statusToggle"
                                    {{ $products->is_featured ? 'checked' : '' }} disabled>
                                <label class="custom-control-label" for="statusToggle">
                                    {{ $products->is_featured ? 'Active' : 'Inactive' }}
                                </label>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Stock Product</label>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="statusToggle"
                                    {{ $products->in_stock ? 'checked' : '' }} disabled>
                                <label class="custom-control-label" for="statusToggle">
                                    {{ $products->in_stock ? 'Active' : 'Inactive' }}
                                </label>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Sale Product</label>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="statusToggle"
                                    {{ $products->on_sale ? 'checked' : '' }} disabled>
                                <label class="custom-control-label" for="statusToggle">
                                    {{ $products->on_sale ? 'Active' : 'Inactive' }}
                                </label>
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
