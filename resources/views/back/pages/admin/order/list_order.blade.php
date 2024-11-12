@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Order</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.home') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Order
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="widget-data">
                        <div class="h4 mb-0">New Order</div>
                        <div class="weight-600 font-14">12</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="widget-data">
                        <div class="h4 mb-0">Order Processing</div>
                        <div class="weight-600 font-14">12</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="widget-data">
                        <div class="h4 mb-0">Average Price</div>
                        <div class="weight-600 font-14">Rp. 12</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="btn-list">
            <button type="button" class="btn btn-outline-secondary">
                All
            </button>
            <button type="button" class="btn btn-outline-secondary">
                New
            </button>
            <button type="button" class="btn btn-outline-secondary">
                Processing
            </button>
            <button type="button" class="btn btn-outline-secondary">
                Shipped
            </button>
            <button type="button" class="btn btn-outline-secondary">
                Deliverd
            </button>
            <button type="button" class="btn btn-outline-secondary">
                Cancled
            </button>

        </div>
    </div>

    <div class="page-header mt-4">
        <div class="row">
            <div class="col-md-12 col-sm-12">


                <div class="row mt-4">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Orders</h4>
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">
                            <a class="btn btn-primary" href="#" role="button">
                                New Order
                            </a>
                        </div>
                    </div>
                </div>
                <div class="pb-20 mt-4">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row d-flex justify-content-between">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="DataTables_Table_0_length">
                                    <label>Show
                                        <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0"
                                            class="custom-select custom-select-sm form-control form-control-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="-1">All</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 d-flex justify-content-end">
                                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                    <label>Search:
                                        <input type="search" class="form-control form-control-sm" placeholder="Search"
                                            aria-controls="DataTables_Table_0">
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <table class="data-table table stripe hover nowrap dataTable" id="DataTables_Table_0"
                                    role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th class="text-center">User</th>
                                            <th class="text-center">Grand Total</th>
                                            <th class="text-center">Payment Method</th>
                                            <th class="text-center">Payment Status</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Shiping method</th>
                                            <th class="text-center">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr role="row" class="even">
                                            <td class="text-center">Andrea J. Cagle</td>
                                            <td class="text-center">Rp. 30,000</td>
                                            <td class="text-center">COD</td>
                                            <td class="text-center">pending</td>
                                            <td class="text-center">cancled</td>
                                            <td class="text-center">JNT</td>
                                            <td class="text-center">
                                                <div class="dropdown">
                                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                        href="#" role="button" data-toggle="dropdown">
                                                        <i class="dw dw-more"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                        <a class="dropdown-item" href="#"><i class="dw dw-eye"></i>
                                                            View</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="dw dw-edit2"></i> Edit</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="dw dw-delete-3"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="DataTables_Table_0_info" role="status"
                                    aria-live="polite">1-10 of 12 entries</div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled"
                                            id="DataTables_Table_0_previous"><a href="#"
                                                aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0"
                                                class="page-link"><i class="ion-chevron-left"></i></a></li>
                                        <li class="paginate_button page-item active"><a href="#"
                                                aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0"
                                                class="page-link">1</a></li>
                                        <li class="paginate_button page-item "><a href="#"
                                                aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0"
                                                class="page-link">2</a></li>
                                        <li class="paginate_button page-item next" id="DataTables_Table_0_next"><a
                                                href="#" aria-controls="DataTables_Table_0" data-dt-idx="3"
                                                tabindex="0" class="page-link"><i class="ion-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
