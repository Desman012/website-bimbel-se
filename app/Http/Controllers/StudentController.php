<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absents;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function dashboard()
    {
        $authUser = Auth::guard('student')->user();
        $id = $authUser->id;

        // Absensi hari ini
        $attendanceToday = Absents::where('student_id', $id)
            ->whereDate('date', now()->toDateString())
            ->first();

        // Statistik absensi
        $totalMasuk = Absents::where('student_id', $id)
            ->where('attendance_status', 'present')
            ->count();

        $totalTidakMasuk = Absents::where('student_id', $id)
            ->where('attendance_status', 'absent')
            ->count();

        // Pembayaran bulan ini
        $monthNow = now()->format('F Y');

        $payment = Payment::where('student_id', $id)
            ->where('month', $monthNow)
            ->first();

        return view('students.index', compact(
            'authUser',
            'attendanceToday',
            'totalMasuk',
            'totalTidakMasuk',
            'payment'
        ));
    }

    
}
