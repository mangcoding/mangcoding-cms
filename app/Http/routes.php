<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => ['web','locale']], function () {

    Route::group(['middleware' => ['auth']], function () {
        Route::resource('/admin/categories', 'Admin\Categories');
        Route::post('/admin/categories/{id}','Admin\Categories@update');
        Route::get('/admin/categories/delete/{id}','Admin\Categories@destroy');

        Route::resource('/admin/pages', 'Admin\Pages');
        Route::post('/admin/pages/{id}','Admin\Pages@update');
        Route::get('/admin/pages/delete/{id}','Admin\Pages@destroy');

        Route::resource('/admin/news', 'Admin\Pages');
        Route::post('/admin/news/{id}','Admin\Pages@update');
        Route::get('/admin/news/delete/{id}','Admin\Pages@destroy');

        Route::resource('/admin/events', 'Admin\Pages');
        Route::post('/admin/events/{id}','Admin\Pages@update');
        Route::get('/admin/events/delete/{id}','Admin\Pages@destroy');

        Route::resource('/admin/link', 'Admin\Pages');
        Route::post('/admin/link/{id}','Admin\Pages@update');
        Route::get('/admin/link/delete/{id}','Admin\Pages@destroy');

        Route::resource('/admin/issues', 'Admin\Pages');
        Route::post('/admin/issues/{id}','Admin\Pages@update');
        Route::get('/admin/issues/delete/{id}','Admin\Pages@destroy');

        Route::resource('/admin/widget', 'Admin\Widgets');
        Route::post('/admin/widget/{id}','Admin\Widgets@update');

        Route::resource('/admin/banner', 'Admin\Banners');
        Route::post('/admin/banner/{id}','Admin\Banners@update');
        Route::get('/admin/banner/delete/{id}','Admin\Banners@destroy');

        Route::resource('/admin/settings', 'Admin\Settings',['only' => ['index','edit','update']]);
        Route::post('/admin/settings/{id}','Admin\Settings@update');
        
        Route::resource('/admin/member', 'Admin\Members',['only' => ['index','edit','update','show']]);
        Route::post('/admin/member/{id}','Admin\Members@update');
        Route::get('/admin/member/delete/{id}','Admin\Members@destroy');
        
        Route::resource('/admin/seminar', 'Admin\Seminars');
        Route::post('/admin/seminar/{id}','Admin\Seminars@update');
        Route::get('/admin/seminar/delete/{id}','Admin\Seminars@destroy');
        Route::get('/admin/seminar/delcat/{id}','Admin\Seminars@delete_cat');

        Route::resource('/admin/bank', 'Admin\Banks');
        Route::post('/admin/bank/{id}','Admin\Banks@update');
        Route::get('/admin/bank/delete/{id}','Admin\Banks@destroy');

        Route::get('/admin/seminar/member/{id}','Admin\Registrants@showMember');
        Route::get('/admin/registrant','Admin\Registrants@index');
        Route::get('/admin/registrant/{id}/detail','Admin\Registrants@show');
        Route::get('/admin/registrant/{id}/approve','Admin\Registrants@approve');
        Route::get('/admin/remail/{id}','Admin\Registrants@resendRegis');
        Route::get('/admin/rekonfirm/{id}','Admin\Registrants@resendApprove');
        Route::post('/admin/registrant/approve','Admin\Registrants@postApprove');

        Route::resource('/admin/slider', 'Admin\Sliders');
        Route::post('/admin/slider/{id}','Admin\Sliders@update');
        Route::get('/admin/slider/delete/{id}','Admin\Sliders@destroy');

        Route::get('/admin/export','Admin\Export@Member');
        Route::get('/admin/export-registrant','Admin\Export@Registrant');

        Route::controller('/admin', 'Admin\AdminController');
    });

    Route::get('/administrator', 'Auth\AuthController@getLogin');
    Route::post('/administrator', 'Auth\AuthController@postLogin');
    Route::get('/logout', 'Auth\AuthController@getLogout');
    
    Route::get('/', 'DefaultController@homepage');
    Route::get('/home', 'DefaultController@homepage');
    Route::get('language/{lang}', function (Request $request, $lang) {
	    if ($lang == "en") {
	    	App::setLocale('en');
	    	Session::put('locale', 'en');
	    }
	    else {
	    	App::setLocale('id');
	    	Session::put('locale', 'id');
	    } 
        $routes = array('register','pendaftaran','news','berita','current-issues','isu-terkini','events','agenda');
        $href =  str_replace(url('/').'/','',app('Illuminate\Routing\UrlGenerator')->previous());
        $detail = app('App\Translate')->select("idPages","language")->where("href","=",$href)->first();
        if ($href != null && $href != "#") {
            if (!in_array($href, $routes) && $detail != null ) {
                $id = $detail->idPages;
                $nextHref = app('App\Page')->setLang($lang)->getHrefByID($id);
                return redirect($nextHref);
            }
            else if ($href == "pendaftaran" || $href == "register") { 
            	if ($lang == "en") return redirect("register");
            	else return redirect("pendaftaran");
            }
            else if ($href == "berita" || $href == "news") { 
                if ($lang == "en") return redirect("news");
                else return redirect("berita");
            }else if ($href == "isu-terkini" || $href == "current-issues") { 
                if ($lang == "en") return redirect("current-issues");
                else return redirect("isu-terkini");
            }else if ($href == "agenda" || $href == "events") { 
                if ($lang == "en") return redirect("agenda");
                else return redirect("events");
            }else return Redirect::back();
        }else return Redirect::back();
	});
	$contact = str_slug(trans('routes.contactUs'));
	Route::resource('/contact-us','Contact', ['only' => ['index', 'store']]);
	Route::resource('/hubungi-iiha','Contact', ['only' => ['index', 'store']]);
	Route::resource('/pendaftaran','Register', ['only' => ['index', 'store']]);
	Route::resource('/register','Register', ['only' => ['index', 'store']]);
    Route::resource('/news','News', ['only' => ['index', 'show']]);
    Route::resource('/berita','News', ['only' => ['index', 'show']]);
    Route::resource('/current-issues','Issues', ['only' => ['index', 'show']]);
    Route::resource('/isu-terkini','Issues', ['only' => ['index', 'show']]);
    Route::resource('/events','Events', ['only' => ['index', 'show']]);
    Route::resource('/agenda','Events', ['only' => ['index', 'show']]);
    
    Route::get('/seminar','Seminars@index');
    Route::get('/seminar/{id}','Seminars@show');
    Route::post('/seminar/{id}','Seminars@daftar');

    Route::get('/confirmation/','Seminars@confirmation');
    Route::get('/confirmation/{token}','Seminars@confirmWithtoken');
    Route::post('/confirmation','Seminars@postConfirm');
    Route::get('/result', 'DefaultController@result');
	Route::get('/{href}', 'DefaultController@page');
    Route::get('/download/{file}','DownloadController@getFile');
    Route::post('/download/{file}','DownloadController@postFile');
});

Route::get('/api/city', function() {
    $id = Input::get('option');
    $city = App\City::where('provinsiId', '=', $id)->lists('kabupatenNama', 'kabupatenId')->toArray();
    $city[""] = "--------Select City----------";
    ksort($city);
    return Response::make($city);
});
Route::get('/api/regency', function() {
    $id = Input::get('option');
    $city = App\Regency::where('kabupatenId', '=', $id)->lists('kecamatanNama', 'kecamatanId')->toArray();
    $city[""] = "--------Select Regency--------";
    ksort($city);
    return Response::make($city);
});
Route::get('/api/district', function() {
    $id = Input::get('option');
    $city = App\District::where('kecamatanId', '=', $id)->lists('desaNama', 'desaId')->toArray();
    $city[""] = "--------Select District--------";
    ksort($city);
    return Response::make($city);
});
Route::get('/api/pos', function() {
    $id = Input::get('option');
    $pos = App\District::find($id)->first();
    return Response::make($pos);
});
