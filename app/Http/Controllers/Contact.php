<?php	
namespace App\Http\Controllers;

use	App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\EmailController as KirimEmail;
use Illuminate\Support\Facades\Auth;
use View;

class Contact extends Controller	{
	public function index() {
		return View::make('theme::contact-page');
	}

	public function store() {
		return View::make('theme::contact-page');
	}
}