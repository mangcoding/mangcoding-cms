<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bank;

class Banks extends Controller
{
    public function index(Request $request) {
		$posts = Bank::paginate(10);
		$data['content'] = 'bank';
		$data['posts'] = $posts;
		$x = isset($request->page)? $request->page : 1;
		$data['x'] = ($x-1)*10+1;
        return view('admin', $data);
	}

	public function create() {
		$data['content'] = 'bank-add';
		return view('admin', $data);
	}
	public function store(Request $request) {
		$user = Bank::create($request->except("_token"));
		return \Redirect::back()->with('message', 'Your bank was saved');
	}
	public function edit($bankid) {
		$data["bank"] = Bank::findOrFail($bankid);
		$data['content'] = 'bank-add';
		return view('admin', $data);
	}
	public function update(Request $request, $bankid){
		$user = Bank::where('id', $bankid)->update($request->except("_token"));
		return \Redirect::back()->with('message', 'Your bank was saved');
	}
	public function destroy($bankid) {
		$page = Bank::findOrFail($bankid);
		$page->delete();
		return \Redirect::back()->with('message', 'Your bank was deleted');
	}
	public function show($bankid) {
		return "...";
	}
}
