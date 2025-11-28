<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Day;
use Illuminate\Database\Eloquent\Model;

class ScheduleStudentRegistrations extends Authenticatable
{
    use HasFactory;
    protected $table = 'schedule_registrations_student';
    protected $fillable = [
        'id',
        'registration_id',
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
