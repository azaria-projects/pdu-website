<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Image;

class ImageSeeder extends Seeder
{
       
    public function run(): void
    {
        Image::insert([
            [
                'name' => 'test',
                'path' => public_path(''),
                'type' => 'images'
            ]
        ]);
    }
}
