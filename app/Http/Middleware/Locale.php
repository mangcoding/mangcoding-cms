<?php 

namespace App\Http\Middleware;

use Closure;
use Session;
use App, App\Page, App\Translate;
use Config;
use Illuminate\Http\Request;

class Locale {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $language = Session::get('locale', Config::get('app.locale'));
        App::setLocale($language);
        return $next($request);
    }

}