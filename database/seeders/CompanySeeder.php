<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Company;

class CompanySeeder extends Seeder
{
       
    public function run(): void
    {
        Company::insert([
            [
                'name'       => 'PT. Parama Data Unit',  
                'is_partner' => false,
            ],
            [
                'name'       => 'PT. Pertamina',  
                'is_partner' => true,
            ],
            [
                'name'       => 'PT. PetroChina International Jabung',  
                'is_partner' => true,
            ],
        ]);
    }
}
