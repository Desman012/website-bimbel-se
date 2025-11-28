<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programs extends Model
{
    use HasFactory;

    protected $table = 'programs';

    protected $fillable = [
        'name_program',
        'description',
    ];

    // Relasi ke students
    public function students()
    {
        return $this->hasMany(Students::class, 'programs_id');
    }
}
