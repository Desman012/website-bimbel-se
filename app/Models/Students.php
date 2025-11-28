<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Payment;
use App\Models\Levels;

class Students extends Authenticatable
{
    use HasFactory;
    // use Notifiable;

    protected $table = 'students';
    protected $fillable = [
        'role_id',
        'full_name',
        'address',
        'phone_number',
        'student_email',
        'password',
        'parent_name',
        'parent_email',
        'parent_phone',
        'levels_id',
        'class_id',
        'programs_id',
        'curriculum_id',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function payment()
    {
        return $this->hasOne(Payment::class,  'student_id');
    }

    public function jenjang()
    {
        return $this->hasOne(Levels::class, 'id', 'levels_id');
    }
}
