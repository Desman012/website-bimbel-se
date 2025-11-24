<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Students;
use App\Models\Levels;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalSiswa = Students::count();
        $sudahBayar = Payment::where('status' , 'verified')->count();
        $unpaid = Payment::where('status', 'pending')->count();
        $students = Students::all();
        
        return view('admins.index', compact(
            'students',
            'totalSiswa',
            'sudahBayar',
            'unpaid'
        ));
    }
}