<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Show user profile with addresses.
     */
    public function showProfile($id)
    {
        $customer = Customer::findOrFail($id);

        // Data dummy untuk alamat
        $addresses = $this->getDummyAddresses($customer);

        return view('user.profile-user', compact('customer', 'addresses'));
    }

    /**
     * Get dummy addresses for a customer.
     *
     * @param \App\Models\Customer $customer
     * @return array
     */
    private function getDummyAddresses($customer)
    {
        return [
            [
                'customer_id' => $customer->id,
                'province_id' => 12,
                'regency_id' => 34,
                'district_id' => 56,
                'village_id' => 78,
                'street' => 'Jl. Merdeka No. 1',
                'postal_code' => '12345',
                'order_id' => 101,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'customer_id' => $customer->id,
                'province_id' => 14,
                'regency_id' => 35,
                'district_id' => 57,
                'village_id' => 79,
                'street' => 'Jl. Raya No. 2',
                'postal_code' => '23456',
                'order_id' => 102,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
    }

    /**
     * Add a new address for the user.
     */
    public function addAddress(Request $request, $id)
    {
        // Validasi input alamat baru
        $request->validate([
            'street' => 'required|string|max:255',
            'postal_code' => 'required|numeric',
        ]);

        // Simpan alamat baru
        Address::create([
            'customer_id' => $id,
            'street' => $request->street,
            'postal_code' => $request->postal_code,
        ]);

        return back()->with('success', 'Alamat berhasil ditambahkan!');
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
