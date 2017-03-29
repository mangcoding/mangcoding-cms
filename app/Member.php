<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $primaryKey = 'memberid';
    protected $fillable = [
        'prefix','fullName', 'subfix', 'gender', 'birthPlace', 'birthDate','birthDate','civilizationNo','education','certificated','startYear','companyName','position','phone','homePhone','officePhone','email','avatar','status'];

    public function address() {
        return $this->belongsTo('App\Address', 'memberid', 'memberid');
    }
    public function education() {
        return $this->hasMany('App\Education', 'memberid', 'memberid');
    }

    public static function countNew() {
    	return self::where("idMember","=","")->count();
    }
}
