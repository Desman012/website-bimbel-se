<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Students;
use App\Models\Admins;


class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'admin_id',
        'month',
        'amount_paid',
        'payment_proof',
        'status',
    ];

    // Relasi opsional (kalau tabel students dan admins sudah ada)
    public function student()
    {
        return $this->belongsTo(Students::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admins::class);
    }
}
