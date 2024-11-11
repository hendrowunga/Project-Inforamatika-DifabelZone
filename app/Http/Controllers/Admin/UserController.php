<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function listUser()
    {
        $users = User::all();

        return view('back.pages.admin.users.list_user', [
            'pageTitle' => 'User',
            'user' => $users
        ]);
    }

    public function createUser()
    {
        return view('back.pages.admin.users.create_user', [
            'pageTitle' => 'Create User'
        ]);
    }

    public function storeUser(Request $request)
    {
        // Validasi inputan form
        $validate = $request->validate([
            'firstname' => 'required|string|min:3|max:255',
            'lastname' => 'required|string|min:3|max:255',
            'username' => 'required|string|min:3|max:255|unique:users,username', // Menambahkan validasi unik untuk username
            'email' => [
                'required',
                'email',
                'unique:users,email',
                'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/', // Validasi untuk memastikan email berakhiran @gmail.com
            ],
            'password' => [
                'required',
                'string',
                'min:12', // Panjang minimal 12 karakter
                'regex:/[a-z]/', // Harus ada huruf kecil
                'regex:/[A-Z]/', // Harus ada huruf besar
                'regex:/[0-9]/', // Harus ada angka
                'regex:/[@$!%*?&]/', // Harus ada simbol
                'confirmed', // Password harus sama dengan konfirmasi
                'not_in:password,123456,password123', // Hindari penggunaan kata umum
            ],
            'email_verified_at' => 'nullable|date|after_or_equal:now', // Validasi tanggal verifikasi
        ], [
            'firstname.required' => 'The firstname is required.',
            'firstname.min' => 'The firstname must be at least 3 characters.',
            'lastname.required' => 'The lastname is required.',
            'lastname.min' => 'The lastname must be at least 3 characters.',
            'username.required' => 'The username is required.',
            'username.unique' => 'The username has already been taken.', // Pesan untuk duplikat username
            'email.required' => 'Email is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'email.regex' => 'The email must be a valid Gmail address (e.g., example@gmail.com).',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 12 characters.',
            'password.regex' => 'Password must contain at least one lowercase letter, one uppercase letter, one number, and one special character.',
            'password.confirmed' => 'Password confirmation does not match.',
            'password.not_in' => 'Password cannot be a common or easily guessable word.',
            'email_verified_at.date' => 'The email verified date must be a valid date.',
            'email_verified_at.after_or_equal' => 'The email verified date must be today or later.',
        ]);

        // Cek apakah user sudah ada berdasarkan username atau email
        $existingUser = User::where('username', $request->input('username'))
            ->orWhere('email', $request->input('email'))
            ->first();

        if ($existingUser) {
            return back()->withErrors([
                'username' => 'The username or email is already taken.',
            ])->withInput();
        }

        // Jika tidak ada duplikat, simpan data user baru
        $user = new User();
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->email_verified_at = $request->input('email_verified_at') ? $request->input('email_verified_at') : null;

        $user->save();

        return redirect()->route('admin.manage-users.user_list')->with('success', 'User Created Successfully');
    }

    public function editUser($id)
    {
        $users = User::findOrFail($id);

        return view('back.pages.admin.users.edit_user', [
            'pageTitle' => 'Edit User',
            'category' => $users
        ]);
    }

    public function showUser($id)
    {
        $users = User::findOrFail($id);

        return view('back.pages.admin.users.view_user', [
            'pageTitle' => 'View User',
            'category' => $users
        ]);
    }
}




// User
// Route::prefix('manage-users')->name('manage-users.')->group(function () {
//     Route::controller(UserController::class)->group(function () {
//         Route::get('/', 'listUser')->name('user_list');
//         Route::get('/create', 'createUser')->name('user_create');
//         Route::post('/store', 'storeUser')->name('user_store');
//         Route::get('/edit/{id}', 'editUser')->name('user_edit');
//         Route::post('/update/{id}', 'updateUser')->name('user_update');
//         Route::get('/show/{id}', 'showUser')->name('user_show');
//         Route::delete('/destroy/{id}', 'destroyUser')->name('user_destroy');
//     });
// });