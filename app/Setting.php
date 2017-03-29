<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $timestamps = false;

    public static function education() {
    	return [""=> "Pilih Pendidikan",
			"SD"  => "SD",
			"SMP" => "SMP",
			"SMA" => "SMA",
			"D1"  => "D1",		
			"D2"  => "D2",
			"D3"  => "D3",
			"D4"  => "D4",
			"S1"  => "S1",
			"S2"  => "S2",
			"S3"  => "S3"
    	];
    }

    public static function banner() {
    	return [
            ""  => "Pilih Posisi",
            "1" => "Tengah",
            "2" => "Dibawah widgets",
            "3" => "Diatas widgets"
    	];
    }
}
