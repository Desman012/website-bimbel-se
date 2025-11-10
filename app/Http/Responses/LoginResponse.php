<?php
namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginResponse implements LoginResponseContract
{
    /**
     * Response setelah login berhasil.
     */
    public function toResponse($request)
    {
        // Ambil user yang sedang login
        $user = $request->user();

        // Preferensi: cek instance model untuk menentukan role
        if ($user instanceof \App\Models\Admins || Auth::guard('admin')->check()) {
            return redirect()->intended('/admins/dashboard');
        }

        if ($user instanceof \App\Models\Students || Auth::guard('student')->check()) {
            return redirect()->intended('/students/dashboard');
        }

        // fallback
        return redirect()->intended('/');
    }
}
