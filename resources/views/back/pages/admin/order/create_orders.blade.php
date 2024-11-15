@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Create New Order')
@section('content')

    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Create New Order</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.home') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.manage-orders.order_list') }}">Orders</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Create New Order
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Order Information -->
    <div class="page-header mt-4">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="row mt-4">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Order Information</h4>
                        </div>
                    </div>
                </div>
                <div class="pb-20 mt-4">
                    <form action="{{ route('admin.manage-orders.order_store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Customer Selection -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Customer <span class="text-danger">*</span></label>
                                    <select name="user_id" class="form-control @error('user_id') is-invalid @enderror"
                                        required>
                                        <option value="">Select Customer</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                                {{ $user->username }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('user_id')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Payment Method -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Payment Method <span class="text-danger">*</span></label>
                                    <select name="payment_method"
                                        class="form-control @error('payment_method') is-invalid @enderror" required>
                                        <option value="">Select Payment Method</option>
                                        <option value="COD" {{ old('payment_method') == 'COD' ? 'selected' : '' }}>Cash
                                            on
                                            Delivery
                                        </option>
                                        <option value="TRANSFER"
                                            {{ old('payment_method') == 'TRANSFER' ? 'selected' : '' }}>
                                            Bank
                                            Transfer</option>
                                        <option value="E-WALLET"
                                            {{ old('payment_method') == 'E-WALLET' ? 'selected' : '' }}>
                                            E-Wallet
                                        </option>
                                    </select>
                                    @error('payment_method')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Payment Status -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Payment Method <span class="text-danger">*</span></label>
                                    <select name="payment_status"
                                        class="form-control @error('payment_status') is-invalid @enderror" required>
                                        <option value="">Select Payment Status</option>
                                        {{-- <option value="COD" {{ old('payment_method') == 'COD' ? 'selected' : '' }}>Cash on Delivery
                            </option>
                            <option value="TRANSFER" {{ old('payment_method') == 'TRANSFER' ? 'selected' : '' }}>Bank
                                Transfer</option>
                            <option value="E-WALLET" {{ old('payment_method') == 'E-WALLET' ? 'selected' : '' }}>E-Wallet
                            </option> --}}
                                    </select>
                                    {{-- @error('payment_method')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror --}}
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status <span class="text-danger">*</span></label>
                                    <div class="row justify-content-center">
                                        <div class="btn-list">
                                            <!-- Input tersembunyi untuk menyimpan status yang dipilih -->
                                            <input type="hidden" name="order_status" id="order_status"
                                                value="{{ old('order_status', 'New') }}">

                                            <!-- Tombol Status -->
                                            @php
                                                $statuses = [
                                                    'New' => '&#128196;',
                                                    'Processing' => '&#x21BB;',
                                                    'Shipped' => '&#128666;',
                                                    'Delivered' => '&#128230;',
                                                    'Canceled' => '&#10060;',
                                                ];
                                            @endphp
                                            @foreach ($statuses as $status => $icon)
                                                <button type="button"
                                                    class="btn btn-outline-secondary status-btn {{ old('order_status') == $status ? 'btn-primary text-white' : '' }}"
                                                    data-status="{{ $status }}">
                                                    {!! $icon !!} {{ $status }}
                                                </button>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <!-- Currency -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Currency <span class="text-danger">*</span></label>
                                    <select name="currency" class="form-control @error('currency') is-invalid @enderror"
                                        required>
                                        <option value="">Select Currency</option>
                                        {{-- <option value="COD" {{ old('payment_method') == 'COD' ? 'selected' : '' }}>Cash on Delivery
                            </option>
                            <option value="TRANSFER" {{ old('payment_method') == 'TRANSFER' ? 'selected' : '' }}>Bank
                                Transfer</option>
                            <option value="E-WALLET" {{ old('payment_method') == 'E-WALLET' ? 'selected' : '' }}>E-Wallet
                            </option> --}}
                                    </select>
                                    {{-- @error('payment_method')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror --}}
                                </div>
                            </div>

                            <!-- Shipping Method -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Shipping Method <span class="text-danger">*</span></label>
                                    <select name="shipping_method"
                                        class="form-control @error('shipping_method') is-invalid @enderror" required>
                                        <option value="">Select Shipping Method</option>
                                        <option value="JNE" {{ old('shipping_method') == 'JNE' ? 'selected' : '' }}>JNE
                                        </option>
                                        <option value="JNT" {{ old('shipping_method') == 'JNT' ? 'selected' : '' }}>J&T
                                        </option>
                                        <option value="SICEPAT"
                                            {{ old('shipping_method') == 'SICEPAT' ? 'selected' : '' }}>
                                            SiCepat
                                        </option>
                                    </select>
                                    @error('shipping_method')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>



                            <!-- Notes -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Notes</label>
                                    <textarea name="notes" class="form-control @error('notes') is-invalid @enderror" rows="4">{{ old('notes') }}</textarea>
                                    @error('notes')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <!-- Order Items -->
    <div class="page-header mt-4">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="row mt-4">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Order Items</h4>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">
                            <a class="btn btn-danger" href="" role="button">
                                Delete
                            </a>
                        </div>
                    </div>
                </div>
                <div class="pb-20 mt-4">
                    <div class="row">
                        <!-- Product Selection -->
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>Product <span class="text-danger">*</span></label>
                                <select name="product_id" class="form-control @error('product_id') is-invalid @enderror"
                                    required>
                                    <option value="">Select Product</option>
                                    {{-- @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                            {{ $user->username }}
                                        </option>
                                    @endforeach --}}
                                </select>

                                {{-- @error('user_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror --}}
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <div class="form-group">
                                <label>Quantity <span class="text-danger">*</span></label>
                                <input type="text" name="quantity"
                                    class="form-control form-control-sm @error('quantity') is-invalid @enderror"
                                    id="quantity" value="{{ old('quantity') }}">
                                @error('quantity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <div class="form-group">
                                <label>Unit Amount </label>
                                <input type="text" class="form-control @error('unit_amount') is-invalid @enderror"
                                    id="unit_amount" name="unit_amount" value="{{ old('unit_amount') }}" readonly>
                                @error('unit_amount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>Total <span class="text-danger">*</span></label>
                                <input type="text" name="total"
                                    class="form-control form-control-sm @error('total') is-invalid @enderror"
                                    id="total" value="{{ old('total') }}">
                                @error('total')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add More Items Button -->
                <div class="col-md-12 col-sm-12 text-center">
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#addItemModal">
                        Add More Items
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Form action -->
    <div class="row">
        <div class="col-md-12 text-left">
            <button type="submit" class="btn btn-primary mr-2" style="margin-bottom: 30px;">Create Order</button>
            <button type="reset" class="btn btn-secondary" style="margin-bottom: 30px;">Reset</button>
        </div>
    </div>

    <!-- Address -->
    <div class="page-header mt-4">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="row mt-4">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4> Address</h4>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">
                            <a class="btn btn-primary" href="" role="button">
                                New Address
                            </a>
                        </div>
                    </div>
                </div>
                <div class="pb-20 mt-4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="data-table table stripe hover nowrap dataTable" id="DataTables_Table_0"
                                role="grid">
                                <thead>
                                    <tr role="row">
                                        <th class="text-left ml-3">Street Name</th>
                                        <th class="text-center mr-3">Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <tr role="row" class="even">
                                        <td class="text-left mx-3">Jalan patimura</td> <!-- Menambahkan margin kiri -->
                                        <td class="text-center mr-3"> <!-- Menambahkan margin kanan -->
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                    href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a class="dropdown-item" href="#"><i class="dw dw-eye"></i>
                                                        View</a>
                                                    <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i>
                                                        Edit</a>
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
                            <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">
                                1-10 of 12 entries</div>
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
@endsection

@section('scripts')
    <script>
        // Add any JavaScript for form handling here
        $(document).ready(function() {
            // Example: Initialize select2 for better dropdown experience
            $('select').select2({
                width: '100%'
            });
        });
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll(".status-btn").forEach(button => {
                button.addEventListener("click", () => {
                    document.querySelectorAll(".status-btn").forEach(btn =>
                        btn.classList.remove("btn-primary", "text-white"));
                    button.classList.add("btn-primary", "text-white");
                    document.getElementById("order_status").value = button.dataset.status;
                });
            });
        });
    </script>
@endsection
