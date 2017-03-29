<?php

namespace App\Http\Controllers\Admin;
use	App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;

class Settings extends Controller
{
	private $perPage = 10;
    public function index(Request $request){
		$data['content'] = 'setting';
		$data['posts'] = Setting::paginate($this->perPage);
		$x = isset($request->page)? $request->page : 1;
		$data['x'] = ($x-1)*$this->perPage+1;
        return view('admin', $data);
	}

    public function edit($settingid=null) {
		if ($settingid==null) return Redirect::intended('/admin');
		$data['content'] = 'setting-add';
		$data["posts"] = Setting::findOrFail($settingid);
		return view('admin', $data);
	}

    public function update(Request $request, $settingid) {
    	Setting::where('id', $settingid)->update($request->except("_token"));
		return \Redirect::back()->with('message', 'Your setting was saved');
	}

	public function store(Request $request) {
		Setting::create($request->except("_token"));
		return \Redirect::back()->with('message', 'Your setting was saved');
	}
}
