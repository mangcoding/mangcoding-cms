<?php

namespace App;
use App;

use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    protected $primaryKey = "widgetid";
    private $lang = "en";

    public function __construct(array $attributes = array()) {
        parent::__construct($attributes);
    	$this->lang = App::getLocale();
    }

    public function getWidget($name=null) {
    	$result = Widget::select("title_".$this->lang." as title","widgetValue as content")->where(["widgetName"=>$name])->first();
    	return $result;
    }
}
