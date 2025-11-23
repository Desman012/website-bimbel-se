<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];

        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'student_id' => $i,
                'admin_id' => 1,
                'month' => 'Januari',
                'amount_paid' => rand(200000, 350000),
                'payment_proof' => 'proof.jpg',
                'status' => 'verified',
            ];
        }

        DB::table('payments')->insert($data);
    }
}
