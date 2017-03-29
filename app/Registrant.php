<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registrant extends Model
{
	protected $primaryKey = 'noInvoice';
    protected $fillable = [
        'noInvoice','idMember','becomeMember','nama', 'email', 'institution', 'phoneNumber','idSeminar', 'idPacks', 'topicPlan','bankFrom','bankTo','nominal','confirmDate','confirmAttach','token','attachment','status'];

    public static function pilih($where=array()) {
    	 $peserta = Registrant::from("registrants as A")->select('A.*','A.noInvoice as InoviceNumber','B.title as seminar','B.price','B.memberPrice')
    	 ->leftJoin('seminars AS B', 'B.idSeminar', '=', 'A.idSeminar')
    	 ->where($where)->get();

    	 return $peserta;
    }

    public static function countNew() {
    	return self::where("status","=","0")->count();
    }

    public static function countWaiting() {
    	return self::where("status","=","2")->count();
    }
}
