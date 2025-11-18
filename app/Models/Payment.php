<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';

    protected $fillable = [
        'student_id', // pastikan user login sebagai student
            'month',
            'amount_paid',
            'payment_proof',
            'status',
    ];
}
