<?php

use Illuminate\Database\Seeder;
use App\Admin, App\Level;

class adminReset extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::where(["status"=>"1"])->update(["password"=>bcrypt('123456')]);
    }
}
