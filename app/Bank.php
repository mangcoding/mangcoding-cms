<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
	protected $fillable = [
        'bankName','bankAccount', 'bankRec'];
    public $timestamps = false;

    public static function select() {
    	$data[""] = "Pilih Bank Tujuan";
    	foreach (Bank::all() as $bank) {
    		$detail = $bank->bankName." ".$bank->bankAccount." ".$bank->bankRec;
    		$data[$detail] = $detail;
    	}
    	return $data;
    }
}
