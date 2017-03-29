<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Page;
use App\Pagetype;
use App\Translate as Translation;
use Redirect;

class Pages extends Controller
{
	private $perPage = 10;
    public function index(Request $request){
		$Pages = new Page;
		$href = \Request::segment(2);
		if ($href == "pages") $pagetypeId = 1;
		else if ($href == "news") $pagetypeId = 2;
		else if ($href == "events") $pagetypeId = 3;
		else if ($href == "issues") $pagetypeId = 4;
		else if ($href == "link") $pagetypeId = 5;
		else $pagetypeId = "6";

		$posts = $Pages->showPages($pagetypeId);
		$data['content'] = 'pages';
		$data['posts'] = $posts;
		$x = isset($request->page)? $request->page : 1;
		$data['x'] = ($x-1)*$this->perPage+1;
        return view('admin', $data);
	}
	public function create() {
		$data['content'] = 'add-pages';
		$data['sg'] = \Request::segment(3);
		$data['pagetype'] = Pagetype::select();
		$data['parent'] = Page::selectTop();
		return view('admin', $data);
	}
	public function edit($idpages=null) {
		if ($idpages==null) return Redirect::intended('/admin');
		$data['content'] = 'add-pages';
		$data['sg'] = \Request::segment(3);
		$data['pagetype'] = Pagetype::select();
		$data['parent'] = Page::selectTop();
		$data["posts"] = Page::findbyid($idpages);
		return view('admin', $data);
	}
	public function store(Request $request) {
		if ($this->validator($request)->fails()) {
            return \Redirect::back()
                        ->withErrors($this->validator($request))
                        ->withInput();
        }else{
        	return $this->updatePOST("add",$request);
    	}
    }

    public function update(Request $request, $idpages=null) {
		if ($this->validator($request)->fails()) {
            return \Redirect::back()
                        ->withErrors($this->validator($request))
                        ->withInput();
        }else{
        	return $this->updatePOST("edit",$request,$idpages);
    	}
	}

    private function updatePOST($type="add", Request $request,$idpages=null) {
    	$Pages = $type=="add" ? new Page : Page::findforUpdate($idpages);
    	$Pages->parent = ($request->parent == "0") ? "0" : $request->parent;
    	$Pages->featured = ($request->featured =="") ? "0" : "1";

    	if ($request->href_en != "") $href_en = $request->href_en; 
    	else $href_en = str_slug($request->title_en);

    	if ($request->href_id != "") $href_id = $request->href_id; 
    	else $href_id = str_slug($request->title_id);

    	if ($Pages->featured == 1) {
    		$image = $request->file('featured_img'); 
    		if ($image) {
	            $filename  = time() . '.' . $image->getClientOriginalExtension();
	            $path = public_path('uploads/media/square_' . $filename);
	            $bigpath = public_path('uploads/media/big_' . $filename);
	            $ori = public_path('uploads/media/' . $filename);
	            \Image::make($image->getRealPath())->fit(200, 200)->save($path);
                \Image::make($image->getRealPath())->fit(750, 200)->save($bigpath);
                \Image::make($image->getRealPath())->save($ori);
	            $Pages->featured_img = $filename;
        	}
    	}
    	$Pages->pagetype = $request->pagetype;
    	$Pages->topmenu = ($request->topmenu =="") ? 0 : 1;
    	if ($request->pagetype == 3) $Pages->eventdate = $request->eventdate;
    	$Pages->postby = \Auth::user()->adminid;
    	$Pages->status = $request->status;
    	if ($type == "add") {
    		$Pages->save();
    		$english = str_replace("../../uploads/media",url('uploads/media'), $request->content_en);
    		$bahasa = str_replace("../../uploads/media",url('uploads/media'), $request->content_id);
	        $saveData = [
			["idpages" =>$Pages->idPages, "language"=>"en", "href"=>$href_en, "title"=>$request->title_en, "keywords"=>$request->keywords_en,"description"=>$request->description_en,"content"=>$english],
			["idpages" =>$Pages->idPages, "language"=>"id", "href"=>$href_id, "title"=>$request->title_id, "keywords"=>$request->keywords_id,"description"=>$request->description_id,"content"=>$bahasa]
			];
	        Translation::insert($saveData);
	        return \Redirect::back()->with('message', 'Your Input was saved');
    	}else{
    		$Pages->save();
	        list($tranEn,$transId) = $Pages->findID($idpages);
	        $tranEn->title = $request->title_en;
	        $tranEn->keywords = $request->keywords_en;
	        $tranEn->description = $request->description_en;
	        $tranEn->href = $href_en;
	        $tranEn->content = str_replace("../../../uploads/media",url('uploads/media'), $request->content_en);
	        $tranEn->save();

	        $transId->title = $request->title_id;
	        $transId->keywords = $request->keywords_id;
	        $transId->description = $request->description_id;
	        $transId->href = $href_id;
	        $transId->content = str_replace("../../../uploads/media",url('uploads/media'), $request->content_id);
	        $transId->save();

	        return \Redirect::back()->with('message', 'Your Change was saved');
    	}
	}

	private function validator(Request $request) {
		$validator = \Validator::make($request->all(),[
			'pagetype'     => 'required',
			'parent'         => 'required',
			'featured_img'   => 'mimes:jpg,jpeg,bmp,png',
			'eventdate'      => 'required_if:pagetype,3',
			'title_id'       => 'required',
			'keywords_id'    => 'required',
			'description_id' => 'required',
			'content_id'     => 'required',
			'title_en'       => 'required',
			'keywords_en'    => 'required',
			'description_en' => 'required',
			'content_en'     => 'required',
			'status'         => 'required'
        ]);

        $validator->sometimes('featured_img','required',function($request){
        	return ($request->pagetype == "2" && $request->featured == "1");
        });

        return $validator;
	}
	public function destroy($pageid) {
		$page = Page::findOrFail($pageid);
		$page->delete();
		return \Redirect::back()->with('message', 'Your Pages was deleted');
	}
}
