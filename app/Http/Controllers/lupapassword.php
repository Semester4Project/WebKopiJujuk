<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class lupapassword extends Controller
{
    public function sendOtp(Request $request)
    {
        // Validasi input email
        $request->validate(['email' => 'required|email']);

        // Kirim email reset password
        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with(['status' => __($status)]);
        } else {
            return back()->withErrors(['email' => __($status)]);
        }
    }
}
