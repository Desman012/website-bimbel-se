<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\Classes;
use App\Models\Prices;
use App\Models\Time;
use App\Models\Curriculums;
use App\Models\Programs;
use App\Models\Day;

class ScheduleController extends Controller
{
    public function index()
    {
        $students = Students::all();          // tambahkan
        $days = Day::all();                  // tambahkan
        $times = Time::all();                // sudah ada
        $programs = Programs::all();         // sudah ada
        $curriculums = Curriculums::all();   // sudah ada
        $classes = Classes::with('level')->get();
        $prices = Prices::with(['class', 'level'])->get();

        return view('admins.schedules.index', compact(
            'students',
            'days',
            'times',
            'programs',
            'curriculums',
            'classes',
            'prices'
        ));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'day'        => 'required|string',
            'time'       => 'required|string',
            'subject'    => 'required|string',
        ]);

        // Simpan ke table student_schedule
        $schedule = StudentSchedule::create([
            'student_id' => $request->student_id,
            'day'        => $request->day,
            'time'       => $request->time,
            'subject'    => $request->subject,
        ]);

        return redirect()->back()->with('success', 'Jadwal berhasil ditambahkan!');
    }


}
