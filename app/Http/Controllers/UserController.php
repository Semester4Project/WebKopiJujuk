<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function index() {
        return view('login');
    }

    function login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib di isi',
            'password.required' => 'Password wajib di isi'
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

    function logout() {
        Auth::logout();
        return redirect('');
    }

}