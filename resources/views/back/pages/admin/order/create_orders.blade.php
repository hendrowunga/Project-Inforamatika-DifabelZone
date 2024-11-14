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

    <div class="pd-20 card-box mb-30">
        <form action="{{ route('admin.manage-orders.order_store') }}" method="POST">
            @csrf
            <div class="row">
                <!-- Customer Selection -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Customer <span class="text-danger">*</span></label>
                        <select name="user_id" class="form-control @error('user_id') is-invalid @enderror" required>
                            <option value="">Select Customer</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->username }}
                                </option>
                            @endforeach
                        </select>

                        @error('user_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Shipping Address -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Shipping Address <span class="text-danger">*</span></label>
                        <select name="address_id" class="form-control @error('address_id') is-invalid @enderror" required>
                            <option value="">Select Address</option>
                            @foreach ($addresses as $address)
                                <option value="{{ $address->id }}"
                                    {{ old('address_id') == $address->id ? 'selected' : '' }}>
                                    {{ $address->address_line1 }}, {{ $address->city }}
                                </option>
                            @endforeach
                        </select>
                        @error('address_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Payment Method <span class="text-danger">*</span></label>
                        <select name="payment_method" class="form-control @error('payment_method') is-invalid @enderror"
                            required>
                            <option value="">Select Payment Method</option>
                            <option value="COD" {{ old('payment_method') == 'COD' ? 'selected' : '' }}>Cash on Delivery
                            </option>
                            <option value="TRANSFER" {{ old('payment_method') == 'TRANSFER' ? 'selected' : '' }}>Bank
                                Transfer</option>
                            <option value="E-WALLET" {{ old('payment_method') == 'E-WALLET' ? 'selected' : '' }}>E-Wallet
                            </option>
                        </select>
                        @error('payment_method')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Shipping Method -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Shipping Method <span class="text-danger">*</span></label>
                        <select name="shipping_method" class="form-control @error('shipping_method') is-invalid @enderror"
                            required>
                            <option value="">Select Shipping Method</option>
                            <option value="JNE" {{ old('shipping_method') == 'JNE' ? 'selected' : '' }}>JNE</option>
                            <option value="JNT" {{ old('shipping_method') == 'JNT' ? 'selected' : '' }}>J&T</option>
                            <option value="SICEPAT" {{ old('shipping_method') == 'SICEPAT' ? 'selected' : '' }}>SiCepat
                            </option>
                        </select>
                        @error('shipping_method')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Grand Total -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Grand Total <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="number" name="grand_total"
                                class="form-control @error('grand_total') is-invalid @enderror"
                                value="{{ old('grand_total') }}" required min="0" step="0.01">
                        </div>
                        @error('grand_total')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Shipping Amount -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Shipping Amount <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="number" name="shipping_amount"
                                class="form-control @error('shipping_amount') is-invalid @enderror"
                                value="{{ old('shipping_amount') }}" required min="0" step="0.01">
                        </div>
                        @error('shipping_amount')
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

            <!-- Form Actions -->
            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary">Create Order</button>
                </div>
            </div>
        </form>
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
    </script>
@endsection
