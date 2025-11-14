<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Registrations extends Authenticatable
{
    use HasFactory;
    protected $table = 'registrations';
    protected $fillable = [
        'full_name', 
        'address',
        'phone_number',
        'student_email',
        'password',
        'parent_name',
        'parent_email',
        'parent_phone',
        'programs_id',
        'class_id',
        'levels_id',
        'status',
        'month',
        'amount_paid',
        'payment_proof',
            'role_id',
            '_id',
            'time_les_id',
    ];

    protected $hidden = [
        'password', 
        'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
