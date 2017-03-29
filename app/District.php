<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $primaryKey = 'desaId';
    protected $table = 'desa';
    public $timestamps = false;

    public static function select($id) {
    	return District::where('kecamatanId', '=', $id)->lists('desaNama', 'desaId')->toArray();
    }
    public static function name($id) {
    	$data =  District::findOrfail($id);
    	return $data->desaNama;
    }
}
