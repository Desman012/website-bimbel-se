<?php
namespace App\Http\Controllers;
use App\Models\Absents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentAttendanceController extends Controller
{
    public function index()
    {
        return view('students.attendance.index');
    }

    public function store(Request $request)
    {
        // dapatkan id siswa dari guard student, fallback ke default auth
        $studentId = Auth::guard('student')->user()->id;

        if (!$studentId) {
            return redirect()->route('login');
        }

        // Cegah duplikat per hari
        $today = now()->toDateString();
        $exists = Absents::where('student_id', $studentId)
                         ->whereDate('date', $today)
                         ->first();

        if ($exists) {
            return back()->with('success', 'Attendance already recorded for today.');
        }

        Absents::create([
            'student_id' => $studentId,
            'date' => $today,
            'attendance_status' => 'present',
        ]);

        return back()->with('success', 'Attendance recorded.');
    }

    public function history()
    {
        return view('student.attendance.history');
    }
}
