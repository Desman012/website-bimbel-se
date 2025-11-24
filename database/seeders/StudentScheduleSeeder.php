<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentScheduleSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [];

        for ($s = 1; $s <= 10; $s++) {
            $rows[] = [
                'student_id' => $s,
                'day_id' => rand(1, 6),
                'time_id' => rand(1, 3),
            ];
        }

        DB::table('student_schedules')->insert($rows);
    }
}
