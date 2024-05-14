<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('users')->insert(
            [
                'name' => 'admin',
                'email' => 'admin@pu.com',
                'role' => 'admin',
                'password' => '$2y$12$v.jie81HrRHdKePKWbsKFO3ubpsFDeYx0PzbspmMI1iFFbW9/P9HO',
            ]
        );
        DB::table('users')->insert(
            [
                'name' => 'bapekom6sby',
                'email' => 'bapekom6sby@pu.com',
                'role' => 'admin',
                'password' => '$2y$12$oNPJ49ei.NRdW86wD5FSy.OxUH1GJrY4D6j21ltfZow5SiK.Za/oy',
            ]
        );
    }
}
