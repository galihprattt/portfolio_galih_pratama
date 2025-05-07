<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm() {
        return view('customer.auth.login');
    }

    public function showRegisterForm() {
        return view('customer.auth.register');
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');  // Mengarahkan kembali ke halaman setelah login
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);  // Menampilkan error jika login gagal
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        // Membuat akun pengguna baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('customer.login')->with('success', 'Akun berhasil dibuat, silakan login.');  // Redirect ke halaman login
    }

    public function logout() {
        Auth::logout();  // Melakukan logout
        return redirect('/');  // Mengarahkan ke halaman utama setelah logout
    }
}
