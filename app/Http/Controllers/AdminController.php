<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Students;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalSiswa = Students::count();
        $sudahBayar = Payment::where('status' , 'verified')->count();
        
        return view('admins.index', compact(
            'totalSiswa',
            'sudahBayar'
        ));
    }
}