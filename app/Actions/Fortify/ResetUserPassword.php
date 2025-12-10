<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use App\Models\Students;
use App\Models\Admins;
use App\Models\password_resets;

class ResetUserPassword
{
    public function reset($email, $password, $guard)
    {
        // Log::info("Reset password request diterima untuk $email, guard: $guard");

        if ($guard === 'admin') {
            $user = Admins::where('email', $email)->first();
        } else {
            $user = Students::where('student_email', $email)->first();
        }

        if (!$user) {
            Log::warning("User tidak ditemukan untuk email: $email");
            return false;
        }

        // Update password
        $user->password = Hash::make($password);
        $user->save();

        // Hapus token setelah digunakan
        password_resets::where('email', $email)
            ->where('guard', $guard)
            ->delete();

        Log::info("Password berhasil diupdate untuk $email");
        return true;
    }

    public function createToken($email, $guard)
    {
        $token = Str::random(64);

        DB::table('password_resets')->updateOrInsert(
            ['email' => $email, 'guard' => $guard],
            ['token' => $token, 'created_at' => Carbon::now()]
        );

        Log::info("Token password reset dibuat untuk $email, guard: $guard, token: $token");

        return $token;
    }
}
