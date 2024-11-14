@extends('back.layout.pages-layout')

@section('pageTitle', $pageTitle)

@section('content')

    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">View Category</h4>
            </div>
        </div>
        <form>
            <div class="row">
                <div class="col-md-4 mb-20">
                    <a class="card-box d-block mx-auto pd-20 text-secondary">
                        <div class="img pb-30">
                            <img src="{{ Storage::url($category->image) }}" class="img-thumbnail" alt="Category Image">
                        </div>
                    </a>

                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Name Category</label>
                        <input class="form-control" type="text" placeholder="{{ $category->name }}"
                            readonly="{{ $category->name }}">
                    </div>

                    <div class="form-group">
                        <label>Slug</label>
                        <input class="form-control" type="text" placeholder="{{ $category->slug }}"
                            readonly="{{ $category->slug }}">
                    </div>


                    <div class="form-group">
                        <label>Status</label>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="statusToggle"
                                {{ $category->is_active ? 'checked' : '' }} disabled>
                            <label class="custom-control-label" for="statusToggle">
                                {{ $category->is_active ? 'Active' : 'Inactive' }}
                            </label>
                        </div>
                    </div>

                </div>

            </div>
            <div class="form-group mt-4">
                <a href="{{ route('admin.manage-categories.cats-subcats-list') }}" class="btn btn-primary">
                    Cancel
                </a>
            </div>
        </form>

    </div>

@endsection
