<div>
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Category Management</h2>
            <div class="card-tools">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> New
                </a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="col-sm-12">
                <table class="data-table table nowrap dataTable no-footer dtr-inline" id="DataTables_Table_0"
                    role="grid" style="width: 1178px;">
                    <thead>
                        <tr role="row">
                            <th class="datatable-nosort sorting_disabled" rowspan="1" colspan="1"
                                style="width: 108px;" aria-label="category">No</th>
                            <th class="datatable-nosort sorting_disabled" rowspan="1" colspan="1"
                                style="width: 108px;" aria-label="category">Category</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 247px;"
                                aria-label="Name: activate to sort column ascending">
                                Name</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" style="width: 112px;"
                                aria-label="Color: activate to sort column ascending">
                                Slug</th>
                            <th class="datatable-nosort sorting_disabled" rowspan="1" colspan="1"
                                style="width: 108px;" aria-label="is_activate">Is_Activate</th>
                            <th class="datatable-nosort sorting_disabled" rowspan="1" colspan="1"
                                style="width: 108px;" aria-label="Action">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td class="table-plus sorting_1" tabindex="0" style="">
                                <img src="vendors/images/product-1.jpg" width="70" height="70" alt="">
                            </td>
                            <td>
                                <h5 class="font-16">Shirt</h5>
                            </td>
                            <td>shirt</td>
                            <td>1</td>
                            <td style="">
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                        href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
                                        style="">
                                        <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                        <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                        <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i>
                                            Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
