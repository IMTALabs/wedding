<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('audio')->truncate();

        $audio = [
            [
                'name' => 'Bài này không để đi diễn',
                'file_path' => 'bai_nay_khong_de_di_dien.mp3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Em đồng ý',
                'file_path' => 'em_dong_y.mp3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Em sẽ là cô dâu',
                'file_path' => 'em_se_la_co_dau.mp3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hạnh phúc cuối cùng',
                'file_path' => 'hanh_phuc_cuoi_cung.mp3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hơn cả yêu',
                'file_path' => 'hon_ca_yeu.mp3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lễ đường',
                'file_path' => 'le_duong.mp3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Love yourself',
                'file_path' => 'love_yourself.mp3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Một đời',
                'file_path' => 'mot_doi.mp3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Xứng đôi cưới thôi',
                'file_path' => 'xung_doi_cuoi_thoi.mp3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('audio')->insert($audio);
    }
}
