<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $primaryKey = "idslider";
    protected $fillable = [
        'idslider','title_en', 'title_id', 'images', 'link'];
}
