<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];
        $levels = [
            1 => 6, // SD
            2 => 3, // SMP
            3 => 3, // SMA
        ];

        foreach ($levels as $levelId => $total) {
            for ($i = 1; $i <= $total; $i++) {
                $data[] = [
                    'level_id' => $levelId,
                    'name_class' => "Kelas $i",
                    'meeting_per_week' => 1
                ];
            }
        }

        DB::table('classes')->insert($data);
    }
}
