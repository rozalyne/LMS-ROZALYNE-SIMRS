<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserProgressTableSeeder extends Seeder
{
    public function run()
    {
        // Menghapus semua data sebelumnya
        DB::table('user_progress')->truncate();

        // Menyisipkan data ke dalam tabel user_progress
        DB::table('user_progress')->insert([
            ['module_id' => 1, 'progress' => 50, 'user_id' => 1],
            ['module_id' => 2, 'progress' => 100, 'user_id' => 1],
            ['module_id' => 1, 'progress' => 25, 'user_id' => 2],
        ]);
    }
}
