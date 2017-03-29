<?php

use Illuminate\Database\Seeder;
use App\Certificated;

class certificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Certificated::insert(['certification' =>'HIMU (Higienis Industri Muda)']);
        Certificated::insert(['certification' =>'HIMA (Higienis Industri Madya)']);
        Certificated::insert(['certification' =>'HIU (Higienis Industri Utama)']);
        Certificated::insert(['certification' =>'Internasional (CIH)']);
    }
}
