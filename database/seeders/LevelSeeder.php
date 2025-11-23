<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('levels')->insert([
            ['name_level' => 'SD'],
            ['name_level' => 'SMP'],
            ['name_level' => 'SMA'],
            ['name_level' => 'TKA'],
        ]);
    }
}
