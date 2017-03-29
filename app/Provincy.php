<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincy extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'provinsiId';
    protected $table = 'provinsi';
    

    public static function select() {
    	$models = self::all();
    	return $models->lists('provinsiNama','provinsiId')->toArray();
    }
    public static function name($id) {
    	$data =  Provincy::findOrfail($id);
    	return $data->provinsiNama;
    }
}
