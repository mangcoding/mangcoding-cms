<?php

use Illuminate\Database\Seeder;
use App\Pagetype;

class PagetypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pagetype::insert(["pagetype"=>"Static page","description"=>"Halaman Statis"]);
        Pagetype::insert(["pagetype"=>"News","description"=>"Halaman Berita"]);
        Pagetype::insert(["pagetype"=>"Events","description"=>"Halaman Events"]);
        Pagetype::insert(["pagetype"=>"Current Issues","description"=>"Current Issues"]);
        Pagetype::insert(["pagetype"=>"Menus","description"=>"Cuma Menu"]);
        Pagetype::insert(["pagetype"=>"External Link","description"=>"Link Ke Halaman lain"]);
    }
}
