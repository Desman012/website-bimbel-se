<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('programs')->insert([
            ['name_program' => 'Bimbel'],
            ['name_program' => 'Private'],
            ['name_program' => 'Try Out'],
        ]);
    }
}
