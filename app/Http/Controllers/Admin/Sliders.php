<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Slider;

class Sliders extends Controller
{
    private $perPage = 10;
    public function index(Request $request){
		$data['content'] = 'slider';
		$data['posts'] = Slider::paginate($this->perPage);
		$x = isset($request->page)? $request->page : 1;
		$data['x'] = ($x-1)*$this->perPage+1;
        return view('admin', $data);
	}

	public function create() {
		$data['content'] = 'slider-add';
		return view('admin', $data);
	}
	public function edit($Sliderid=null) {
		if ($Sliderid==null) return Redirect::intended('/admin');
		$data['content'] = 'slider-add';
		$data["posts"] = Slider::findOrFail($Sliderid);
		return view('admin', $data);
	}
	public function store(Request $request) {
		if ($this->validator($request)->fails()) {
            return \Redirect::back()
                        ->withErrors($this->validator($request))
                        ->withInput();
        }else{
        	$image = $request->file('ImgSlider'); 
    		if ($image) {
	            $filename  = time() . '.' . $image->getClientOriginalExtension();
	            $path = public_path('uploads/slider/' . $filename);
	           \Image::make($image->getRealPath())->fit(1920, 580)->save($path);
	            $request->merge(["images"=>$filename]);
        	}

        	Slider::create($request->except("_token","ImgSlider"));
			return \Redirect::back()->with('message', 'Your Slider was saved');
    	}
    }

    public function update(Request $request, $Sliderid) {
		if ($this->validator($request)->fails()) {
            return \Redirect::back()
                        ->withErrors($this->validator($request))
                        ->withInput();
        }else{
        	$image = $request->file('ImgSlider'); 
    		if ($image) {
	            $filename  = time() . '.' . $image->getClientOriginalExtension();
	            $path = public_path('uploads/slider/' . $filename);
	            \Image::make($image->getRealPath())->fit(1920, 580)->save($path);
	            $request->merge(["images"=>$filename]);
        	}
        	Slider::where('idslider', $Sliderid)->update($request->except("_token","ImgSlider"));
			return \Redirect::back()->with('message', 'Your Slider was saved');
    	}
	}
	private function validator(Request $request) {
		$validator = \Validator::make($request->all(),[
			'ImgSlider'   => 'required|mimes:jpg,jpeg,bmp,png',
			'title_id' => 'required',
			'title_en' => 'required'
        ]);
        return $validator;
	}
	public function destroy($catid) {
		$page = Slider::findOrFail($catid);
		$page->delete();
		return \Redirect::back()->with('message', 'Your Slider was deleted');
	}
}
