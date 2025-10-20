<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            NewsSeeder::class,
            UserSeeder::class,
            ComCodeSeeder::class,
            CompanySeeder::class,
            AddressSeeder::class,
            ServiceSeeder::class,
            StatisticSeeder::class,
            TestimonySeeder::class,
            ServiceStatisticSeeder::class
        ]);
    }
}
