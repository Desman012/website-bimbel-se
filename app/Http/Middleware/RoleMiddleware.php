<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role = null)
    {
        // Kalau user sudah login
        if (session()->has('role_id')) {
            $role_id = session('role_id');

            // Jika middleware dipakai untuk route publik
            if (is_null($role)) {
                switch ($role_id) {
                    case 1:
                        return redirect('/admin/dashboard');
                    case 2:
                        return redirect('/students/dashboard');
                    // case 0:
                    //     return redirect('/guest/dashboard');
                }
            }

            // Middleware untuk route tertentu, cek role
            if ($role_id != $role) {
                abort(404); // akses ditolak, bukan auth
            }
        } else {
            // Belum login, route butuh auth
            if (!is_null($role)) {
                return redirect('/login');
            }
        }

        return $next($request);
    }
}
