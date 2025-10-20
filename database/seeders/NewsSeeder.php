<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\News;

class NewsSeeder extends Seeder
{
       
    public function run(): void
    {
        News::insert([
            [
                'name'        => 'Research and Development', 
                'description' => 'view our latest research journals and advancement of mudlogging technologies.'
            ],
            [
                'name'        => 'Technologies and Services', 
                'description' => 'get to know our services details with its currently implemented technologies in mud logging activities.'
            ],
            [
                'name'        => 'Our Core Values, Vision, and Mission', 
                'description' => 'we strive to lead the mud logging industry with accurate and dependable service. view our core values, visions, and missions.'
            ],
            [
                'name'        => 'Partners and Projects', 
                'description' => 'our company has provided services to multiple regions across indonesia with diverse partners. see what our partners have said about us.'
            ],
            [
                'name'        => 'News and Activities', 
                'description' => 'get in touch with our latest updates, discover more about our services and activities.'
            ],
            [
                'name'        => 'Client Testimonials', 
                'description' => 'our company has provided services to multiple regions across indonesia with diverse partners. see what our partners have said about us.'
            ],
        ]);
    }
}
