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
            <div class="row">
                <div class="col-md-3 col-sm-8">
                    <div class="form-group">
                        <label>Name Product</label>
                        <input class="form-control" type="text" placeholder="" readonly="">
                    </div>
                </div>
                <div class="col-md-3 col-sm-8">
                    <div class="form-group">
                        <label>Slug</label>
                        <input class="form-control" type="text" placeholder="" readonly="">
                    </div>
                </div>

            </div>

            <div class="form-group mt-4">
                <a href="" class="btn btn-primary">
                    Cancel
                </a>
            </div>
        </form>

    </div>


@endsection
