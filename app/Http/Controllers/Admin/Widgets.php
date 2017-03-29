<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Widget;
use Redirect;

class Widgets extends Controller
{
	private $perPage = 10;
    public function index(Request $request){
		$data['content'] = 'widget';
		$data['posts'] = Widget::paginate($this->perPage);
		$x = isset($request->page)? $request->page : 1;
		$data['x'] = ($x-1)*$this->perPage+1;
        return view('admin', $data);
	}

	public function create() {
		$data['content'] = 'widget-add';
		return view('admin', $data);
	}
	public function edit($widgetid=null) {
		if ($widgetid==null) return Redirect::intended('/admin');
		$data['content'] = 'widget-add';
		$data["posts"] = Widget::findOrFail($widgetid);
		return view('admin', $data);
	}
	public function store(Request $request) {
		if ($this->validator($request)->fails()) {
            return \Redirect::back()
                        ->withErrors($this->validator($request))
                        ->withInput();
        }else{
        	Widget::create($request->except("_token"));
			return \Redirect::back()->with('message', 'Your Widget was saved');
    	}
    }

    public function update(Request $request, $widgetid) {
		if ($this->validator($request)->fails()) {
            return \Redirect::back()
                        ->withErrors($this->validator($request))
                        ->withInput();
        }else{
        	$user = Widget::where('widgetid', $widgetid)->update($request->except("_token"));
			return \Redirect::back()->with('message', 'Your Widget was saved');
    	}
	}
	private function validator(Request $request) {
		$validator = \Validator::make($request->all(),[
			'widgetName'  => 'required',
			'title_id'    => 'required',
			'title_en'    => 'required',
			'widgetValue' => 'required'
        ]);
        return $validator;
	}
}
