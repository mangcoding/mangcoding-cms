<?php

use Illuminate\Database\Seeder;
use App\Slider;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create("id_ID");
        foreach (range(1,5) as $slider) {
	        Slider::insert([
				"title_en" => $faker->title,
				"title_id" => $faker->title,
				"images"   => $faker->image(public_path('/uploads/slider'),1920, 580,'',false),
				"link"     => $faker->url
	        ]);
   		}
    }
}
