<?php	
namespace App\Http\Controllers;

use	App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\EmailController as KirimEmail;
use Illuminate\Support\Facades\Auth;
use View;
use App\Page, App\Banner, App\Translate;

class DefaultController extends Controller	{
	private $page;
	private $perPage = 6;

	function __construct(){
		$this->page = new Page;
	}

	public function homepage() {
		return View::make('theme::homepage');
	}

	public function page($href) {	
		$data["page"] = $this->page->findbyHref($href);
		if ($data["page"] == null) abort(404);
		$data["linkTerkait"] = $this->page->terkait($href);
		return View::make('theme::single-page',$data);
	}

	public function contact() {
		return View::make('theme::contact-page');
	}

	public function result(Request $request) {	
		$keywords = $request->keywords;
		if ($keywords == "") abort(404);
    	$Pages = new Translate;
		$posts = $Pages->where("title",'LIKE','%'.$keywords.'%')->paginate($this->perPage);
		$data['news'] = $posts;
		$data['tag'] = explode(",",$keywords);
		$data['title'] = "keywords : ".$keywords;
		$data['keywords'] = $keywords;
		$data['description'] = $posts->count()." result Found";
		$data['font'] = [8,9,10,11,12];
		$x = isset($request->page)? $request->page : 1;
		$data['x'] = ($x-1)*$this->perPage+1;
		return View::make('theme::result', $data);
	}
}