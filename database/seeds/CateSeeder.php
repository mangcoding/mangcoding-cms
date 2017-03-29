<?php

use Illuminate\Database\Seeder;
use App\Categories;

class CateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categories::insert(["typeid"=>2, "cat_en"=>"General","cat_id"=>"Umum","status"=>"1"]);
        Categories::insert(["typeid"=>3, "cat_en"=>"Incoming seminar","cat_id"=>"Seminar yang akan datang","status"=>"1"]);
        Categories::insert(["typeid"=>3, "cat_en"=>"mangcoding conference","cat_id"=>"Konferensi mangcoding","status"=>"1"]);
        Categories::insert(["typeid"=>3, "cat_en"=>"Registration","cat_id"=>"Registration","status"=>"1"]);
    }
}
