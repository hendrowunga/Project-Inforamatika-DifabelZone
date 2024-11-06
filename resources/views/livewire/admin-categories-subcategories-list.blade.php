<div>
    <div class="row">
        <div class="col-md-12">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <div class="h4 text-blue"> Categories </div>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('admin.manage-categories.add-category') }}" class="btn btn-primary btn-sm"
                            type="button">
                            <i class="fa fa-plus"></i>
                            Add Category
                        </a>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table table-borderless table-striped">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th>Category Image</th>
                                <th>Category Name</th>
                                <th>N. of sub category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0" id="sortable_categories">
                            @forelse ($categories as $item)
                                <tr data-index="{{ $item->id }}" data-ordering="{{ $item->ordering }}">
                                    <td>
                                        <div class="avatar mr-2">
                                            <img src="/images/categories/{{ $item->category_image }}" width="50"
                                                height="50" alt="">
                                        </div>
                                    </td>
                                    <td>
                                        {{ $item->category_name }}
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        <div class="table-actions">
                                            <a href="{{ route('admin.manage-categories.edit-category', ['id' => $item->id]) }}"
                                                class="text-primary">
                                                <i class="dw dw-edit2"></i>
                                            </a>
                                            <a href="javascript:;" class="text-danger deleteCategoryBtn"
                                                data-id="{{ $item->id }}">
                                                <i class="dw dw-delete-3"></i>
                                            </a>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <span class="text-danger">No category found!</span>
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <div class="h4 text-blue"> Sub Categories </div>
                    </div>
                    <div class="pull-right">
                        <a href="" class="btn btn-primary btn-sm" type="button">
                            <i class="fa fa-plus"></i>
                            Add Sub Category
                        </a>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table table-borderless table-striped">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th>Sub Category Name</th>
                                <th>Category Name</th>
                                <th>N. of Child Subs.</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <tr>
                                {{-- <td>
                                    <div class="avatar mr-2">
                                        <img src="" width="50" height="50" alt="">
                                    </div>
                                </td> --}}
                                <td>
                                    Tas Selempang
                                </td>
                                <td>
                                    Bag
                                </td>
                                <td>
                                    none
                                </td>
                                <td>
                                    <div class="table-actions">
                                        <a href="" class="text-primary">
                                            <i class="dw dw-edit2"></i>
                                        </a>
                                        <a href="" class="text-danger">
                                            <i class="dw dw-delete-3"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
