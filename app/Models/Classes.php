<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $fillable = [
        'level_id',
        'name_class',
    ];

    // Relasi ke LEVELS
    public function level()
    {
        return $this->belongsTo(Levels::class);
    }

    // Relasi ke PRICES (satu kelas bisa punya banyak harga)
    public function prices()
    {
        return $this->hasMany(Prices::class, 'class_id');
    }
}
