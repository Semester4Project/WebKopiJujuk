<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Events\PasswordReset;

class UserController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function profil()
    {
        $user = Auth::user();
        return view('fitur.profil', compact('user'));
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
            // dd($user); Dump dan die untuk melihat pengguna yang terautentikasi dan role mereka
    
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
    


    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['message' => 'Email tidak ditemukan.'], 404);
        }
    
        // Generate OTP
        $otp = rand(100000, 999999);
        // Simpan OTP ke database atau kirim melalui email
        // Contoh: $user->otp = $otp; $user->save();
        // atau kirim email dengan kode OTP
    
        return response()->json(['message' => 'OTP telah dikirim ke email Anda.']);
    }
    


    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:5|confirmed',
        ], [
            'username.required' => 'Nama pengguna wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email harus valid',
            'email.unique' => 'Email sudah digunakan',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal harus 5 karakter',
            
        ]);

        $user = new User();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = 'admin';  // Set role sebagai admin
        $user->save();

        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }


public function update(Request $request)
{
    
    // Validasi data input
    $request->validate([
        'username' => 'required|string|max:255',
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Mendapatkan pengguna yang sedang masuk
    $user = Auth::user();

    // Siapkan data untuk diperbarui
    $data = [
        'username' => $request->username,
    ];

    // Jika ada file gambar yang diunggah
    if ($request->hasFile('profile_picture')) {
        // Hapus gambar profil lama jika ada
        if (!empty($user->profile_picture)) {
            $oldProfilePictures = json_decode($user->profile_picture, true);
            if (is_array($oldProfilePictures)) {
                foreach ($oldProfilePictures as $profile) {
                    Storage::delete('public/images/profil/' . $profile);
                }
            }
        }

                // Simpan file gambar yang baru
                $file = $request->file('profile_picture');
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images/profil'), $imageName);
                $data['profile_picture'] = $imageName;
    }
     /** @var \App\Models\User $user **/
    // Perbarui data pengguna
   
    $user->update($data);

    // Arahkan kembali ke halaman profil admin dengan pesan sukses
    return redirect()->route('admin.profile')->with('success', 'Profil berhasil diperbarui');
}



}
