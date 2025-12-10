<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Levels;
use App\Models\Programs;
use App\Models\Curriculums;
use App\Models\password_resets;
use App\Actions\Fortify\ResetUserPassword;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // proses login
    }

    public function showRegister()
    {
        $levels = Levels::all();
        $programs = Programs::all();
        $curriculums = Curriculums::all();
        return view('auth.register', compact(['levels','programs','curriculums']));
    }

    public function registeredSuccess()
    {
        return view('auth.registered');
    }

    public function register(Request $request)
    {
        // proses register
    }

    public function resetPassword(Request $request)
    {
    //     $validator = Validator::make($request,[
    //     'email' => 'required|email',
    //     'password' => 'required|confirmed|min:6',
    //     'token' => 'required',
    //     'guard' => 'required',
    // ],[
    // 'password' => 'Password harus 6 karakter lebih',
    // 'password' => 'Password berbeda dengan konfirmasi password',
    // ]);
    // return $validator->fails();
    $record = password_resets::where('email', $request->email)
        ->where('guard', $request->guard)
        ->first();

        // return $record;
    if (! $record || $record->token !== $request->token) {
        Log::warning('Token reset password invalid untuk: '.$request->email);

        return back()->withErrors(['email' => 'Token reset password tidak valid']);
    }

    app(ResetUserPassword::class)->reset($request->email, $request->password, $request->guard);

    // return redirect('/login');
        return back()->with('status', 'Password berhasil direset.');
    }
}
