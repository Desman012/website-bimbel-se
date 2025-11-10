<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // === ROLES ===
        $roles = ['Admin', 'Siswa'];
        foreach ($roles as $role) {
            DB::table('roles')->insert([
                'name_role' => $role,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // === ADMINS ===
        $roleAdmin = DB::table('roles')->where('name_role', 'Admin')->first();
        for ($i = 0; $i < 3; $i++) {
            DB::table('admins')->insert([
                'role_id' => $roleAdmin->id,
                'full_name' => $faker->name(),
                'address' => $faker->address(),
                'email' => $faker->unique()->safeEmail(),
                'password' => Hash::make('password'),
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // === LEVELS ===
        $levels = ['SD', 'SMP', 'SMA'];
        foreach ($levels as $level) {
            DB::table('levels')->insert([
                'name_level' => $level,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // === CLASSES ===
        $levelData = DB::table('levels')->get();
        foreach ($levelData as $level) {
            for ($i = 1; $i <= 3; $i++) {
                DB::table('classes')->insert([
                    'level_id' => $level->id,
                    'name_class' => "Kelas {$i} {$level->name_level}",
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // === PROGRAMS ===
        $programs = ['Private', 'Bimbel', 'Try Out'];
        foreach ($programs as $program) {
            DB::table('programs')->insert([
                'name_program' => $program,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // === TIMES ===
        $times = ['Pagi (08:00-10:00)', 'Siang (13:00-15:00)', 'Sore (16:00-18:00)'];
        foreach ($times as $t) {
            DB::table('times')->insert([
                'name_time' => $t,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // === CURRICULUMS ===
        $curriculums = ['K13', 'Merdeka Belajar'];
        foreach ($curriculums as $c) {
            DB::table('curriculums')->insert([
                'name_curriculum' => $c,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // === PRICES ===
        $classData = DB::table('classes')->get();
        foreach ($levelData as $level) {
            foreach ($classData as $class) {
                if ($class->level_id == $level->id) {
                    DB::table('prices')->insert([
                        'level_id' => $level->id,
                        'class_id' => $class->id,
                        'price' => $faker->numberBetween(300000, 700000),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }

        // === STUDENTS ===
        for ($i = 1; $i <= 15; $i++) {
            DB::table('students')->insert([
                'role_id' => 2, // siswa
                'full_name' => $faker->name(),
                'address' => $faker->address(),
                'phone_number' => $faker->phoneNumber(),
                'student_email' => $faker->unique()->safeEmail(),
                'password' => Hash::make('password'),
                'parent_name' => $faker->name('male'),
                'parent_email' => $faker->safeEmail(),
                'parent_phone' => $faker->phoneNumber(),
                'levels_id' => $faker->numberBetween(1, count($levels)),
                'class_id' => $faker->numberBetween(1, $classData->count()),
                'programs_id' => $faker->numberBetween(1, count($programs)),
                '_id' => $faker->numberBetween(1, count($curriculums)),
                'time_les_id' => $faker->numberBetween(1, count($times)),
                'status' => $faker->randomElement(['active', 'inactive']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // === PAYMENTS ===
        for ($i = 1; $i <= 30; $i++) {
            DB::table('payments')->insert([
                'student_id' => $faker->numberBetween(1, 15),
                'admin_id' => $faker->numberBetween(1, 3),
                'month' => $faker->monthName(),
                'amount_paid' => $faker->numberBetween(300000, 700000),
                'payment_proof' => 'payment_' . $i . '.jpg',
                'status' => $faker->randomElement(['pending', 'verified', 'rejected']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // === ABSENTS ===
        for ($i = 1; $i <= 50; $i++) {
            DB::table('absents')->insert([
                'student_id' => $faker->numberBetween(1, 15),
                'date' => $faker->dateTimeBetween('-1 month', 'now'),
                'attendance_status' => $faker->randomElement(['present', 'absent']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // === REGISTRATIONS ===
        for ($i = 1; $i <= 20; $i++) {
            DB::table('registrations')->insert([
                'role_id' => 2,
                'full_name' => $faker->name(),
                'address' => $faker->address(),
                'phone_number' => $faker->phoneNumber(),
                'student_email' => $faker->unique()->safeEmail(),
                'password' => Hash::make('password'),
                'parent_name' => $faker->name(),
                'parent_email' => $faker->safeEmail(),
                'parent_phone' => $faker->phoneNumber(),
                'levels_id' => $faker->numberBetween(1, count($levels)),
                'class_id' => $faker->numberBetween(1, $classData->count()),
                'programs_id' => $faker->numberBetween(1, count($programs)),
                '_id' => $faker->numberBetween(1, count($curriculums)),
                'time_les_id' => $faker->numberBetween(1, count($times)),
                'status' => $faker->randomElement(['pending', 'active', 'inactive', 'ditolak']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // === FACILITIES ===
        $facilities = [
            'Ruang Kelas Nyaman',
            'Perpustakaan Mini',
            'Proyektor',
            'Pendingin Ruangan',
            'Area Tunggu Orang Tua',
        ];
        foreach ($facilities as $f) {
            DB::table('facilities')->insert([
                'name_facilities' => $f,
                'description' => "Fasilitas $f tersedia untuk mendukung proses belajar.",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // === REVIEWS ===
        // for ($i = 1; $i <= 10; $i++) {
        //     DB::table('reviews')->insert([
        //         'path_image' => 'review' . $i . '.jpg',
        //         'name_student' => $faker->name(),
        //         'school' => $faker->company(),
        //         'review_text' => $faker->sentence(10),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        $this->command->info('✅ Seeder berhasil dijalankan dengan semua data dummy!');
    }
}
