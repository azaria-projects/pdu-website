<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Testimony;

class TestimonySeeder extends Seeder
{
    public function run(): void
    {
        Testimony::insert([
            [
                'name'       => 'John Doe',
                'role'       => 'Drilling Manager', 
                'testimony'  => 'We’ve worked with this mudlogging company on several wells, and they’ve consistently delivered quality data. Their loggers are knowledgeable, attentive, and always willing to communicate with the rig crew. The real-time data was accurate and timely, which helped optimize our drilling decisions. We’ll definitely continue to use their services on future projects',
                'company_id' => 3
            ],
            [
                'name'       => 'John Doe 1',
                'role'       => 'Drilling Manager', 
                'testimony'  => 'We’ve worked with this mudlogging company on several wells, and they’ve consistently delivered quality data. Their loggers are knowledgeable, attentive, and always willing to communicate with the rig crew. The real-time data was accurate and timely, which helped optimize our drilling decisions. We’ll definitely continue to use their services on future projects',
                'company_id' => 3
            ],
            [
                'name'       => 'John Doe 2',
                'role'       => 'Drilling Manager', 
                'testimony'  => 'We’ve worked with this mudlogging company on several wells, and they’ve consistently delivered quality data. Their loggers are knowledgeable, attentive, and always willing to communicate with the rig crew. The real-time data was accurate and timely, which helped optimize our drilling decisions. We’ll definitely continue to use their services on future projects',
                'company_id' => 3
            ],
            [
                'name'       => 'John Doe 3',
                'role'       => 'Drilling Manager', 
                'testimony'  => 'We’ve worked with this mudlogging company on several wells, and they’ve consistently delivered quality data. Their loggers are knowledgeable, attentive, and always willing to communicate with the rig crew. The real-time data was accurate and timely, which helped optimize our drilling decisions. We’ll definitely continue to use their services on future projects',
                'company_id' => 3
            ],
            [
                'name'       => 'John Doe 4',
                'role'       => 'Drilling Manager', 
                'testimony'  => 'We’ve worked with this mudlogging company on several wells, and they’ve consistently delivered quality data. Their loggers are knowledgeable, attentive, and always willing to communicate with the rig crew. The real-time data was accurate and timely, which helped optimize our drilling decisions. We’ll definitely continue to use their services on future projects',
                'company_id' => 3
            ],
            [
                'name'       => 'John Doe 5',
                'role'       => 'Drilling Manager', 
                'testimony'  => 'We’ve worked with this mudlogging company on several wells, and they’ve consistently delivered quality data. Their loggers are knowledgeable, attentive, and always willing to communicate with the rig crew. The real-time data was accurate and timely, which helped optimize our drilling decisions. We’ll definitely continue to use their services on future projects',
                'company_id' => 3
            ]
        ]);
    }
}
