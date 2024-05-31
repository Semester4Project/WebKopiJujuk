<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

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
            'email.required' => 'Email Wajib Di isi',
            'password.required' => 'Password Wajib Di isi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)) {
            if (Auth::user()->role == 'admin') {
                return redirect('admin/dashboard');
            } elseif (Auth::user()->role == 'customer') {
                return redirect('admin/customer');
            }
        } else {
            return redirect('')->withErrors('Username dan password yang dimasukkan tidak sesuai')->withInput();
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
                    Storage::delete('public/images/' . $profile);
                }
            }
        }

                // Simpan file gambar yang baru
                $file = $request->file('profile_picture');
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/images', $imageName);
                $data['profile_picture'] = $imageName;
    }
     /** @var \App\Models\User $user **/
    // Perbarui data pengguna
   
    $user->update($data);

    // Arahkan kembali ke halaman profil admin dengan pesan sukses
    return redirect()->route('admin.profile')->with('success', 'Profil berhasil diperbarui');
}



}
