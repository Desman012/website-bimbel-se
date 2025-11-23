<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('prices')->insert([
            // SD kelas 1–4: 200k, kelas 5–6: 250k
            ['level_id' => 1, 'class_id' => 1, 'price' => 200000],
            ['level_id' => 1, 'class_id' => 2, 'price' => 200000],
            ['level_id' => 1, 'class_id' => 3, 'price' => 200000],
            ['level_id' => 1, 'class_id' => 4, 'price' => 200000],
            ['level_id' => 1, 'class_id' => 5, 'price' => 250000],
            ['level_id' => 1, 'class_id' => 6, 'price' => 250000],

            // SMP 300k
            ['level_id' => 2, 'class_id' => 7, 'price' => 300000],
            ['level_id' => 2, 'class_id' => 8, 'price' => 300000],
            ['level_id' => 2, 'class_id' => 9, 'price' => 300000],

            // SMA 350k
            ['level_id' => 3, 'class_id' => 10, 'price' => 350000],
            ['level_id' => 3, 'class_id' => 11, 'price' => 350000],
            ['level_id' => 3, 'class_id' => 12, 'price' => 350000],

            // TKA 200k
            ['level_id' => 4, 'class_id' => null, 'price' => 200000],
        ]);
    }
}
