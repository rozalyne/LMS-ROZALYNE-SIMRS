<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module;
use Carbon\Carbon;

class ModulesTableSeeder extends Seeder
{
    public function run()
    {
        Module::create([
            'course_id' => 1,
            'title' => 'Introduction to Laravel',
            'content' => 'Learn the basics of Laravel framework.',
            'order' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Module::create([
            'course_id' => 1,
            'title' => 'Routing in Laravel',
            'content' => 'Understanding routing in Laravel.',
            'order' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
