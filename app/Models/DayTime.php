<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayTime extends Model
{
    use HasFactory;
    protected $table = 'day_time';

    protected $fillable = [
        'id_class', 'day_id', 'time_id'
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
