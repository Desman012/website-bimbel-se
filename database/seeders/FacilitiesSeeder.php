<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FacilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        DB::table('facilities')->insert([
            [
                'name_facilities' => 'Ruang Kelas Nyaman',
                'description' => 'Fasilitas Ruang Kelas Nyaman tersedia untuk mendukung proses belajar.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name_facilities' => 'Perpustakaan Mini',
                'description' => 'Fasilitas Perpustakaan Mini tersedia untuk mendukung proses belajar.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name_facilities' => 'Proyektor',
                'description' => 'Fasilitas Proyektor tersedia untuk mendukung proses belajar.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name_facilities' => 'Pendingin Ruangan',
                'description' => 'Fasilitas Pendingin Ruangan tersedia untuk mendukung proses belajar.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name_facilities' => 'Area Tunggu Orang Tua',
                'description' => 'Fasilitas Area Tunggu Orang Tua tersedia untuk mendukung proses belajar.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
