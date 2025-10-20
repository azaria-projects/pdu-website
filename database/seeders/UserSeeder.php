<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            [
                'role'     => 'admin',
                'name'     => 'admin',
                'email'    => 'admin@mail.com',
                'password' => Hash::make('adminpdu') 
            ]
        ]);
    }
}
