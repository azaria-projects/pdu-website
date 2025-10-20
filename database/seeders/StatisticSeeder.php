<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Statistic;

class StatisticSeeder extends Seeder
{
       
    public function run(): void
    {
        Statistic::insert([
            [
                'icon'        => 'ti-rosette-discount-check',
                'value'       => '99%',
                'description' => 'Performance Rating'
            ],
            [
                'description'  => 'L.T.I Free',
                'icon'  => 'ti-report',
                'value' => '0'
            ],
            [
                'description'  => 'Logged Wells',
                'icon'  => 'ti-wall',
                'value' => '1974'
            ],
            [
                'description'  => 'MWD Service Provided',
                'icon'  => 'ti-arrows-shuffle',
                'value' => '532'
            ],
            [
                'description'  => 'N.P.T',
                'icon'  => 'ti-clock-pause',
                'value' => '0'
            ],
            [
                'description'  => 'Partners',
                'icon'  => 'ti-user-hexagon',
                'value' => '67'
            ],
            [
                'description'  => 'Customer Return Rates',
                'icon'  => 'ti-circle-percentage',
                'value' => '89%'
            ]
        ]);
    }
}
