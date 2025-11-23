<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('times')->insert([
            [
                'name_time' => 'Pagi (Sesi 1)',
                'times_in' => '10:00',
                'times_out' => '12:00'
            ],
            [
                'name_time' => 'Siang (Sesi 2)',
                'times_in' => '13:00',
                'times_out' => '15:00'
            ],
            [
                'name_time' => 'Sore (Sesi 3)',
                'times_in' => '16:00',
                'times_out' => '18:00'
            ]
        ]);
    }
}
