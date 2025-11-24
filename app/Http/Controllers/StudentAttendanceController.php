<?php
namespace App\Http\Controllers;
use App\Models\Absents;
use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StudentAttendanceController extends Controller
{
    public function index(Request $request)
    {
        // ambil semua sesi dari DB
        $sessions = Time::orderBy('id')->get();

        // ambil siswa
        $studentId = Auth::guard('student')->id();
        if (!$studentId) {
            return redirect()->route('login');
        }

        // cek apakah siswa sudah absen hari ini
        $hasAttended = Absents::where('student_id', $studentId)
                              ->whereDate('date', now()->toDateString())
                              ->exists();

        // bulan terpilih (format YYYY-MM)
        $selectedMonth = $request->query('month', now()->format('Y-m'));
        try {
            $monthStart = Carbon::createFromFormat('Y-m', $selectedMonth)->startOfMonth();
        } catch (\Exception $e) {
            $selectedMonth = now()->format('Y-m');
            $monthStart = Carbon::now()->startOfMonth();
        }
        $monthEnd = (clone $monthStart)->endOfMonth();

        // rekap hadir/absent untuk siswa pada bulan terpilih
        $presentCount = Absents::where('student_id', $studentId)
            ->whereBetween('date', [$monthStart->toDateString(), $monthEnd->toDateString()])
            ->where('attendance_status', 'present')
            ->count();

        $absentCount = Absents::where('student_id', $studentId)
            ->whereBetween('date', [$monthStart->toDateString(), $monthEnd->toDateString()])
            ->where('attendance_status', 'absent')
            ->count();

        // daftar bulan available (dari data siswa), urut desc. sertakan bulan sekarang jika belum ada
        $months = Absents::where('student_id', $studentId)
            ->selectRaw("DATE_FORMAT(date, '%Y-%m') as ym")
            ->groupBy('ym')
            ->orderBy('ym', 'desc')
            ->pluck('ym')
            ->toArray();

        if (!in_array($selectedMonth, $months)) {
            array_unshift($months, $selectedMonth);
        }

        return view('students.attendance.index', compact(
            'sessions',
            'hasAttended',
            'presentCount',
            'absentCount',
            'months',
            'selectedMonth'
        ));
    }

    public function store(Request $request)
    {
        // ...existing code...
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

    public function history(Request $request)
    {
        $studentId = Auth::guard('student')->id();
        if (! $studentId) {
            return redirect()->route('login');
        }

        // bulan terpilih (YYYY-MM)
        $selectedMonth = $request->query('month', now()->format('Y-m'));
        try {
            $monthStart = Carbon::createFromFormat('Y-m', $selectedMonth)->startOfMonth();
        } catch (\Exception $e) {
            $selectedMonth = now()->format('Y-m');
            $monthStart = Carbon::now()->startOfMonth();
        }
        $monthEnd = (clone $monthStart)->endOfMonth();

        // ambil record absensi untuk siswa pada bulan terpilih
        $records = Absents::where('student_id', $studentId)
            ->whereBetween('date', [$monthStart->toDateString(), $monthEnd->toDateString()])
            ->orderBy('date', 'desc')
            ->get();

        // daftar bulan available (dari data siswa), urut desc
        $months = Absents::where('student_id', $studentId)
            ->selectRaw("DATE_FORMAT(date, '%Y-%m') as ym")
            ->groupBy('ym')
            ->orderBy('ym', 'desc')
            ->pluck('ym')
            ->toArray();

        // sertakan bulan terpilih jika belum ada di daftar
        if (! in_array($selectedMonth, $months)) {
            array_unshift($months, $selectedMonth);
        }

        return view('students.attendance.history', compact('records', 'months', 'selectedMonth'));
    }
}