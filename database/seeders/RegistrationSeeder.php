<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class RegistrationSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil data pembayaran
        $payments = DB::table('payments')->get(['month', 'amount_paid']);

        if ($payments->isEmpty()) {
            throw new \Exception("Table payments kosong. Tidak bisa mengisi month dan amount_paid.");
        }

        $data = [];

        for ($i = 0; $i < 10; $i++) {

            // Ambil payment acak
            $payment = $payments->random();

            $studentName = $faker->name();
            $parentName = $faker->name();

            $data[] = [
                'role_id' => 2,
                'full_name' => $studentName,
                'address' => $faker->address(),

                // Nomor telp Indonesia diawali 08 + maksimal 12 digit
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

                // Dari tabel payments
                'month' => $payment->month,
                'amount_paid' => $payment->amount_paid,

                'status' => 'pending',
                'payment_proof' => null,
            ];
        }

        DB::table('registrations')->insert($data);
    }
}
