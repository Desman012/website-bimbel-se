<?php

namespace App\Exports;

use App\Models\Payment;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class PaymentExport implements FromQuery, WithMapping, WithHeadings, WithColumnWidths
{
    protected $studentId;

    public function __construct(int $studentId)
    {
        $this->studentId = $studentId;
    }

    public function query()
    {
        return Payment::query()
            ->with(['student', 'admin'])
            ->where('student_id', $this->studentId)
            ->orderBy('created_at', 'desc');
    }

    public function map($payment): array
    {
        return [
            $payment->month ?? '-',
            'Rp ' . number_format($payment->amount_paid ?? 0, 0, ',', '.'),
            ucfirst($payment->status ?? '-'),
            $payment->admin->name ?? '-',
        ];
    }

    public function headings(): array
    {
        return [
            'Bulan/Tahun',
            'Jumlah Pembayaran',
            'Status',
            'Dicatat Oleh',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 15,
            'B' => 20,
            'C' => 12,
            'D' => 15,
        ];
    }
}
