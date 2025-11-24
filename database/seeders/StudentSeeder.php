<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $students = [];

        for ($i = 0; $i < 10; $i++) {

            $studentName = $faker->name();

            do {
                $parentName = $faker->name();
            } while ($parentName === $studentName);

            $students[] = [
                'role_id' => 2,
                'full_name' => $studentName,
                'address' => $faker->address(),
                'phone_number' => '08' . $faker->numerify('#########'),
                'student_email' => $faker->unique()->safeEmail(),
                'password' => Hash::make('password'),
                'parent_name' => $parentName,
                'parent_email' => $faker->unique()->safeEmail(),
                'parent_phone' => '08' . $faker->numerify('#########'),
                'levels_id' => rand(1, 4),
                'class_id' => rand(1, 12),
                'programs_id' => rand(1, 3),
                'curriculum_id' => rand(1, 4),
                'status' => 'active',
            ];
        }

        DB::table('students')->insert($students);
    }
}
