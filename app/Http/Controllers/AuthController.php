<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Levels;
use App\Models\Programs;
use App\Models\Curriculums;

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

    public function register(Request $request)
    {
        // proses register
    }
}
