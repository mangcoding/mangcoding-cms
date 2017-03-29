<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagetype extends Model
{
	protected $primaryKey = "typeid";
    public $timestamps = false;

    public static function select() {
    	$data = Pagetype::all();
    	$link = array(""=>"Select Pagetype");
    	foreach ($data as $data) {
    		$link[$data->typeid] = $data->pagetype;
    	}
    	return $link; 
    }
}
