<?php

use Illuminate\Database\Seeder;
use App\Page, App\Translate;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create("id_ID");
       	 $Page = new Page;
         foreach (range(0, 10) as $indeks) {
        	$pages = $Page->create([
				"parent"    => 0,
				"orderid"   => 0,
				"catid"     => $faker->randomElement([2,3,4]),
				"pagetype"  => 3,
				"eventdate" => $faker->dateTimeBetween("0 years",'+5 days'),
				"postby"    => 1,
				"status"    => 1
	        ]);

        	$title_id = $faker->sentence(8);
	        $title_en = $faker->sentence(8);
	        Translate::insert([
				"idpages"     => $pages->idPages,
				"language"    => "en",
				"title"       => $title_en,
				"href"        => str_slug($title_id),
				"keywords"    => $faker->text,
				"description" => $faker->paragraphs(1, true),
				"content"     => $faker->paragraphs(10, true)
	        ]);

	        Translate::insert([
				"idpages"     => $pages->idPages,
				"language"    => "id",
				"title"       => $title_id."Indonesia ",
				"href"        => str_slug($title_en),
				"keywords"    => $faker->text,
				"description" => $faker->paragraphs(1, true),
				"content"     => "<h1>Indonesia</h1>".$faker->paragraphs(10, true)
	        ]);
        }  
    }
}
