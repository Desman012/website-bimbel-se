<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSchedule extends Authenticatable
{
    use HasFactory;

    protected $table = 'student_schedules';
    protected $fillable = [
        'id',
        'student_id',
        'day_id',
        'time_id',
    ];

    public function day()
    {
        return $this->belongsTo(Day::class, 'day_id');
    }
    public function time()
    {
        return $this->belongsTo(Time::class, 'time_id');
    }
}
