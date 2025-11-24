<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbsentSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];

        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'student_id' => $i,
                'date' => now()->subDays($i),
                'attendance_status' => 'present'
            ];
        }

        DB::table('absents')->insert($data);
    }
}
