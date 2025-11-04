<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentAttendanceController extends Controller
{
    public function index()
    {
        return view('student.attendance.index');
    }

    public function store(Request $request)
    {
        // simpan absensi
    }

    public function history()
    {
        return view('student.attendance.history');
    }
}
