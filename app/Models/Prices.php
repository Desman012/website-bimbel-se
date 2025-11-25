<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prices extends Model
{
    use HasFactory;

    protected $table = 'prices';

    protected $fillable = [
        'class_id',
        'level_id',
        'price',
    ];

    // relasi ke classes
    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    // relasi ke level
    public function level()
    {
        return $this->belongsTo(Levels::class, 'level_id');
    }
}
