<?php

use Illuminate\Database\Seeder;
use App\Address, App\Member, App\Certificated, App\Education;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create("id_ID");
		foreach (range(1,5) as $index) {
            $member = Member::create([
                "prefix"         => $faker->randomElement([$faker->titleMale, $faker->titleFemale]),
                "fullName"       => $faker->name,
                "subfix"         => $faker->randomElement(["Phd","M.Kom","M.Ba","M.Pd","S.Kom","ST"]),
                "gender"         => $faker->randomElement(["L","P"]),
                "birthPlace"     => $faker->city,
                "birthDate"      => $faker->date,
                "civilizationNo" => $faker->creditCardNumber,
                "education"      => $faker->randomElement(["SD","SMP","SMA","D1","D2","D3","D4","S1","S2","S3"]),
                "certificated"   => Certificated::selectRandom('RAND'),
                "startYear"      => $faker->year,
                "companyName"    => $faker->company,
                "position"       => $faker->randomElement(["Direktur","Karyawan","CEO","CTO","CO. Founder","Peg. Swasta"]),
                "phone"          => $faker->phoneNumber,
                "homePhone"      => $faker->phoneNumber,
                "officePhone"    => $faker->phoneNumber,
                "email"          => $faker->email,
                "avatar"         => $faker->image(public_path('/uploads/avatar'),200, 200, '', false),
            ]);

            $address = Address::create([
                'memberid'     => $member->memberid,
                "jalan"        => $faker->address,
                "village"      => "3674020013",
                "subdistricts" => "3674020",
                "district"     => "3674",
                "province"     => "36",
                "zipcode"      => $faker->postcode
            ]);

            foreach(range(1,3) as $no) {
                Education::create([
                    'memberid'     => $member->memberid,
                    "education"    => $faker->randomElement(["SD","SMP","SMA","D1","D2","D3","D4","S1","S2","S3"]),
                    "eduName"      => $faker->randomElement(["Bandung","Jakarta","Bali"]),
                    "eduMayor"     => $faker->randomElement(["Teknik Informatika","Teknik Mesin","Multimedia"]),
                    "eduYear"      => $faker->year,
                    "eduGraduated" => $faker->year
                ]);
            }
		}
    }
}
