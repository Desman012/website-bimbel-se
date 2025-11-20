<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absents extends Model
{
    use HasFactory;

    protected $table = 'absents';

    protected $fillable = [
        'student_id',
        'date',
        'attendance_status', // present / absent
    ];

    // Relasi ke Students
    public function student()
    {
        return $this->belongsTo(Students::class, 'student_id');
    }
}
