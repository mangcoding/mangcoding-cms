<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DownloadController extends Controller
{
    public function getFile($file) {
		return \View::make('theme::login');            
    }

    public function postFile(Request $request, $file) {
    	if ($request->username == "iiha" && $request->password == "seminarsukses2016")
        	return \Response::download("uploads/attachment/".$file);
        else
        	return \Redirect::back()->with('message', 'Login Failed')->withInput($request->all());
    }
}
