<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurriculumSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('curriculums')->insert([
            ['name_curriculum' => 'K13'],
            ['name_curriculum' => 'K13 Revisi'],
            ['name_curriculum' => 'Merdeka'],
            ['name_curriculum' => 'Merdeka Revisi'],
        ]);
    }
}
