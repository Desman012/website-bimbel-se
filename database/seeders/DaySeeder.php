<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('days')->insert([
            ['name' => 'Senin'],
            ['name' => 'Selasa'],
            ['name' => 'Rabu'],
            ['name' => 'Kamis'],
            ['name' => 'Jumat'],
            ['name' => 'Sabtu'],
        ]);
    }
}
