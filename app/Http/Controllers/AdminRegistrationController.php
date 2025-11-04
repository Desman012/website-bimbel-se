<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminRegistrationController extends Controller
{
    public function index()
    {
        return view('admin.registrations.index');
    }

    public function show($id)
    {
        return view('admin.registrations.show', compact('id'));
    }
}