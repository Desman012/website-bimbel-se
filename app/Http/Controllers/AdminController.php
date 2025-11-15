<?php

namespace App\Http\Controllers;
use App\Filament\Resources\AdminResource;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admins.index');
    }
}