<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'AdminCEDID',
            'email' => 'adminCEDID@fiscaliazacatecas.gob.mx',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'), // Encripta la contraseña
            'type' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
