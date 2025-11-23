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

        // --- Variabel Counts untuk Foreign Key ---
        $levels = ['SD', 'SMP', 'SMA'];
        $programs = ['Private', 'Bimbel', 'Try Out'];
        $times = ['Pagi (08:00-10:00)', 'Siang (13:00-15:00)', 'Sore (16:00-18:00)'];
        $curriculums = ['K13', 'Merdeka Belajar'];

        $levelsCount = count($levels);
        $programsCount = count($programs);
        $timesCount = count($times);
        $curriculumsCount = count($curriculums);
        $studentsToCreate = 15;
        $adminsToCreate = 3;


        // 1. === ROLES (HARUS PERTAMA) ===
        $roles = ['Admin', 'Siswa'];
        foreach ($roles as $role) {
            DB::table('roles')->insert([
                'name_role' => $role,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        $roleAdmin = DB::table('roles')->where('name_role', 'Admin')->first();
        $roleSiswa = DB::table('roles')->where('name_role', 'Siswa')->first();


        // 2. === LEVELS ===
        foreach ($levels as $level) {
            DB::table('levels')->insert([
                'name_level' => $level,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // 3. === CLASSES (HARUS SEBELUM STUDENTS) ===
        $levelData = DB::table('levels')->get();
        foreach ($levelData as $level) {
            for ($i = 1; $i <= 3; $i++) {
                $newClass = [
                    'level_id' => $level->id,
                    'name_class' => "Kelas {$i} {$level->name_level}",
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                DB::table('classes')->insert($newClass);
            }
        }
        $classData = DB::table('classes')->get();
        $classesCount = $classData->count();


        // 4. === PROGRAMS, TIMES, CURRICULUMS (Data Master) ===
        foreach ($programs as $program) {
            DB::table('programs')->insert(['name_program' => $program, 'created_at' => now(), 'updated_at' => now(),]);
        }
        foreach ($times as $t) {
            DB::table('times')->insert(['name_time' => $t, 'created_at' => now(), 'updated_at' => now(),]);
        }
        foreach ($curriculums as $c) {
            DB::table('curriculums')->insert(['name_curriculum' => $c, 'created_at' => now(), 'updated_at' => now(),]);
        }


        // 5. === ADMINS (Data Induk yang dibutuhkan oleh Payments/Absents) ===
        for ($i = 0; $i < $adminsToCreate; $i++) {
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

        
        // 6. === STUDENTS (Data Induk yang dibutuhkan oleh Payments/Absents) ===
        for ($i = 1; $i <= $studentsToCreate; $i++) {
            DB::table('students')->insert([
                'role_id' => $roleSiswa->id, 
                'full_name' => $faker->name(),
                'address' => $faker->address(),
                'phone_number' => $faker->phoneNumber(),
                'student_email' => $faker->unique()->safeEmail(),
                'password' => Hash::make('password'),
                'parent_name' => $faker->name('male'),
                'parent_email' => $faker->safeEmail(),
                'parent_phone' => $faker->phoneNumber(),
                'levels_id' => $faker->numberBetween(1, $levelsCount),
                'class_id' => $faker->numberBetween(1, $classesCount), 
                'programs_id' => $faker->numberBetween(1, $programsCount),
                // ⭐ KOREKSI KRITIS: Menggunakan '_id' sesuai struktur tabel students Anda ⭐
                '_id' => $faker->numberBetween(1, $curriculumsCount), 
                'time_les_id' => $faker->numberBetween(1, $timesCount),
                'status' => $faker->randomElement(['active', 'inactive']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }


        // 7. === PAYMENTS (Tabel Anak, sekarang merujuk ke ID Siswa yang SUDAH ADA) ===
        for ($i = 1; $i <= 30; $i++) {
            DB::table('payments')->insert([
                'student_id' => $faker->numberBetween(1, $studentsToCreate), 
                'admin_id' => $faker->numberBetween(1, $adminsToCreate), 
                'month' => $faker->monthName(),
                'amount_paid' => $faker->numberBetween(300000, 700000),
                'payment_proof' => 'payment_' . $i . '.jpg',
                'status' => $faker->randomElement(['pending', 'verified', 'rejected']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // 8. === ABSENTS (Tabel Anak, sekarang merujuk ke ID Siswa yang SUDAH ADA) ===
        for ($i = 1; $i <= 50; $i++) {
            DB::table('absents')->insert([
                'student_id' => $faker->numberBetween(1, $studentsToCreate), 
                'date' => $faker->dateTimeBetween('-1 month', 'now'),
                'attendance_status' => $faker->randomElement(['present', 'absent']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // 9. === REGISTRATIONS (Menggunakan '_id' untuk Kurikulum) ===
        for ($i = 1; $i <= 20; $i++) {
            DB::table('registrations')->insert([
                'role_id' => $roleSiswa->id,
                'full_name' => $faker->name(),
                'address' => $faker->address(),
                'phone_number' => $faker->phoneNumber(),
                'student_email' => $faker->unique()->safeEmail(),
                'password' => Hash::make('password'),
                'parent_name' => $faker->name(),
                'parent_email' => $faker->safeEmail(),
                'parent_phone' => $faker->phoneNumber(),
                'levels_id' => $faker->numberBetween(1, $levelsCount),
                'class_id' => $faker->numberBetween(1, $classesCount),
                'programs_id' => $faker->numberBetween(1, $programsCount),
                // ⭐ KOREKSI KRITIS: Menggunakan '_id' sesuai struktur tabel students ⭐
                '_id' => $faker->numberBetween(1, $curriculumsCount), 
                'time_les_id' => $faker->numberBetween(1, $timesCount),
                'status' => $faker->randomElement(['pending', 'active', 'inactive', 'ditolak']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // 10. === FACILITIES ===
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

        $this->command->info('✅ Seeder berhasil dijalankan dengan semua data dummy!');
    }
}