<?php

use Illuminate\Database\Seeder;
use App\Admin, App\Level;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::insert(['levelId'=>1,'levelName'=>'Superadmin','description'=>'Top Level Administrator']);
        Level::insert(['levelId'=>2,'levelName'=>'Admin','description'=>'Administrator']);
        Level::insert(['levelId'=>3,'levelName'=>'Operator','description'=>'Operator menginput Data']);
        
        $faker = \Faker\Factory::create("id_ID");
    		$admin = new Admin;
    		$admin->adminName = "nugraha@admin.com";
    		$admin->email ="nugraha@admin.com";
            $admin->password = bcrypt('mangcodingok!!');
    		$admin->fullName = $faker->firstNameMale;
            $admin->phone = $faker->PhoneNumber;
            $admin->level = 1;
            $admin->avatar = $faker->imageUrl($width = 120, $height = 120);
            $admin->status = 1;
    		$admin->save();
    }
}
