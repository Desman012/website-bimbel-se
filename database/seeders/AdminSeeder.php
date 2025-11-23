<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $admins = [];

        for ($i = 0; $i < 5; $i++) {

            $admins[] = [
                'role_id' => 1,
                'full_name' => $faker->name(),
                'address' => $faker->address(),
                'email' => $faker->unique()->safeEmail(),
                'password' => Hash::make('password'),
                'status' => 'active',
            ];
        }

        DB::table('admins')->insert($admins);
    }
}
