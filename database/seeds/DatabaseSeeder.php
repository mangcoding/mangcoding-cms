<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(AdminSeeder::class);
        $this->call(PagetypeSeeder::class);
        $this->call(LangSeeder::class);
        $this->call(CateSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(IssueSeeder::class);
        $this->call(certificateSeeder::class);
        $this->call(MemberSeeder::class);
        $this->call(SlideSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(WidgetSeeder::class);
        $this->call(BannerSeeder::class);
       	Model::reguard();
    }
}
