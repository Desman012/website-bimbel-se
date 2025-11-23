<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DayTimeSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [];
        for ($day = 1; $day <= 6; $day++) {
            for ($time = 1; $time <= 3; $time++) {
                $rows[] = [
                    'day_id' => $day,
                    'time_id' => $time
                ];
            }
        }

        DB::table('day_time')->insert($rows);
    }
}
