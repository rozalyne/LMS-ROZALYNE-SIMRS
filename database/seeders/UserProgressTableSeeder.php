<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserProgressTableSeeder extends Seeder
{
    public function run()
    {
        // Clear any existing data in the user_progress table
        DB::table('user_progress')->truncate();

        // Insert data with boolean progress values
        DB::table('user_progress')->insert([
            ['module_id' => 1, 'progress' => false, 'user_id' => 1], // Not completed
            ['module_id' => 2, 'progress' => true, 'user_id' => 1],  // Completed
            ['module_id' => 1, 'progress' => false, 'user_id' => 2], // Not completed
        ]);
    }
}
