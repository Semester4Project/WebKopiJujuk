<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;

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

    function login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
        ]);
    
        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];
    
        if(Auth::attempt($infologin)) {
            $user = Auth::user();
            dd($user); // Dump dan die untuk melihat pengguna yang terautentikasi dan role mereka
    
            if ($user->role == 'admin') {
                return redirect('admin/dashboard');
            } elseif ($user->role == 'customer') {
                return redirect('admin/customer');
            }
        } else {
            return redirect('')->withErrors('Username dan password yang dimasukkan tidak sesuai')->withInput();
        }
    }


    public function showResetPasswordForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function showResetForm($token)
    {
        return view('auth.passwords.reset', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();

                $user->setRememberToken(Str::random(60));

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);

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
