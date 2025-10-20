<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Service;

class ServiceSeeder extends Seeder
{
       
    public function run(): void
    {
        Service::insert([
            [
                'name'              => 'Mudlogging',  
                'icon'              => 'ti-crane',
                'description'       => 'Our mud logging services provide detailed, real-time geological data to support safer and more efficient drilling operations. From accurate lithology descriptions to gas detection and monitoring, our experienced mudloggers deliver comprehensive reports that help identify formation tops and potential hazards. We maintain constant communication with drilling and geology teams, ensuring that decisions can be made based on up-to-date and reliable surface data.',
            ],
            [
                'name'              => 'MWD Directional Drilling',  
                'icon'              => 'ti-car-turbine',
                'description'       => 'Our directional drilling support enhances accuracy and efficiency during complex well paths. We deliver real-time geological insights to keep your wellbore aligned with target formations. By working closely with drilling teams, we help reduce deviations and minimize non-productive time. Trust our mudlogging expertise to drive smarter, safer drilling decisions.',

            ],
            [
                'name'              => 'PLT Services',  
                'icon'              => 'ti-route-alt-right',
                'description'       => 'We provide expert support in interpreting Production Logging Tool (PLT) data to reveal detailed flow profiles. Our team integrates downhole data with surface mudlogging information for a full picture of well performance. This helps identify productive zones, fluid types, and potential issues. Rely on us to turn data into decisions that optimize your production.',
            ]
        ]);
    }
}
