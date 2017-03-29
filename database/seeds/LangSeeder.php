<?php

use Illuminate\Database\Seeder;
use App\Language;

class LangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::insert(["code"=>"en","name"=>"English"]);
        Language::insert(["code"=>"id","name"=>"Indonesia"]);
    }
}
