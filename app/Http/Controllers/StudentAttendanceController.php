<?php
namespace App\Http\Controllers;
use App\Models\Absents;
use App\Models\Time;
use App\Models\StudentSchedule; // ditambahkan

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Exports\AttendanceExport;
use Maatwebsite\Excel\Facades\Excel;

class StudentAttendanceController extends Controller
{
    public function index(Request $request)
    {
        

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

        // ambil semua sesi dari DB
        $sessions = StudentSchedule::where('student_id', $studentId)
        ->where('day_id', $dayId)
        ->with('time')
        ->get()
        ->map(function ($sch) {
            return $sch->time;
        })
        ->filter()      // buang null relation
        ->unique('id')  // hilangkan duplikat time
        ->values();

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
        $studentId = Auth::guard('student')->user()->id;
        if (!$studentId) return redirect()->route('login');

        $todayDate = now()->toDateString();
        if (Absents::where('student_id', $studentId)->whereDate('date', $todayDate)->exists()) {
            return back()->with('success', 'Attendance already recorded for today.');
        }

        // find today's schedules for this student and determine if now is late
        $now = Carbon::now();
        $dayId = $now->dayOfWeekIso;
        $schedules = StudentSchedule::where('student_id', $studentId)
            ->where('day_id', $dayId)
            ->with('time')
            ->get();

        // default
        $status = 'present';
        $grace = config('attendance.late_grace_minutes', 15);

        foreach ($schedules as $sch) {
            if (! $sch->time) continue;
            try {
                $start = Carbon::createFromFormat('H:i:s', $sch->time->times_in)
                            ->setDate($now->year, $now->month, $now->day);
                $end = Carbon::createFromFormat('H:i:s', $sch->time->times_out)
                            ->setDate($now->year, $now->month, $now->day);
            } catch (\Exception $e) {
                continue;
            }

            // if inside session window
            if ($now->between($start, $end)) {
                // if after start + grace => mark absent
                if ($now->greaterThan($start->copy()->addMinutes($grace))) {
                    $status = 'absent';
                } else {
                    $status = 'present';
                }
                break;
            }
        }

        Absents::create([
            'student_id' => $studentId,
            'date' => $todayDate,
            'attendance_status' => $status,
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

    public function export(Request $request)
    {
        $studentId = Auth::guard('student')->id();
        if (! $studentId) return redirect()->route('login');

        $month = $request->query('month', now()->format('Y-m'));
        try {
            \Carbon\Carbon::createFromFormat('Y-m', $month);
        } catch (\Exception $e) {
            $month = now()->format('Y-m');
        }

        $fileName = "absensi-{$month}.xlsx";
        return Excel::download(new AttendanceExport($studentId, $month), $fileName);
    }
}