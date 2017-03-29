<?php

use Illuminate\Database\Seeder;
use App\Address, App\Member, App\Certificated, App\Education;

class MemberDummy extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::create(["idMember"=>"2016011010001","prefix"=>"Dr.","fullName"=>"Sjahrul M.Nasri","subfix"=>"Dr,Ir,MSc in Hyg, HIU","gender"=>"L"]);
        Member::create(["idMember"=>"2016011010002","prefix"=>"","fullName"=>"Tata Soemitra","subfix"=>"MPSH, DIH,HIU","gender"=>"L"]);
        Member::create(["idMember"=>"2016011010003","prefix"=>"","fullName"=>"Roykhe Julius","subfix"=>"SKP","gender"=>"L"]);
        Member::create(["idMember"=>"2016011010004","prefix"=>"","fullName"=>"Masjuli","subfix"=>"SKM, MKK","gender"=>"L"]);
        Member::create(["idMember"=>"2016011010005","prefix"=>"","fullName"=>"Elsye As Safira","subfix"=>"SKM, MKKK, MSc, HIMA, CIH","gender"=>"P"]);
        Member::create(["idMember"=>"2016011010006","prefix"=>"","fullName"=>"Mila Tejamaya","subfix"=>"Ssi, MOSH, PhD","gender"=>"P"]);
        Member::create(["idMember"=>"2016011010007","prefix"=>"","fullName"=>"Agnes Tifadinar","subfix"=>"SKM, HIMA","gender"=>"P"]);
        Member::create(["idMember"=>"2016011010008","prefix"=>"","fullName"=>"Diana Safitri","subfix"=>"SKM, HIMA","gender"=>"P"]);
        Member::create(["idMember"=>"2016011010009","prefix"=>"","fullName"=>"Baiduri Widanarko","subfix"=>"PhD","gender"=>"L"]);
        Member::create(["idMember"=>"2016011010010","prefix"=>"","fullName"=>"SWenny Ipmawan","subfix"=>"ST, MKKK, HIMA","gender"=>"P"]);
        Member::create(["idMember"=>"2016011010011","prefix"=>"","fullName"=>"Indah Fitria Sari","subfix"=>"SKM","gender"=>"P"]);
        Member::create(["idMember"=>"2016011010012","prefix"=>"","fullName"=>"Doni Hikmat Ramdhan","subfix"=>"SKM, MKKK, PhD","gender"=>"L"]);
        Member::create(["idMember"=>"2016011010013","prefix"=>"Dr.","fullName"=>"Iting Shofwati","subfix"=>"ST, MKKK","gender"=>"P"]);
        Member::create(["idMember"=>"2016011010014","prefix"=>"","fullName"=>"Ikhwan Bukhori","subfix"=>"ST, HIMA","gender"=>"L"]);
        Member::create(["idMember"=>"2016011010015","prefix"=>"","fullName"=>"Sonia Kartika Hapsari","subfix"=>"SKM, MKKK","gender"=>"P"]);
        Member::create(["idMember"=>"2016011010016","prefix"=>"","fullName"=>"Asduki Athari","subfix"=>"SKM, MKKK, HIMA","gender"=>"L"]);
        Member::create(["idMember"=>"2016011010017","prefix"=>"","fullName"=>"Hendra","subfix"=>"SKM, MKKK","gender"=>"L"]);
        Member::create(["idMember"=>"2016011010018","prefix"=>"","fullName"=>"Capt. Muhammad Irwansyah","subfix"=>"Sst, M.Mar, MKKK","gender"=>"L"]);
        Member::create(["idMember"=>"2016011010019","prefix"=>"","fullName"=>"Stevan Sunarno","subfix"=>"SKM","gender"=>"L"]);
    }
}
