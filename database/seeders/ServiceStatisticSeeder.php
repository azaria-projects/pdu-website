<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\ServiceStatistic;

class ServiceStatisticSeeder extends Seeder
{
       
    public function run(): void
    {
        ServiceStatistic::insert([
            [
                'description' => 'oil & gas well',
                'icon'        => 'ti-drop-circle',  
                'value'       => '106',
                'service_id'  => 1,
            ],
            [
                'description' => 'geothermal well',  
                'icon'        => 'ti-building-lighthouse',
                'value'       => '63',
                'service_id'  => 1,
            ],
            [
                'description' => 'sensors',
                'icon'        => 'ti-building-broadcast-tower',   
                'value'       => '+13',
                'service_id'  => 1,
            ],
            [
                'description' => 'gas sensors',  
                'icon'        => 'ti-alarm-smoke',
                'value'       => '+6',
                'service_id'  => 1,
            ],
            [
                'description' => 'oil & gas well',  
                'icon'        => 'ti-drop-circle',  
                'value'       => 'ti-crane',
                'service_id'  => 2,
            ],
            [
                'description' => 'geothermal well',  
                'icon'        => 'ti-building-lighthouse',
                'value'       => 'ti-crane',
                'service_id'  => 2,
            ]
        ]);
    }
}
