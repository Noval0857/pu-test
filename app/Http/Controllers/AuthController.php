<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    // public function login(Request $request)
    // {
    //     $credentials = $request->only('username', 'password');

    //     // Cari user berdasarkan username dan password langsung (plaintext)
    //     $user = User::where('username', $credentials['username'])
    //         ->where('password', $credentials['password'])
    //         ->first();

    //     if ($user) {
    //         // Login manual tanpa guard
    //         Auth::login($user);
    //         return redirect()->intended('/');
    //     }

    //     return back()->withErrors([
    //         'username' => 'Username atau password salah.',
    //     ]);
    // }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        // Cari user berdasarkan username dan password (plaintext)
        $user = User::where('username', $credentials['username'])
            ->where('password', $credentials['password'])
            ->first();

        if ($user) {
            // Login manual tanpa guard
            Auth::login($user);

            // Cek tombol yang ditekan berdasarkan name="login_type"
            $loginType = $request->input('login_type');

            if ($loginType === 'paket') {
                return redirect()->route('proyek.index');
            } elseif ($loginType === 'surat') {
                return redirect()->route('surat.index');
            } else {
                return redirect()->route('dashboard'); // fallback kalau tidak ada tombol spesifik
            }
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }



    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Pendaftaran berhasil. Silakan login.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
