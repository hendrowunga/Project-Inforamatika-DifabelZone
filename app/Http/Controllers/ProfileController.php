<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Address;
// use App\Models\
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     *
     * @return \Illuminate\View\View
     */
    public function edit(Request $request)
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
    $addresses = $customer->addresses;

    return view('user.profile-user', compact('customer', 'addresses'));
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
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileUpdateRequest $request)
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
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
