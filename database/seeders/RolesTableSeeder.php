<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        // Menghapus semua data sebelumnya
        DB::table('roles')->delete(); // Menggunakan delete agar tidak terpengaruh foreign key

        // Menyisipkan data ke dalam tabel roles
        DB::table('roles')->insert([
            ['name' => 'Admin'],
            ['name' => 'User'],
            ['name' => 'Instructor'],
        ]);
    }
}
