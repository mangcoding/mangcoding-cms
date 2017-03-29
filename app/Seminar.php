<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    protected $primaryKey = 'idSeminar';
    protected $fillable = [
        'title','description', 'eventDate', 'eventHours', 'openRegist','closeRegist', 'place', 'images','contact','package','price','memberPrice','attachment'];

    public function category() {
        return $this->hasMany('App\Seminarpack', 'idSeminar', 'idSeminar');
    }
}
