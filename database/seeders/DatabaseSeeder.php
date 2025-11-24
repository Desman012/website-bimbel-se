<?php

namespace Database\Seeders;

use App\Models\Facilities;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            // RoleSeeder::class,
            // AdminSeeder::class,
            // LevelSeeder::class,
            // ProgramSeeder::class,
            // ClassSeeder::class,
            // PriceSeeder::class,
            // TimeSeeder::class,
            // CurriculumSeeder::class,
            // DaySeeder::class,
            // DayTimeSeeder::class,
            // StudentSeeder::class,
            // PaymentSeeder::class,
            // AbsentSeeder::class,
            // RegistrationSeeder::class,
            // StudentScheduleSeeder::class,
            FacilitiesSeeder::class,
            ReviewSeeder::class,]);
    }
}