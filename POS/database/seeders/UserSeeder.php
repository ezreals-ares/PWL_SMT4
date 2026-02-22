<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'level_id' => 1,
                'username' => 'Admin',
                'nama' => 'Administrator',
                'password' => Hash::make('12345'),
            ],
            [
                'level_id' => 2,
                'username' => 'Manager',
                'nama' => 'Manager',
                'password' => Hash::make('12345'),
            ],
            [
                'level_id' => 3,
                'username' => 'Staff',
                'nama' => 'Staff',
                'password' => Hash::make('12345'),
            ],
        ];
        DB::table('m_user')->insert($data);
    }
}
