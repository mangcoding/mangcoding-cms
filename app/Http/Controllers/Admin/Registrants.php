<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Registrant, App\Seminarpack, App\Seminar;
use App\Http\Controllers\EmailController as KirimEmail;

class Registrants extends Controller
{
    public function index(Request $request) {
    	$member = Registrant::select('noInvoice as id','nama','email','phoneNumber','institution','status','attachment')->paginate(10);
		$data['content'] = 'registrant.list';
		$data['posts'] = $member;
        $data['exportExcel'] = url('admin/export-registrant');
		$x = isset($request->page)? $request->page : 1;
		$data['x'] = ($x-1)*10+1;
        return view('admin', $data);
    }

    public function showMember(Request $request, $idSeminar) {
        $member = Registrant::select('noInvoice as id','nama','email','phoneNumber','institution','status')->where(["idSeminar"=>$idSeminar])->paginate(10);
        $data['content'] = 'registrant.list';
        $data['posts'] = $member;
        $data['exportExcel'] = url('admin/export-registrant?idseminar='.$idSeminar);
        $x = isset($request->page)? $request->page : 1;
        $data['x'] = ($x-1)*10+1;
        return view('admin', $data);
    }
    public function approve($noInvoice) {
    	$detail = Registrant::select('*','noInvoice as invoiceNomber')->find($noInvoice);
    	$detailSeminar = Seminar::find($detail->idSeminar);
        if ($detail->idMember != "") {
        	$categories = "Member";
        }else if ($detail->idPacks == "0") {
        	$categories = "Reguler";
        }else if ($detail->idPacks == "1" && $detail->becomeMember == "1") {
            $categories = "Willing to become a Member of IIHA";
        }else{
        	$detailPack = Seminarpack::find($detail->idPacks);
        	$categories = $detailPack->categories;
        }
        $detail->seminar = $detailSeminar->title;
        $detail->categories = $categories;
        $data["post"] = $detail;
        $data["approve"] = true;
    	return view('admin.seminar.info', $data);
    }
    public function resendRegis($noInvoice) {
        $detail = Registrant::select("*","noInvoice as InvoiceNumber")->findOrFail($noInvoice);
        $detailSeminar = Seminar::find($detail->idSeminar);
        if ($detail->idMember != "") {
            $categories = "Member";
            $hargaSeminar =  $detailSeminar->memberPrice;
        }else if ($detail->idPacks == "0") {
            $categories = "Reguler";
        }else if ($detail->idPacks == "1" && $detail->becomeMember == "1") {
            $categories = "Willing to become a Member of IIHA";
        }else{
            $detailPack = Seminarpack::find($detail->idPacks);
            $categories = $detailPack->categories;
        }
        if ($detail->token == "") {
            $detail->token = md5($detail->noInvoice);
            Registrant::where(["noInvoice"=>$request->noInvoice])->update(["token"=>$detail->token]);
        }
        $detail->seminar = $detailSeminar->title;
        $detail->place = $detailSeminar->title;
        $detail->eventDate = $detailSeminar->eventDate;
        $detail->eventHours = $detailSeminar->eventHours;
        $detail->contact = $detailSeminar->contact;
        $detail->categories = $categories;
        return KirimEmail::resendRegis($detail->toArray());
    }
    public function resendApprove($noInvoice) {
        $detail = Registrant::select("*","noInvoice as InvoiceNumber")->findOrFail($noInvoice);
        $detailSeminar = Seminar::find($detail->idSeminar);
        if ($detail->idMember != "") {
            $categories = "Member";
            $hargaSeminar =  $detailSeminar->memberPrice;
        }else if ($detail->idPacks == "0") {
            $categories = "Reguler";
        }else if ($detail->idPacks == "1" && $detail->becomeMember == "1") {
            $categories = "Willing to become a Member of IIHA";
        }else{
            $detailPack = Seminarpack::find($detail->idPacks);
            $categories = $detailPack->categories;
        }
        $detail->seminar = $detailSeminar->title;
        $detail->place = $detailSeminar->place;
        $detail->eventHours = $detailSeminar->eventHours;
        $detail->eventDate = $detailSeminar->eventDate;
        $detail->contact = $detailSeminar->contact;
        $detail->categories = $categories;
        return KirimEmail::approveSeminar($detail);
    }
    public function postApprove(Request $request) {
        Registrant::where(["noInvoice"=>$request->noInvoice])->update(["noPeserta"=>$request->noPeserta, "status"=>"1"]);
        $detail = Registrant::select("*","noInvoice as InvoiceNumber")->findOrFail($request->noInvoice);
        $detailSeminar = Seminar::find($detail->idSeminar);
        if ($detail->idMember != "") {
            $categories = "Member";
            $hargaSeminar =  $detailSeminar->memberPrice;
        }else if ($detail->idPacks == "0") {
            $categories = "Reguler";
        }else if ($detail->idPacks == "1" && $detail->becomeMember == "1") {
            $categories = "Willing to become a Member of IIHA";
        }else{
            $detailPack = Seminarpack::find($detail->idPacks);
            $categories = $detailPack->categories;
        }
        $detail->seminar = $detailSeminar->title;
        $detail->place = $detailSeminar->place;
        $detail->eventHours = $detailSeminar->eventHours;
        $detail->eventDate = $detailSeminar->eventDate;
        $detail->contact = $detailSeminar->contact;
        $detail->categories = $categories;
        return KirimEmail::approveSeminar($detail);
    }
    public function show($noInvoice) {
    	$detail = Registrant::select('*','noInvoice as invoiceNomber')->find($noInvoice);
    	$detailSeminar = Seminar::find($detail->idSeminar);
        if ($detail->idMember != "") {
        	$categories = "Member";
        	$hargaSeminar =  $detailSeminar->memberPrice;
        }else if ($detail->idPacks == "0") {
        	$categories = "Reguler";
        }else if ($detail->idPacks == "1" && $detail->becomeMember == "1") {
            $categories = "Willing to become a Member of IIHA";
        }else{
        	$detailPack = Seminarpack::find($detail->idPacks);
        	$categories = $detailPack->categories;
        }
        $detail->seminar = $detailSeminar->title;
        $detail->categories = $categories;
        $data["post"] = $detail;
    	return view('admin.seminar.info', $data);
    }
}
