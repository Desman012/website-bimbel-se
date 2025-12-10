<?php

namespace App\Exports;

use App\Models\Absents;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class AttendanceExport30Days implements FromQuery, WithMapping, WithHeadings, WithColumnWidths
{
    protected $studentId;

    public function __construct(int $studentId)
    {
        $this->studentId = $studentId;
    }

    public function query()
    {
        $thirtyDaysAgo = Carbon::now()->subDays(30)->startOfDay();

        return Absents::query()
            ->with('student')
            ->where('student_id', $this->studentId)
            ->where('date', '>=', $thirtyDaysAgo)
            ->orderBy('date', 'desc');
    }

    public function map($absent): array
    {
        $studentName = $absent->student->full_name ?? $absent->student_id;
        $date = Carbon::parse($absent->date)->format('d-m-Y');
        $status = ucfirst($absent->attendance_status ?? '-');

        return [
            $date,
            $studentName,
            $status,
        ];
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Nama Siswa',
            'Status Kehadiran',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 15,
            'B' => 25,
            'C' => 18,
        ];
    }
}
