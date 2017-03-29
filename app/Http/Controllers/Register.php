<?php	
namespace App\Http\Controllers;

use	App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\EmailController as KirimEmail;
use Illuminate\Support\Facades\Auth;
use View, App\Certificated, App\Member, Validator, App;
use App\Address;
use App\Education;

class Register extends Controller	{
	public function index() {
		return View::make('theme::register');
	}

	public function store(Request $request) {
		$validator = Validator::make(\Input::all(), [
            "phone"      => "required",
            "fullName"   => "required|max:100",
            "gender"     => "required|max:1",
            "birthPlace" => "required",
            "birthDate"  => "required|date",
            "pendidikan" => "required",
            'avatar'     => 'image|mimes:jpg,jpeg,bmp,png',
            "jalan"      => "required|max:255",
            "kelurahan"  => "required|max:255",
            "kecamatan"  => "required|max:255",
            "kota"       => "required|max:255",
            "provinsi"   => "required|max:255",
            "email"      => "required",
            "captcha"    => "required|captcha"
        ]);
		
	 	if ($validator->fails()){
            return \Redirect::back()->withErrors($validator)->withInput();
        }
        $certificated = implode(";",$request->certificated);
		$insertData = [
			"prefix"         => $request->prefix,
			"fullName"       => $request->fullName,
			"subfix"         => $request->subfix,
			"gender"         => $request->gender,
			"birthPlace"     => $request->birthPlace,
			"birthDate"      => $request->birthDate,
			"civilizationNo" => $request->civilizationNo,
			"education"      => $request->pendidikan,
			"certificated"   => $certificated,
			"startYear"      => $request->startYear,
            "companyName"    => $request->companyName,
            "position"       => $request->position,
            "phone"          => $request->phone,
            "homePhone"      => $request->homePhone,
            "officePhone"    => $request->officePhone,
            "email"          => $request->email
		];
        $data = $request->except("_token","edu","exp");
		$avatar = function() use ($data){
            if (isset($data['avatar'])) {
                $image = $data['avatar']; 
                $filename  = time() . '.' . $image->getClientOriginalExtension();
                $Thumb = public_path('uploads/avatar/' . $filename);
                \Image::make($image->getRealPath())->fit(200, 200)->save($Thumb);
                return $filename;
            }else{
                return 'default.jpg';
            }            
        };
        $insertData['avatar'] = $avatar();
        $member = Member::create($insertData);
    	Address::insert([
    		'memberid'     => $member->memberid,
            "jalan"        => $data["jalan"],
            "village"      => $data["kelurahan"],
            "subdistricts" => $data["kecamatan"],
            "district"     => $data["kota"],
            "province"     => $data["provinsi"],
            "zipcode"      => $data["kodepos"]
        ]);
        $education = $request->edu;

        foreach($education as $edu) {
            Education::insert([
                'memberid'     => $member->memberid,
                "education"    => $edu["education"],
                "eduName"      => $edu["eduName"],
                "eduMayor"     => $edu["eduMayor"],
                "eduYear"      => $edu["eduYear"],
                "eduGraduated" => $edu["eduGraduated"]
            ]);
        }
    	return \Redirect::back()->with('msg', 'Registration Success');
	}
}