<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'title_en','title_id', 'banner', 'position','link','status'];

    public function showBanner($posisi) {
    	$banner = "";
    	$hasil =  Banner::where(["position"=>$posisi])->get();
    	foreach ($hasil as $result) {
    		$banner .= '<a href="'.$result->link.'"><img src="'.url('uploads/banner/'.$result->banner).'" width="100%" /></a>';
    	}
    	return $banner;
    }
}
