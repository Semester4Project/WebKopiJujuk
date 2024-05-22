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
        
        // $infologin = [
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ];

        // if (Auth::attempt($infologin)) {
        //     if (Auth::user()->role == 'admin') {
        //         return redirect('/admin');
        //     } elseif (Auth::user()->role == 'customer')
        //         return redirect('/customer');
        // } else {
        //     return redirect('')->withErrors('Username dan password yang dimasukkan salah')->withInput();
        // }
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role == 'customer') {
                return redirect()->route('customer.dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    function logout() {
        Auth::logout();
        return redirect('/login');
    }

}