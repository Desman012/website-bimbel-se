<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show()
    {
        return view('landing.index');
    }
    public function logout()
    {
        return view('auth.logout');
    }

    public function forgotpassword()
    {
        return view('auth.forgot-password');
    }
}
