<?php

namespace App;
use App, App\Translate;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	protected $primaryKey = 'idPages';
    protected $fillable = [
        'idPages','parent', 'orderid', 'featured', 'featured_img','pagetype','catid','topmenu','eventdate','postby','status'];

    private $lang = "en";
    protected $pagetype = null;
    protected $categories = null;
    protected $limit = 10;
    protected $perPage = 10;

    public function __construct(array $attributes = array()) {
        parent::__construct($attributes);
        $this->lang = App::getLocale();
    }

    public function setCat($catid) {
        $this->categories = $catid;
        return $this;
    }

    public function setLang($lang) {
        $this->lang = $lang;
        return $this;
    }

    public function setType($type) {
        $this->pagetype = $type;
        return $this;
    }

    public function setLimit($limit) {
        $this->limit = $limit;
        return $this;
    }
    public function setPerPage($limit) {
        $this->perPage = $limit;
        return $this;
    }

    public function findbyHref($href) {
        $result = Page::from( 'pages as A')->select('C.fullName','A.created_at','A.idPages','A.parent','A.featured','A.featured_img','A.pagetype','A.topmenu','A.topmenu','A.eventdate','A.status','B.href','B.title','B.keywords','B.description','B.content')
        ->where('B.href', '=', $href)
        ->leftJoin('translates AS B', 'B.idPages', '=', 'A.idPages')
        ->leftJoin('admins AS C', 'C.adminid', '=', 'A.postby')
        ->first();
        return $result;
    }

    public function getByidPages($idPages) {
    	$result = Page::from( 'pages as A')->select('A.created_at','A.idPages','A.parent','A.featured','A.featured_img','A.pagetype','A.topmenu','A.topmenu','A.eventdate','A.status','B.href','B.title','B.keywords','B.description','B.content')
        ->where('A.idPages', '=', $idPages)
        ->leftJoin('translates AS B', 'B.idPages', '=', 'A.idPages')
        ->where('B.language', '=', $this->lang)
        ->first();
        return $result;
    }
    public function terkait($href) {
        $result = Page::from( 'pages as A')->select('A.created_at',"A.idPages","A.parent","A.catid","B.language")->where(["B.href"=>$href])->leftJoin('translates AS B', 'B.idPages', '=', 'A.idPages')->first();

        $hasil = Page::from( 'pages as A')->select('A.created_at','A.idPages','A.parent','A.featured','A.featured_img','A.pagetype','A.topmenu','A.topmenu','A.eventdate','A.status','B.href','B.language','B.title','B.keywords','B.description','B.content')
        ->Where('A.parent', '=', $result->parent)
        ->Where('A.parent', '!=', '0')
        ->leftJoin('translates AS B', 'B.idPages', '=', 'A.idPages')
        ->where('B.language', '=', $result->language)
        ->get();
        return $hasil;
    }
    public function getIdByHref($href) {
        $result = Translate::select("idPages")->where("href","=",$href)->first();
        return $result->idPages;
    }
    public function getHrefByID($idPages) {
        $result = Translate::select("href")->where(["idPages"=>$idPages,"language"=>$this->lang])->first();
        return $result->href;
    }
    public function getLatest() {
        $where = array();

        if ($this->categories !=null) 
            $where['A.catid'] = $this->categories;
        if ($this->pagetype !=null) 
            $where['A.pagetype'] = $this->pagetype;

        $result = Page::from( 'pages as A')->select('A.created_at','A.idPages','A.parent','A.featured','A.featured_img','A.pagetype','A.topmenu','A.topmenu','A.eventdate','A.status','B.href','B.title','B.keywords','B.description','B.content')->leftJoin('translates AS B', 'B.idPages', '=', 'A.idPages')
        ->where('B.language', '=', $this->lang)->where($where)
        ->orderBy('A.idPages', 'desc')->take($this->limit)->get();
        return $result;
    }

    public function showAll() {
        $result = Page::from( 'pages as A')
        ->select('A.created_at','A.idPages','B.href as href_en','B.title as title_en','C.href as href_id','C.title as title_id','D.pagetype')
        ->leftJoin('translates AS B', function ($join) {
            $join->on('B.idPages', '=', 'A.idPages')
                 ->where('B.language', '=', 'en');
        })->leftJoin('translates AS C', function ($join) {
            $join->on('C.idPages', '=', 'A.idPages')
                 ->where('C.language', '=', 'id');
        })->leftJoin('pagetypes AS D', function ($join) {
            $join->on('D.typeid', '=', 'A.pagetype');
        })->orderBy('title_id', 'asc')
        ->paginate($this->perpage);
        return $result;
    }
    public function showPages($cat='1') {
        $result = Page::from( 'pages as A')
        ->select('A.created_at','A.idPages','B.href','B.title as title_en','B.href as href_en', 'C.href as href_id','C.title as title_id','D.pagetype')
        ->leftJoin('translates AS B', function ($join) {
            $join->on('B.idPages', '=', 'A.idPages')
                 ->where('B.language', '=', 'en');
        })->leftJoin('translates AS C', function ($join) {
            $join->on('C.idPages', '=', 'A.idPages')
                 ->where('C.language', '=', 'id');
        })->leftJoin('pagetypes AS D', function ($join) {
            $join->on('D.typeid', '=', 'A.pagetype');
        })->orderBy('title_id', 'asc')
        ->where('A.pagetype', '=', $cat)->paginate($this->perpage);
        return $result;
    }
    public function showFrontPages() {
        $where = array();

        if ($this->categories !=null) 
            $where['A.catid'] = $this->categories;
        if ($this->pagetype !=null) 
            $where['A.pagetype'] = $this->pagetype;

        $result = Page::from( 'pages as A')->select('C.fullName','A.created_at','A.idPages','A.parent','A.featured','A.featured_img','A.pagetype','A.topmenu','A.topmenu','A.eventdate','A.status','B.href','B.title','B.keywords','B.description','B.content')->leftJoin('translates AS B', 'B.idPages', '=', 'A.idPages')
        ->leftJoin('admins AS C', 'C.adminid', '=', 'A.postby')
        ->where('B.language', '=', $this->lang)->where($where)
        ->orderBy('A.idPages', 'desc')->paginate($this->perPage);
        return $result;
    }
    public static function showTop() {
        $result = Page::from( 'pages as A')
        ->select('A.created_at','A.idPages','B.title as title_en','C.title as title_id','D.pagetype')
        ->where('A.topmenu', '=', '1')
        ->leftJoin('translates AS B', function ($join) {
            $join->on('B.idPages', '=', 'A.idPages')
                 ->where('B.language', '=', 'en');
        })->leftJoin('translates AS C', function ($join) {
            $join->on('C.idPages', '=', 'A.idPages')
                 ->where('C.language', '=', 'id');
        })->leftJoin('pagetypes AS D', function ($join) {
            $join->on('D.typeid', '=', 'A.pagetype');
        })->get();
        return $result;
    }
    public static function selectTop() {
        $data = Page::showTop();
        $link = array("");
        foreach ($data as $data) {
            $link[$data->idPages] = $data->title_en." [".$data->title_id."]";
        }
        return $link; 
    }

    public static function findforUpdate($id) {
        return Page::where('idPages', $id)->first();
    }

    public static function findID($id) {
        $data =  Translate::where('idPages',$id)
               ->orderBy('language', 'asc')
               ->get();
        return $data;
    }

     public static function findbyId($id) {
        $result = Page::from( 'pages as A')
        ->select('A.created_at','A.idpages','A.parent','A.featured','A.featured_img','A.pagetype','A.topmenu','A.topmenu','A.eventdate','A.status','B.href as href_en','B.title as title_en','B.keywords as keywords_en','B.description as description_en','B.content as content_en','C.href as href_id','C.title as title_id','C.keywords as keywords_id','C.description as description_id','C.content as content_id')
        ->leftJoin('translates AS B', function ($join) {
            $join->on('B.idpages', '=', 'A.idpages')
                 ->where('B.language', '=', 'en');
        })->leftJoin('translates AS C', function ($join) {
            $join->on('C.idpages', '=', 'A.idpages')
                 ->where('C.language', '=', 'id');
        })->leftJoin('pagetypes AS D', function ($join) {
            $join->on('D.typeid', '=', 'A.pagetype');
        })->where('A.idpages', '=', $id)->first();
        return $result;
    }
}
