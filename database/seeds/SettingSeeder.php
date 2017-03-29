<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Setting::insert(['settingName' =>'title','settingValue'=>'mangcoding']);
    	Setting::insert(['settingName' =>'keywords','settingValue'=>'mangcoding, mangcoding Membership']);
    	Setting::insert(['settingName' =>'description','settingValue'=>'mangcoding, mangcoding Membership']);
    	Setting::insert(['settingName' =>'footer','settingValue'=>'&copy; Project Organisasi <strong>mangcoding™</strong>. All rights reserved.']);
    	Setting::insert(['settingName' =>'logo','settingValue'=>'logo.png']);
    	Setting::insert(['settingName' =>'email','settingValue'=>'mangcoding@gmail.com']);
		Setting::insert(['settingName' =>'contact','settingValue'=>'(0266) 123456']);
		Setting::insert(['settingName' =>'contactName','settingValue'=>'Dinas Tenaga Kerja Kab. Sukabumi']);
		Setting::insert(['settingName' =>'facebook','settingValue'=>'#']);
		Setting::insert(['settingName' =>'twitter','settingValue'=>'#']);
		Setting::insert(['settingName' =>'linkedin','settingValue'=>'#']);
		Setting::insert(['settingName' =>'instagram','settingValue'=>'#']);
        Setting::insert(['settingName' =>'address','settingValue'=>'Sukabumi, Jawa Barat']);
        Setting::insert(['settingName' =>'altContact','settingValue'=>'(0266) 654321']);
        Setting::insert(['settingName' =>'youtube','settingValue'=>'#']);
    }
}
