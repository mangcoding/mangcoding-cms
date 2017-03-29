<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Seminar;
use Validator,View;
use App\Registrant, App\Member,App\Seminarpack, App\Bank;
use App\Http\Controllers\EmailController as KirimEmail;

class Seminars extends Controller
{	
	var $perPage = 10;
    public function index() {
    	$now = date("Y-m-d");
    	$data["title"] = "Seminar";
    	$data["keywords"] = "Register Seminar";
    	$data["description"] = "Find Latest Seminar Here";
    	#$data["seminar"] = Seminar::where(\DB::raw('DATE(openRegist) '),'<=', $now)->where(\DB::raw('DATE(closeRegist) '),'>=', $now)->paginate($this->perPage);
    	$data["seminar"] = Seminar::paginate($this->perPage);
		return View::make('theme::seminar', $data);
	}
	public function show($idSeminar) {
		$now = date("Y-m-d");
		$data["page"] = Seminar::where(["idSeminar"=>$idSeminar])->where(\DB::raw('DATE(openRegist) '),'<=', $now) 								->where(\DB::raw('DATE(closeRegist) '),'>=', $now)->with('category')->first();
        if ($data["page"] == null) :
            $data["page"] = new \ArrayObject;
            $data["page"]->idSeminar = $idSeminar;
            $data["page"]->title = null;
            $data["page"]->description = "Feel Free to contact Us";
            $data["title"] = "Pendaftaran Seminar sudah ditutup/expired";
            $data["keywords"] = $data["title"];
            $desc = preg_replace("/<img[^>]+\>/i", "", $data["page"]->description); 
            $data["description"] = str_limit($desc,100);
        else:
    		$data["title"] = $data["page"]->title;
        	$data["keywords"] = $data["title"];
            $desc = strip_tags($data["page"]->description); 
        	$data["description"] = str_limit($desc,100);
        endif;
		return View::make('theme::seminar-single',$data);
	}

