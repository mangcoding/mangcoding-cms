<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Categories as Category;

class Categories extends Controller
{
    public function index(Request $request) {
		$posts = Category::showList(10);
		$data['content'] = 'categories';
		$data['posts'] = $posts;
		$x = isset($request->page)? $request->page : 1;
		$data['x'] = ($x-1)*10+1;
        return view('admin', $data);
	}

	public function create() {
		$data['content'] = 'categories-add';
		return view('admin', $data);
	}
	public function store(Request $request) {
		$user = Category::create($request->except("_token"));
		return \Redirect::back()->with('message', 'Your Categories was saved');
	}
	public function edit($catid) {
		$data["cate"] = Category::findOrFail($catid);
		$data['content'] = 'categories-add';
		return view('admin', $data);
	}
	public function update(Request $request, $catid){
		$user = Category::where('catid', $catid)->update($request->except("_token"));
		return \Redirect::back()->with('message', 'Your Categories was saved');
	}
	public function destroy($catid) {
		$page = Category::findOrFail($catid);
		$page->delete();
		return \Redirect::back()->with('message', 'Your Categories was deleted');
	}
	public function show($catid) {
		return "...";
	}
}
