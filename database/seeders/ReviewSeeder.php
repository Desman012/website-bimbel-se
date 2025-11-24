<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        DB::table('reviews')->insert([
            [
                'path_image' => 'review1.jpg',
                'name_student' => 'Cawisono Nainggolan',
                'school' => 'PJ Marpaung',
                'review_text' => 'Sit consequatur expedita omnis similique sunt quasi rerum sit atque quod.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'path_image' => 'review2.jpg',
                'name_student' => 'Nilam Zulfa Wijayanti',
                'school' => 'PT Nainggolan Riyanti Tbk',
                'review_text' => 'Libero aut dolorem voluptas et aut eius ad corporis.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'path_image' => 'review3.jpg',
                'name_student' => 'Mutia Mulyani',
                'school' => 'Yayasan Dongoran (Persero) Tbk',
                'review_text' => 'Pariatur dolor sint earum adipisci provident placeat voluptas vel cupiditate beatae error voluptates.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'path_image' => 'review4.jpg',
                'name_student' => 'Nadia Salimah Hariyah S.Farm',
                'school' => 'Yayasan Yuliarti Tbk',
                'review_text' => 'Quaerat eos ab error nam sequi repellat aliquam atque molestias.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'path_image' => 'review5.jpg',
                'name_student' => 'Jamil Kenari Firgantoro',
                'school' => 'PD Namaga Widiastuti',
                'review_text' => 'Ratione totam enim ea necessitatibus unde dignissimos deserunt quia consequatur inventore.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'path_image' => 'review6.jpg',
                'name_student' => 'Bakiadi Prasetyo',
                'school' => 'PT Hariyah Kurniawan',
                'review_text' => 'Modi aspernatur eligendi sed molestiae aliquid saepe excepturi ab soluta.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'path_image' => 'review7.jpg',
                'name_student' => 'Rendy Pradana M.Farm',
                'school' => 'Fa Hassanah',
                'review_text' => 'Debitis reiciendis vitae et qui deserunt doloremque et.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'path_image' => 'review8.jpg',
                'name_student' => 'Indra Xanana Winarno',
                'school' => 'CV Rahimah Sihotang (Persero) Tbk',
                'review_text' => 'Voluptatem consequatur velit id et veniam ipsum magnam ut consequatur nesciunt nam.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'path_image' => 'review9.jpg',
                'name_student' => 'Maya Widiastuti',
                'school' => 'PJ Gunarto',
                'review_text' => 'Molestiae tempora dolorem non illo dolores voluptatum labore porro.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'path_image' => 'review10.jpg',
                'name_student' => 'Zalindra Febi Suryatmi M.TI.',
                'school' => 'UD Mandasari Tbk',
                'review_text' => 'Velit quia sint similique ut rem sed deleniti.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
