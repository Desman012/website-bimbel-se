<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Levels;
use App\Models\Classes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable; // <--- tambahkan ini

class Registrations extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'registrations';
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
        'month',
        'amount_paid',
        'payment_proof',
    ];

    // field email default Laravel diganti dengan student_email
    public function routeNotificationForMail($notification)
    {
        return $this->student_email;
    }

    public function level()
    {
        return $this->belongsTo(Levels::class, 'levels_id');
    }
    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
