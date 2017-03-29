<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $primaryKey = 'catid';
    protected $fillable = [
        'typeid','cat_en', 'cat_id', 'href_en', 'href_id','description_en', 'description_id', 'status'];
    public static function showList() {
    	return Categories::from( 'categories as A')->select('A.catid','A.cat_en','A.cat_id','href_en','href_id','B.pagetype')
        ->leftJoin('pagetypes AS B', 'B.typeid', '=', 'A.typeid')
        ->paginate(10);
    }
}
