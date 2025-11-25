<?php
namespace App\Http\Controllers;
use App\Models\Absents;
use App\Models\Time;
use App\Models\StudentSchedule; // ditambahkan

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

        // --- ambil jadwal hari ini untuk siswa (menghubungkan ke tabel times) ---
        $today = Carbon::now();
        $dayId = $today->dayOfWeekIso; // 1 = Monday ... 7 = Sunday ; cocok dg tabel days jika Senin=1
        $todaySchedules = StudentSchedule::where('student_id', $studentId)
            ->where('day_id', $dayId)
            ->with('time')
            ->get()
            ->map(function($sch){ return [
                'id' => $sch->time->id,
                'name_time' => $sch->time->name_time,
                'times_in' => $sch->time->times_in,
                'times_out' => $sch->time->times_out,
            ]; });

        // cek apakah sekarang berada di dalam salah satu waktu jadwal hari ini
        $inWindow = false;
        foreach ($todaySchedules as $s) {
            $start = Carbon::createFromFormat('H:i:s', $s['times_in'])->setDate($today->year, $today->month, $today->day);
            $end = Carbon::createFromFormat('H:i:s', $s['times_out'])->setDate($today->year, $today->month, $today->day);
            if ($today->between($start, $end->subSecond(false))) { // sekarang >= start && < end
                $inWindow = true;
                break;
            }
        }

        // canAttend: hanya boleh jika ada jadwal hari ini, dalam window, dan belum absen hari ini
        $canAttend = !$hasAttended && $inWindow && $todaySchedules->count() > 0;

        // bulan terpilih (format YYYY-MM)
        // ...existing code for selectedMonth, monthStart, monthEnd, presentCount, absentCount, months ...
        // ...existing code...
        $selectedMonth = $request->query('month', now()->format('Y-m'));
        try {
            $monthStart = Carbon::createFromFormat('Y-m', $selectedMonth)->startOfMonth();
        } catch (\Exception $e) {
            $selectedMonth = now()->format('Y-m');
            $monthStart = Carbon::now()->startOfMonth();
        }
        $monthEnd = (clone $monthStart)->endOfMonth();

        $presentCount = Absents::where('student_id', $studentId)
            ->whereBetween('date', [$monthStart->toDateString(), $monthEnd->toDateString()])
            ->where('attendance_status', 'present')
            ->count();

        $absentCount = Absents::where('student_id', $studentId)
            ->whereBetween('date', [$monthStart->toDateString(), $monthEnd->toDateString()])
            ->where('attendance_status', 'absent')
            ->count();

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
            'selectedMonth',
            'todaySchedules', // ditambahkan
            'canAttend'       // ditambahkan
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
        $todayDate = now()->toDateString();
        $exists = Absents::where('student_id', $studentId)
                         ->whereDate('date', $todayDate)
                         ->first();

        if ($exists) {
            return back()->with('success', 'Attendance already recorded for today.');
        }

        // --- server-side check: pastikan siswa memang punya jadwal hari ini DAN saat ini berada di dalam time window ---
        $now = Carbon::now();
        $dayId = $now->dayOfWeekIso;
        $schedules = StudentSchedule::where('student_id', $studentId)
            ->where('day_id', $dayId)
            ->with('time')
            ->get();

        // $allowed = false;
        // foreach ($schedules as $sch) {
        //     $start = Carbon::createFromFormat('H:i:s', $sch->time->times_in)->setDate($now->year, $now->month, $now->day);
        //     $end = Carbon::createFromFormat('H:i:s', $sch->time->times_out)->setDate($now->year, $now->month, $now->day);
        //     if ($now->between($start, $end->subSecond(false))) {
        //         $allowed = true;
        //         break;
        //     }
        // }

        // if (! $allowed) {
        //     return back()->with('success', 'Anda tidak memiliki jadwal aktif sekarang atau di luar jam sesi. Absensi diblokir.');
        // }

        Absents::create([
            'student_id' => $studentId,
            'date' => $todayDate,
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