<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('courses')->insert([
            ['name' => 'Laravel for Beginners'],
            ['name' => 'Advanced Laravel'],
        ]);
    }
}
