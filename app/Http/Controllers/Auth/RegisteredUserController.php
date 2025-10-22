<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15', 'unique:'.User::class], // Ganti email jadi phone
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'phone.required' => 'Nomor HP wajib diisi',
            'phone.unique' => 'Nomor HP sudah terdaftar',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone, // Ganti email jadi phone
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}