<?php

use Illuminate\Database\Seeder;
use App\Banner;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        banner::create(["title_en"=>'poster', "title_id"=>"poster","banner"=>"poster.jpg","position"=>"1"]);
    }
}
