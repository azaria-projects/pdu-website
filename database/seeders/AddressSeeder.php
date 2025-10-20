<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Address;

class AddressSeeder extends Seeder
{
    public function run(): void
    {
        Address::insert([
            [
                'city'       => 'Kota Bekasi',
                'street'     => 'Jl. alternatif cibubur km 3.5 cibubur times square blok c1 no 19-21 Jatisampurna', 
                'country'    => 'Indonesia',
                'province'   => 'Jawa Barat',  
                'pos_code'   => '17435',
                'company_id' => 1
            ],
            [
                'city'       => 'Kota Bekasi',
                'street'     => 'Jl. Cemp. No.1, RT.002/RW.008, Jatisampurna', 
                'country'    => 'Indonesia',
                'province'   => 'Jawa Barat',  
                'pos_code'   => '17435',
                'company_id' => 1
            ],
        ]);
    }
}
