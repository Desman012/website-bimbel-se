<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Contracts\ResetsUserPasswords;
use App\Models\Admins;
use App\Models\Students;

class ResetUserPassword
{
    public function reset($input)
    {
        $email = $input['email'];
        $password = $input['password'];

        // Cek admin
        $user = Admins::where('email', $email)->first();

        // Jika tidak ada, cek student
        if(!$user){
            $user = Students::where('student_email', $email)->first();
        }

        if(!$user){
            return back()->withErrors(['email' => 'Email tidak ditemukan']);
        }

        // Reset password
        $user->password = Hash::make($password);
        $user->save();

        return $user;
    }
}
