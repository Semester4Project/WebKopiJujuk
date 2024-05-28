<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function viewregister()
    {
        return view('register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email harus valid',
            'password.required' => 'Password wajib diisi',
        ]);
        
        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->role == 'admin') {
                return redirect('admin/penjual');
            } elseif (Auth::user()->role == 'customer')
                return redirect('admin/customer');
        } else {
            return redirect('')->withErrors('Username dan password yang dimasukkan salah')->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('');
    }

    public function register(Request $request)
{
    $request->validate([
        'username' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|string|min:5', // Ubah minimal karakter menjadi 6 (sesuai kebutuhan Anda)
    ], [
        'username.required' => 'Nama pengguna wajib diisi',
        'email.required' => 'Email wajib diisi',
        'email.email' => 'Email harus valid',
        'email.unique' => 'Email sudah digunakan',
        'password.required' => 'Password wajib diisi',
        'password.min' => 'Password minimal harus 5 karakter', // Sesuaikan pesan error minimal karakter
    ]);

    $user = new User();
    $user->username = $request->input('username');
    $user->email = $request->input('email');
    $user->password = Hash::make($request->input('password'));
    $user->save();

    return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
}

}
