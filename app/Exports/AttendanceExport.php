<?php

namespace App\Exports;

use App\Models\Absents;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AttendanceExport implements FromQuery, WithMapping, WithHeadings
{
    protected $studentId;
    protected $month; // format YYYY-MM

    public function __construct(int $studentId, string $month)
    {
        $this->studentId = $studentId;
        $this->month = $month;
    }

    public function query()
    {
        $start = \Carbon\Carbon::createFromFormat('Y-m', $this->month)->startOfMonth()->toDateString();
        $end   = \Carbon\Carbon::createFromFormat('Y-m', $this->month)->endOfMonth()->toDateString();

        return Absents::query()
            ->with('student')
            ->where('student_id', $this->studentId)
            ->whereBetween('date', [$start, $end])
            ->orderBy('date', 'asc');
    }

    public function map($absent): array
    {
        $date = \Carbon\Carbon::parse($absent->date)->format('Y-m-d');
        $studentName = $absent->student->name ?? $absent->student_id;
        $status = ucfirst($absent->attendance_status);
        return [$date, $studentName, $status];
    }

    public function headings(): array
    {
        return ['Tanggal', 'Nama Siswa', 'Status'];
    }
}