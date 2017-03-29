<?php

use Illuminate\Database\Seeder;
use App\Page, App\Translate;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    #Pagetype [1= Static page, 2=News, 3=Events, 4=Issues, 5=Menus, 6=External Link]
    public function run()
    {
        $faker = \Faker\Factory::create("id_ID");
        $Page = new Page;
        $pages = $Page->create([
			"parent"       => 0,
			"orderid"      => 0,
			"featured"     => 1,
			"featured_img" => $faker->image(public_path('/uploads/media'),750, 200,'',false),
			"pagetype"     => 1,
			"eventdate"    => Null,
			"postby"       => 1,
			"status"       => 1
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "en",
			"title"       => "Welcome to Projects",
			"href"        => "welcome-to-projects",
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "id",
			"title"       => "Selamat Datang di Website kami",
			"href"        => "selamat-datang-di-website-kami",
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);
        $pages = $Page->create([
			"parent"       => 0,
			"orderid"      => 1,
			"topmenu"      => 1,
			"pagetype"     =>  5,
			"eventdate"    => Null,
			"postby"       => 1,
			"status"       => 1
        ]);
        #---------------------------------------mangcoding-------------------------------------
        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "en",
			"title"       => "mangcoding",
			"href"        => "mangcoding"
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "id",
			"title"       => "mangcoding",
			"href"        => "mangcoding-id"
        ]);

        #---------------------------------------MEMBERSHIP-------------------------------------
        $pages = $Page->create([
			"parent"       => 0,
			"orderid"      => 2,
			"topmenu"      => 1,
			"pagetype"     =>  5,
			"eventdate"    => Null,
			"postby"       => 1,
			"status"       => 1
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "en",
			"title"       => "Membership",
			"href"        => str_slug("Membership")
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "id",
			"title"       => "Keanggotaan",
			"href"        => str_slug("Keanggotaan")
        ]);
        #---------------------------------------CERTIFICATION-------------------------------------
        $pages = $Page->create([
			"parent"       => 0,
			"orderid"      => 3,
			"topmenu"      => 1,
			"pagetype"     =>  5,
			"eventdate"    => Null,
			"postby"       => 1,
			"status"       => 1
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "en",
			"title"       => "Certification",
			"href"        => str_slug("Certification")
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "id",
			"title"       => "Sertifikasi",
			"href"        => str_slug("Sertifikasi")
        ]);
        #------------------------Publication and Resources---------------------------
        $pages = $Page->create([
			"parent"       => 0,
			"orderid"      => 4,
			"topmenu"      => 1,
			"pagetype"     => 5,
			"eventdate"    => Null,
			"postby"       => 1,
			"status"       => 1
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "en",
			"title"       => "Publication and Resources",
			"href"        => str_slug("Publication and Resources")
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "id",
			"title"       => "Publikasi dan Sumber Daya",
			"href"        => str_slug("Publikasi dan Sumber Daya")
        ]);

        #----------------------------------Training-------------------------------------
        $pages = $Page->create([
			"parent"       => 0,
			"orderid"      => 5,
			"topmenu"      => 1,
			"pagetype"     => 5,
			"eventdate"    => Null,
			"postby"       => 1,
			"status"       => 1
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "en",
			"title"       => "Training",
			"href"        => str_slug("Training")
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "id",
			"title"       => "Pelatihan",
			"href"        => str_slug("Pelatihan")
        ]);

        #----------------------------------Event-------------------------------------
        $pages = $Page->create([
			"parent"       => 0,
			"orderid"      => 6,
			"topmenu"      => 1,
			"pagetype"     => 5,
			"eventdate"    => Null,
			"postby"       => 1,
			"status"       => 1
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "en",
			"title"       => "Event",
			"href"        => str_slug("Event")
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "id",
			"title"       => "Agenda",
			"href"        => str_slug("Agenda")
        ]);

        /*
        |--------------------------------------------------------------------------
	    | SubMenu mangcoding
	    |--------------------------------------------------------------------------
         */ 
        $pages = $Page->create([
			"parent"       => 2, //submenu mangcoding
			"orderid"      => 1,
			"featured"     => 1,
			"topmenu"      => 1,
			"featured_img" => $faker->image(public_path('/uploads/media'),750, 200,'',false),
			"pagetype"     =>  1,
			"eventdate"    => Null,
			"postby"       => 1,
			"status"       => 1
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "en",
			"title"       => "About mangcoding",
			"href"        => "about-mangcoding",
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "id",
			"title"       => "Tentang mangcoding",
			"href"        => "tentang-mangcoding",
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);

        $pages = $Page->create([
			"parent"       => 2, //submenu mangcoding
			"orderid"      => 2,
			"topmenu"      => 1,
			"pagetype"     =>  1,
			"eventdate"    => Null,
			"postby"       => 1,
			"status"       => 1
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "en",
			"title"       => "Contact Us",
			"href"        => "contact-us",
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "id",
			"title"       => "Hubungi Kami",
			"href"        => "hubungi-mangcoding",
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);

        $pages = $Page->create([
			"parent"       => 2, //submenu mangcoding
			"orderid"      => 3,
			"topmenu"      => 1,
			"pagetype"     =>  1,
			"eventdate"    => Null,
			"postby"       => 1,
			"status"       => 1
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "en",
			"title"       => "Board of Advisory",
			"href"        => str_slug("Board of Advisory"),
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "id",
			"title"       => "Dewan Penasehat",
			"href"        => str_slug("Dewan Penasehat"),
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);

        $pages = $Page->create([
			"parent"       => 2, //submenu mangcoding
			"orderid"      => 4,
			"topmenu"      => 1,
			"pagetype"     =>  1,
			"eventdate"    => Null,
			"postby"       => 1,
			"status"       => 1
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "en",
			"title"       => "Board of Administration",
			"href"        => str_slug("Board of Administration"),
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "id",
			"title"       => "Dewan Administrasi",
			"href"        => str_slug("Dewan Administrasi"),
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);
        /*
        |--------------------------------------------------------------------------
	    | SubMenu mangcoding
	    |--------------------------------------------------------------------------
         */ 
        $pages = $Page->create([
			"parent"       => 3, //submenu Membership
			"orderid"      => 1,
			"featured"     => 1,
			"topmenu"      => 1,
			"featured_img" => $faker->image(public_path('/uploads/media'),750, 200,'',false),
			"pagetype"     =>  1,
			"eventdate"    => Null,
			"postby"       => 1,
			"status"       => 1
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "en",
			"title"       => "Types of membership",
			"href"        => str_slug("Types of membership"),
			"keywords"    => "some keywords, Membership, mangcoding Membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "id",
			"title"       => "Tipe keanggotaan",
			"href"        => str_slug("Tipe keanggotaan"),
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);

        $pages = $Page->create([
			"parent"       => 3, //submenu Membership
			"orderid"      => 2,
			"topmenu"      => 1,
			"pagetype"     =>  1,
			"eventdate"    => Null,
			"postby"       => 1,
			"status"       => 1
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "en",
			"title"       => "Benefits",
			"href"        => str_slug("Benefits"),
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "id",
			"title"       => "Keuntungan",
			"href"        => str_slug("Keuntungan"),
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);

        $pages = $Page->create([
			"parent"       => 3, //submenu Membership
			"orderid"      => 3,
			"topmenu"      => 1,
			"pagetype"     =>  1,
			"eventdate"    => Null,
			"postby"       => 1,
			"status"       => 1
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "en",
			"title"       => "Become a member",
			"href"        => str_slug("Become a member"),
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "id",
			"title"       => "Menjadi Member mangcoding",
			"href"        => str_slug("Menjadi Member mangcoding"),
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);

        $pages = $Page->create([
			"parent"       => 3, //submenu Membership
			"orderid"      => 4,
			"topmenu"      => 1,
			"pagetype"     =>  1,
			"eventdate"    => Null,
			"postby"       => 1,
			"status"       => 1
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "en",
			"title"       => "Renew your membership",
			"href"        => str_slug("Renew your membership"),
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "id",
			"title"       => "Memperbaharui keanggotaan Anda",
			"href"        => str_slug("Memperbaharui keanggotaan Anda"),
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);

        $pages = $Page->create([
			"parent"       => 3, //submenu Membership
			"orderid"      => 5,
			"topmenu"      => 1,
			"pagetype"     =>  1,
			"eventdate"    => Null,
			"postby"       => 1,
			"status"       => 1
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "en",
			"title"       => "Frequently Asked Questions",
			"href"        => str_slug("Frequently Asked Questions"),
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "id",
			"title"       => "Pertanyaan yang Sering Diajukan",
			"href"        => str_slug("Pertanyaan yang Sering Diajukan"),
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);
        /*
        |--------------------------------------------------------------------------
	    | SubMenu CERTIFICATION
	    |--------------------------------------------------------------------------
         */ 
        $pages = $Page->create([
			"parent"       => 4, //submenu Certification
			"orderid"      => 1,
			"topmenu"      => 1,
			"pagetype"     =>  1,
			"eventdate"    => Null,
			"postby"       => 1,
			"status"       => 1
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "en",
			"title"       => "Level of Competency",
			"href"        => str_slug("Level of Competency"),
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "id",
			"title"       => "Tingkat Kompetensi",
			"href"        => str_slug("Tingkat Kompetensi"),
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);

        $pages = $Page->create([
			"parent"       => 4, //submenu Certification
			"orderid"      => 2,
			"topmenu"      => 1,
			"pagetype"     =>  1,
			"eventdate"    => Null,
			"postby"       => 1,
			"status"       => 1
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "en",
			"title"       => "Certification process",
			"href"        => str_slug("Certification process"),
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "id",
			"title"       => "Proses Sertifikasi",
			"href"        => str_slug("Proses Sertifikasi"),
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);

        $pages = $Page->create([
			"parent"       => 4, //submenu Certification
			"orderid"      => 2,
			"topmenu"      => 1,
			"pagetype"     =>  1,
			"eventdate"    => Null,
			"postby"       => 1,
			"status"       => 1
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "en",
			"title"       => "Apply For Certification",
			"href"        => str_slug("Apply For Certification"),
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "id",
			"title"       => "Mengajukan Untuk Sertifikasi",
			"href"        => str_slug("Mengajukan Untuk Sertifikasi"),
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);

        /*
        |--------------------------------------------------------------------------
	    | SubMenu Publication and Resources
	    |--------------------------------------------------------------------------
         */ 

        $pages = $Page->create([
			"parent"       => 5, //submenu Publication and Resources
			"orderid"      => 1,
			"topmenu"      => 1,
			"pagetype"     =>  1,
			"eventdate"    => Null,
			"postby"       => 1,
			"status"       => 1
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "en",
			"title"       => "mangcoding By law (AD/ART)",
			"href"        => str_slug("mangcoding By law (AD/ART)"),
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "id",
			"title"       => "mangcoding Hukum (AD/ART)",
			"href"        => str_slug("mangcoding Hukum & Peraturan (AD/ART)"),
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);

        $pages = $Page->create([
			"parent"       => 5, //submenu Publication and Resources
			"orderid"      => 2,
			"topmenu"      => 1,
			"pagetype"     =>  1,
			"eventdate"    => Null,
			"postby"       => 1,
			"status"       => 1
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "en",
			"title"       => "Regulation",
			"href"        => str_slug("Regulation"),
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "id",
			"title"       => "Peraturan",
			"href"        => str_slug("Peraturan"),
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);

        $pages = $Page->create([
			"parent"       => 5, //submenu Publication and Resources
			"orderid"      => 3,
			"topmenu"      => 1,
			"pagetype"     => 6,
			"eventdate"    => Null,
			"postby"       => 1,
			"status"       => 1
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "en",
			"title"       => "NIOSH",
			"href"        => "#"
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "en",
			"title"       => "NIOSH",
			"href"        => "#"
        ]);

         $pages = $Page->create([
			"parent"       => 5, //submenu Publication and Resources
			"orderid"      => 4,
			"topmenu"      => 1,
			"pagetype"     => 6,
			"eventdate"    => Null,
			"postby"       => 1,
			"status"       => 1
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "en",
			"title"       => "ACGIH",
			"href"        => "#"
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "en",
			"title"       => "ACGIH",
			"href"        => "#"
        ]);
        /*
        |--------------------------------------------------------------------------
	    | SubMenu Training
	    |--------------------------------------------------------------------------
         */ 
        


        $pages = $Page->create([
			"parent"       => 6, //submenu Training
			"orderid"      => 1,
			"topmenu"      => 1,
			"pagetype"     =>  1,
			"eventdate"    => Null,
			"postby"       => 1,
			"status"       => 1
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "en",
			"title"       => "Topics and Syllabus",
			"href"        => str_slug("Topics and Syllabus"),
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "id",
			"title"       => "Topik dan Silabus",
			"href"        => str_slug("Topik dan Silabus"),
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);

        $pages = $Page->create([
			"parent"       => 6, //submenu Training
			"orderid"      => 2,
			"topmenu"      => 1,
			"pagetype"     =>  1,
			"eventdate"    => Null,
			"postby"       => 1,
			"status"       => 1
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "en",
			"title"       => "Training Schedule",
			"href"        => str_slug("Topics and Syllabus"),
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "id",
			"title"       => "Jadwal Training",
			"href"        => str_slug("Jadwal Training"),
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);

        $pages = $Page->create([
			"parent"       => 6, //submenu Training
			"orderid"      => 3,
			"topmenu"      => 1,
			"pagetype"     =>  1,
			"eventdate"    => Null,
			"postby"       => 1,
			"status"       => 1
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "en",
			"title"       => "Registration for a training",
			"href"        => str_slug("Registration for a training"),
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "id",
			"title"       => "Daftar Training",
			"href"        => str_slug("Daftar Training"),
			"keywords"    => "some keywords, mangcoding, mangcoding membership",
			"description" => "Sample description",
			"content"     => $faker->paragraphs(10, true)
        ]);

        /*
        |--------------------------------------------------------------------------
	    | SubMenu Events
	    |--------------------------------------------------------------------------
         */
        $pages = $Page->create([
			"parent"       => 7,
			"orderid"      => 1,
			"topmenu"      => 1,
			"pagetype"     =>  5,
			"eventdate"    => Null,
			"postby"       => 1,
			"status"       => 1
        ]);
        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "en",
			"title"       => "Incoming seminar",
			"href"        => "events/".str_slug("Incoming seminar"),
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "id",
			"title"       => "Seminar yang akan datang",
			"href"        => "agenda/".str_slug("Seminar yang akan datang"),
        ]);

        $pages = $Page->create([
			"parent"       => 7,
			"orderid"      => 2,
			"topmenu"      => 1,
			"pagetype"     => 5,
			"eventdate"    => Null,
			"postby"       => 1,
			"status"       => 1
        ]);
        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "en",
			"title"       => "mangcoding conference",
			"href"        => "events/".str_slug("mangcoding conference"),
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "id",
			"title"       => "Konferensi mangcoding",
			"href"        => "agenda/".str_slug("Konferensi mangcoding"),
        ]);

        $pages = $Page->create([
			"parent"       => 7,
			"orderid"      => 3,
			"topmenu"      => 1,
			"pagetype"     => 5,
			"eventdate"    => Null,
			"postby"       => 1,
			"status"       => 1
        ]);
        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "en",
			"title"       => "Registration",
			"href"        => "events/".str_slug("Registration"),
        ]);

        Translate::insert([
			"idpages"     => $pages->idPages,
			"language"    => "id",
			"title"       => "Pendaftaran",
			"href"        => "agenda/".str_slug("Pendaftaran"),
        ]);

    }
}
