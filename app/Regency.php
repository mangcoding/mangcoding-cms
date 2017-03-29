<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'kecamatanId';
    protected $table = 'kecamatan';

    
    public static function select($id) {
    	return Regency::where('kabupatenId', '=', $id)->lists('kecamatanNama', 'kecamatanId')->toArray();
    }

    public static function name($id) {
    	$data =  Regency::findOrfail($id);
    	return $data->kecamatanNama;
    }
}
