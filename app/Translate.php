<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translate extends Model
{
	public $timestamps = false;
	protected $primaryKey = "idtranslate";
    protected $fillable = [
        'idPages','parent', 'orderid', 'featured', 'featured_img', 'pagetype','catid', 'topmenu', 'eventdate','postby', 'status'];
}
