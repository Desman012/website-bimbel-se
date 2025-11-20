<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absents extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'date',
        'attendance_status',    
    ];
}
