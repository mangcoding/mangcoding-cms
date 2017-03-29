<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'kabupatenId';
    protected $table = 'kabupaten';

    public static function select($id) {
        return City::where('provinsiId', '=', $id)->lists('kabupatenNama', 'kabupatenId')->toArray();
    }
    public static function name($id) {
    	$data =  City::findOrfail($id);
    	return $data->kabupatenNama;
    }
}
