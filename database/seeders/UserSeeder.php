<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Mateus Rosa', 'email' => 'mateusesr1@gmail.com', 'password' => bcrypt('admin')],
            ['name' => 'Alex Pors', 'email' => 'alex@gmail.com', 'password' => bcrypt('admin')],
        ];

        DB::table('users')->insert($users);
    }
}
