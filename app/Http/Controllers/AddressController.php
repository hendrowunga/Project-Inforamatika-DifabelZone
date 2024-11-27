<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Customer;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        return auth('customer')->user()->addresses;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'province_id' => 'required|exists:provinces,id',
            'regency_id' => 'required|exists:regencies,id',
            'district_id' => 'required|exists:districts,id',
            'village_id' => 'required|exists:villages,id',
            'street' => 'required|string',
            'postal_code' => 'required|string',
        ]);

        $address = auth('customer')->Customer()->addresses()->create($validated);

        return response()->json($address, 201);
    }

    public function update(Request $request, Address $address)
    {
        $this->authorize('update', $address);

        $validated = $request->validate([
            'province_id' => 'exists:provinces,id',
            'regency_id' => 'exists:regencies,id',
            'district_id' => 'exists:districts,id',
            'village_id' => 'exists:villages,id',
            'street' => 'string',
            'postal_code' => 'string',
        ]);

        $address->update($validated);

        return response()->json($address);
    }

    public function destroy(Address $address)
    {
        $this->authorize('delete', $address);
        $address->delete();

        return response()->json(['message' => 'Address deleted']);
    }
}
