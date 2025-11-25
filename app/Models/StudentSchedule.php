<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSchedule extends Model
{
    use HasFactory;

    protected $table = 'student_schedules';
    public $timestamps = false;

    protected $fillable = [
        'student_id',
        'day_id',
        'time_id',
    ];

    public function time()
    {
        return $this->belongsTo(\App\Models\Time::class, 'time_id');
    }
}
