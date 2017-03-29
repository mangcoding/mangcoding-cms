<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View, App\Page;

class News extends Controller
{
	private $perPage = 5;
    public function index() {
    	$Pages = new Page;
		$posts = $Pages->setPerPage($this->perPage)->setType(2)->showFrontPages();
		$data['news'] = $posts;
		$data['tag'] = explode(",",app('keywords'));
		$data['title'] = trans('routes.news');
		$data['keywords'] = trans('routes.newsKeywords');
		$data['description'] = trans('routes.newsInformation');
		$data['font'] = [8,9,10,11,12];
		$x = isset($request->page)? $request->page : 1;
		$data['x'] = ($x-1)*$this->perPage+1;
		$data['postTerkini'] = $Pages->setType(2)->setLimit(10)->getLatest();
		return View::make('theme::news', $data);
	}
	public function show($href) {
		$Pages = new Page;
		$data["page"] = $Pages->findbyHref($href);
		if ($data["page"] == null) abort(404);
		$data['postTerkini'] = $Pages->setType(2)->setLimit(10)->getLatest();
		$data['tag'] = explode(",",$data["page"]->keywords);
		$data['font'] = [8,9,10,11,12];

		return View::make('theme::single-news',$data);
	}
}
