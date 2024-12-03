<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@gmail.com'], // Mencari entri berdasarkan email
            [
                'name' => 'Super Admin Rozalyne',
                'password' => bcrypt('erlpia1031'),
                'role_id' => 1, // Admin
            ]
        );

        DB::table('users')->updateOrInsert(
            ['email' => 'user@example.com'],
            [
                'name' => 'Regular User',
                'password' => bcrypt('password'),
                'role_id' => 2, // User
            ]
        );

        DB::table('users')->updateOrInsert(
            ['email' => 'newadmin@example.com'],
            [
                'name' => 'New Admin User',
                'password' => bcrypt('password456'),
                'role_id' => 1, // Admin
            ]
        );
    }

}
    