	public function confirmation(){
		$data["title"] = "Konfirmasi Seminar";
    	$data["keywords"] = app('keywords');
    	$data["description"] = app('description');
    	$data["bankTujuan"] = Bank::select();
		return View::make('theme::seminar-confirm',$data);
	}
    public function confirmWithtoken($token) {
        $data["token"] = Registrant::select("noInvoice as invoiceNumber")->where(["token"=>$token])->first();
        $data["title"] = "Konfirmasi Seminar";
        $data["keywords"] = app('keywords');
        $data["description"] = app('description');
        $data["bankTujuan"] = Bank::select();
        if (!$data["token"]) {
            return View::make('theme::seminar-confirm',$data)->withErrors("Session token sudah expired atau anda sudah melakukan konfirmasi. Silakan hubungi Admin !!!");
        }
        return View::make('theme::seminar-confirm',$data);
    }
    public function postConfirm(Request $request) {
        $cek = Registrant::find($request->invoiceNumber);
        if (!$cek)
            return \Redirect::back()->withErrors("Nomor Invoice tidak ditemukan")->withInput();
        if ($cek->status != 0) 
           return \Redirect::back()->withErrors("Anda sudah melakukan konfirmasi pembayaran. silakan tunggu konfirmasi dari kami")->withInput();
        if ($this->validator($request)->fails()) {
            return \Redirect::back()
                        ->withErrors($this->validator($request))
                        ->withInput();
        }
        $buktiTransfer = function() use ($request){
            $image = $request->file('bukti'); 
            if ($image) {
                $filename  = time() . '.' . $image->getClientOriginalExtension();
                $Thumb = public_path('uploads/bukti/' . $filename);
                \Image::make($image->getRealPath())->save($Thumb);
                return url('uploads/bukti/'.$filename);
            }
        };
        $updated = [
            "bankFrom"      => $request->bankPengirim." ".$request->rekPengirim,
            "bankTo"        => $request->bankTujuan,
            "transferDate"  => $request->transferDate,
            "confirmDate"   => date("Y-m-d h:i:s"),
            "confirmAttach" => $buktiTransfer(),
            "token"         => "waiting approval",
            "status"        => "2",
        ];
        Registrant::where(["noInvoice"=>$request->invoiceNumber])->update($updated);
        return redirect('confirmation')->with('msg', 'Konfirmasi berhasil');
        #return \Redirect::route('confirmation')->with('msg', 'Konfirmasi berhasil');
    }
    private function validator(Request $request) {
        $validator = \Validator::make($request->all(),[
            'invoiceNumber' => 'required',
            'bukti'         => 'mimes:jpg,jpeg,bmp,png',
            'bankPengirim'  => 'required',
            'rekPengirim'   => 'required',
            'bankTujuan'    => 'required',
            'transferDate'  => 'required',
            'captcha'       => 'required|captcha'
        ]);
        return $validator;
    }
	public function daftar(Request $request, $idSeminar) {
		$validator = Validator::make(\Input::all(), [
            "phoneNumber" => "required",
            "attach"      => "max:1024|mimes:pdf,doc,docx,txt,odt",
            "nama"        => "required|max:100",
            "idPacks"     => "required",
            "institution" => "required",
            "email"       => 'required|max:255|unique:registrants,email',
            "captcha"     => "required|captcha"
        ]);
		
	 	if ($validator->fails()){
            return \Redirect::back()->withErrors($validator)->withInput();
        }

        $attachment = function() use ($request){
            $attach = $request->file('attach'); 
            $size = $attach->getSize();
            if ($size >= 1000000 ) return \Redirect::back()->withErrors('File is too large')->withInput();
            if ($attach) {
                $fileName  = strtoupper(str_random(1)).time() . '.' . $attach->getClientOriginalExtension();
                $destinationPath = public_path('uploads/attachment');
                $attach->move($destinationPath, $fileName);
                return $fileName;
            }else{
                return null;
            }
        };
        $data=$request->except("_token","captcha","submit");
        $detailSeminar = Seminar::find($idSeminar);
        if ($data["idPacks"] == "member") {
        	$idMember = $data["idMember"];
        	/*
            $cek = Registrant::where(["idMember"=>$idMember,"idSeminar"=>$idSeminar])->first();
        	if ($cek)
        		return \Redirect::back()->withErrors('idMember Sudah Terdaftar')->withInput();
        	$cekMember = Member::where(["idMember"=>$idMember])->first();
        	if (!$cekMember) 
        		return \Redirect::back()->withErrors('idMember Tidak ditemukan')->withInput(); 
        	#if ($cekMember->email != $data["email"]) return \Redirect::back()->withErrors('IdMember dan Email tidak match')->withInput(); 
            */

        	$categories = "IIHA Member";
        	$data["idPacks"] = 0;
        	$hargaSeminar =  $detailSeminar->memberPrice;
        }else if ($data["idPacks"] == "0") {
        	$categories = "Reguler";
        	$hargaSeminar =  $detailSeminar->price;
        }else if ($data["idPacks"] == "1" && isset($data["willing"]) && $data["willing"] == 1) {
            $data['becomeMember'] = 1;
            $categories = "Willing to become a Member of IIHA";
            $hargaSeminar =  $detailSeminar->memberPrice;
        }else{
        	$detailPack = Seminarpack::find($data["idPacks"]);
        	$categories = $detailPack->categories;
        	$hargaSeminar = $detailPack->price;
        }
        $data["idSeminar"] = $idSeminar;
        if ($request->file('attach') != "") $data["attachment"] = $attachment();
        $randomDigit = rand(100, 999);
        $random = strtoupper(str_random(1)).$randomDigit;
        $data['noInvoice'] = date("ym")."INVO".date("d").$random;
        $data['InvoiceNumber'] = $data['noInvoice'];
        $data['nominal'] = $hargaSeminar+$randomDigit;
        $data['token'] = md5($data['noInvoice']);
        Registrant::create($data);
        $data["topicPlan"] = isset($data["topicPlan"]) ? $data["topicPlan"] : "-";
		$data['seminar'] = $detailSeminar->title;
        $data['eventDate'] = $detailSeminar->eventDate;
        $data['place'] = $detailSeminar->place;
        $data['eventHours'] = $detailSeminar->eventHours;
        $data['contact'] = $detailSeminar->contact;
        $data['randomDigit'] = $randomDigit;
        $data['categories'] = $categories;
        $data['random'] = $random;
        return KirimEmail::daftarSeminar($data);
	}
}
