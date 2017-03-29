<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Member, App\Address, App\Education, Validator;
use App\City, App\Provincy, App\Regency, App\District;

class Members extends Controller
{
    public function index(Request $request) {
		$member = Member::orderBy("created_at","DESC")->paginate(10);
		$data['content'] = 'members';
		$data['members'] = $member;
		$x = isset($request->page)? $request->page : 1;
		$data['x'] = ($x-1)*10+1;
        return view('admin', $data);
	}

	public function create() {
		$data['content'] = 'members-add';
		return view('admin', $data);
	}
	public function store(Request $request) {
		$user = Member::create($request->except("_token"));
		return \Redirect::back()->with('message', 'Your Input was saved');
	}
	public function edit($memberid) {
		$data["members"] = Member::findOrFail($memberid);
		$data['content'] = 'members-edit-advanced';
		return view('admin', $data);
	}
	public function update(Request $request, $memberid){
		$validator = Validator::make($request->all(), [
			"idMember" => 'required|max:255|unique:members,idMember,'.$memberid.',memberid',
			"email"    => 'required|max:255|unique:members,email,'.$memberid.',memberid',
        ]);

        if ($validator->fails()) {
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
			"education"      => $request->education,
			"certificated"   => $certificated,
			"startYear"      => $request->startYear,
            "companyName"    => $request->companyName,
            "position"       => $request->position,
            "phone"          => $request->phone,
            "homePhone"      => $request->homePhone,
            "officePhone"    => $request->officePhone,
            "email"          => $request->email
		];
		$user = Member::where('memberid', $memberid)->update($insertData);
		return \Redirect::back()->with('message', 'Your Changes was saved');
	}
	public function destroy($memberid) {
		$Member = Member::findOrFail($memberid);
		$Member->delete();
		return \Redirect::back()->with('message', 'Your Members was deleted');
	}
	public function show($memberid) {
		$data["content"] = "member-detail";
		$data["member"] = Member::find($memberid);
        $address = Address::where(["memberid"=>$data["member"]->memberid])->first();
        $data["education"] = Education::where(["memberid"=>$memberid])->get();
        if ($address !=null)
        $data["address"] = $address->jalan." Desa/Kelurahan ".District::name($address->village).", Kec. ".Regency::name($address->subdistricts)." ".City::name($address->district).". ".Provincy::name($address->province).", ".$address->zipcode; 
    	else
    	$data["address"] = "-";	

        return view('admin', $data);
	}
}
