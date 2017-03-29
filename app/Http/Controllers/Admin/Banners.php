<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Banner;
use Redirect;

class Banners extends Controller
{
	private $perPage = 10;
    public function index(Request $request){
		$data['content'] = 'banner';
		$data['posts'] = Banner::paginate($this->perPage);
		$x = isset($request->page)? $request->page : 1;
		$data['x'] = ($x-1)*$this->perPage+1;
        return view('admin', $data);
	}

	public function create() {
		$data['content'] = 'banner-add';
		return view('admin', $data);
	}
	public function edit($Bannerid=null) {
		if ($Bannerid==null) return Redirect::intended('/admin');
		$data['content'] = 'banner-add';
		$data["posts"] = Banner::findOrFail($Bannerid);
		return view('admin', $data);
	}
	public function store(Request $request) {
		if ($this->validator($request)->fails()) {
            return \Redirect::back()
                        ->withErrors($this->validator($request))
                        ->withInput();
        }else{
        	$image = $request->file('ImgBanner'); 
    		if ($image) {
	            $filename  = time() . '.' . $image->getClientOriginalExtension();
	            $path = public_path('uploads/banner/' . $filename);
	            \Image::make($image->getRealPath())->save($path);
	            $request->merge(["banner"=>$filename]);
        	}

        	Banner::create($request->except("_token"));
			return \Redirect::back()->with('message', 'Your Banner was saved');
    	}
    }

    public function update(Request $request, $Bannerid) {
		if ($this->validator($request)->fails()) {
            return \Redirect::back()
                        ->withErrors($this->validator($request))
                        ->withInput();
        }else{
        	$image = $request->file('ImgBanner'); 
    		if ($image) {
	            $filename  = time() . '.' . $image->getClientOriginalExtension();
	            $path = public_path('uploads/banner/' . $filename);
	            \Image::make($image->getRealPath())->save($path);
	            $request->merge(["banner"=>$filename]);
        	}
        	Banner::where('id', $Bannerid)->update($request->except("_token","ImgBanner"));
			return \Redirect::back()->with('message', 'Your Banner was saved');
    	}
	}
	private function validator(Request $request) {
		$validator = \Validator::make($request->all(),[
			'ImgBanner'   => 'mimes:jpg,jpeg,bmp,png',
			'title_id' => 'required',
			'title_en' => 'required',
			'position' => 'required'
        ]);
        return $validator;
	}
	public function destroy($catid) {
		$page = Banner::findOrFail($catid);
		$page->delete();
		return \Redirect::back()->with('message', 'Your Banner was deleted');
	}
}
