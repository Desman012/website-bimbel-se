<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Classes;

class DayTimeSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Ambil semua id dari tabel classes
        $classIds = Classes::pluck('id')->toArray();

        $rows = [];

        for ($day = 1; $day <= 6; $day++) {
            for ($time = 1; $time <= 3; $time++) {
                $rows[] = [
                    'day_id'    => $day,
                    'time_id'   => $time,
                    'id_class'  => $faker->randomElement($classIds), // FK acak
                ];
            }
        }

        DB::table('day_time')->insert($rows);
    }
}
