<?php

namespace App\Menu;
use DB;
use App;
use App\Page;
class Menu
{
    private $lang = "en";

    public function __construct() {
        $this->lang = App::getLocale();
    }

    public static function semua() {
        $menu = new Menu;
        return $menu->topMenu($menu->lang);
    }

    private function topMenu() {
        $result = Page::from( 'pages as A')
        ->select('A.idpages','A.parent','B.href','B.title')
        ->where('A.parent', '=', '0')
        ->where('A.topmenu', '=', '1')
        ->leftJoin('translates AS B', 'B.idPages', '=', 'A.idPages')
        ->where('B.language', '=', $this->lang)
        ->where('A.status', '=', '1')
        ->orderBy('A.orderid', 'asc')
        ->get();
        $list = ""; $x=0;
        foreach($result as $result) {            
            $list[$x]["idpages"] =  $result->idpages;
            $list[$x]["url"] =  $result->href;
            $list[$x]["title"] =  $result->title;
            $list[$x]["children"] = $this->getParent($result->idpages);
            $x++;
        }
        return $list;        
    }
    private function getParent($parent) {
        $result = Page::from( 'pages as A')
        ->select('A.idpages','A.parent','B.href','B.title')
        ->where('A.parent', '=', $parent)
        ->leftJoin('translates AS B', 'B.idPages', '=', 'A.idPages')
        ->where('B.language', '=', $this->lang)
        ->where('A.status', '=', '1')
        ->get();
        $list = ""; $x=0;
        foreach($result as $result) {            
            $list[$x]["idpages"] =  $result->idpages;
            $list[$x]["url"] =  $result->href;
            $list[$x]["title"] =  $result->title;
            $list[$x]["children"] = $this->getParent($result->idpages);
            $x++;
        }
        $list = is_array($list) ? $list : 0; 
        return $list;
    }
}
