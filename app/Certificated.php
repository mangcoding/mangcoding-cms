<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificated extends Model
{
	public $timestamps = false;
    public static function selectRandom($method = 'RAND') {
    	if ($method == 'RAND') 
    		$get = Certificated::orderByRaw("RAND()")->first();
    	else if ($method == 'ASC')
    		$get = Certificated::orderBy('id', 'ASC')->first();
    	else
    		$get = Certificated::orderBy('id', 'DESC')->first();
    	return $get->certification;
    }

    public static function checkbox($default=null) {
        $data = Certificated::all();
        $checkbox = "";
        if ($default !=null) $isi = explode(";",$default); else $isi = array();

        if ($default !=null) {
            foreach ($isi as $value) {
                $checkbox .= " <div class=\"checkbox\"><label>".\Form::checkbox('certificated[]',$value, 1)."&nbsp;".$value."</label></div>";
            }
        }
        foreach ($data as $data) {
            if (!in_array($data->certification, $isi ))
                $checkbox .= " <div class=\"checkbox\"><label>".\Form::checkbox('certificated[]', $data->certification, 0)."&nbsp;".$data->certification."</label></div>";
        }
        $checkbox .= "<div class=\"col-sm-6 row\">".\Form::text('certificated[others]', '' , ['placeholder'=>'Other', 'class'=>'form-control wpcf7-form-control wpcf7-text', 'id'=>'certificated'])."</div>";
        return $checkbox;
    }
}
