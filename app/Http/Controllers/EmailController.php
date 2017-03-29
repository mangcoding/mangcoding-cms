<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Setting, App\BusinessField as Business;
use Mail, View;
use App\Konfirmasi, App\Company;

class EmailController extends Controller
{
    public static function daftarSeminar($data) {
        $data["title"] = "INVOICE PENDAFTARAN SEMINAR";
        $data["rekening"] = app('bankAccount');
        $data["kontak"] = isset($data["contact"]) ? $data["contact"] : app('contactName')." ".app('contact');
        $data["linkConfirm"] = url('confirmation/'.$data["token"]);
        $data["altLink"] = url('confirmation');
        $data["linkCancel"] = url('cancel/'.$data["token"]);
        return View::make('theme::emails.registrasi', $data); exit;
        Mail::send('theme::emails.registrasi', $data, function ($m) use ($data) {
            $m->from(env('MAIL_USERNAME', 'info@iiha.id'), env('MAIL_NAME', 'IIHA Admin'));
            $m->to($data['email'], $data['nama'])->subject($data["title"] );
        });

        return \Redirect::back()->with('msg', 'Registration Success. Please Check Your Email');
    }

    public static function resendRegis(array $data) {
        $data["title"] = "INVOICE PENDAFTARAN SEMINAR";
        $data["rekening"] = app('bankAccount');
        $data["kontak"] = isset($data["contact"]) ? $data["contact"] : app('contactName')." ".app('contact');
        $data["linkConfirm"] = url('confirmation/'.$data["token"]);
        $data["altLink"] = url('confirmation');
        $data["linkCancel"] = url('cancel/'.$data["token"]);
        return View::make('theme::emails.registrasi', $data); exit;
        Mail::send('theme::emails.registrasi', $data, function ($m) use ($data) {
            $m->from(env('MAIL_USERNAME', 'info@iiha.id'), env('MAIL_NAME', 'IIHA Admin'));
            $m->to($data['email'], $data['nama'])->subject($data["title"] );
        });

        return \Redirect::back()->with('message', 'Email Registrasi berhasil dikirim ulang');
    }

    public static function approveSeminar($informasi) {
        $data["informasi"] = $informasi;
        $data["title"] = "KONFIRMASI PENDAFTARAN SEMINAR";
        $data["kontak"] = isset($informasi->contact) ? $informasi->contact : app('contactName')." ".app('contact');
        return View::make('theme::emails.approved', $data); exit;
        Mail::send('theme::emails.approved', $data, function ($m) use ($data,$informasi) {
            $m->from(env('MAIL_USERNAME', 'info@iiha.id'), env('MAIL_NAME', 'IIHA Admin'));
            $m->to($informasi->email, $informasi->nama)->subject($data["title"] );
        });

        return \Redirect::back()->with('message', 'Peserta berhasil di konfirmasi. Email sudah dikirim ke peserta');
    }
}
