<?php

namespace app\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use App;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        // return Response::view('errors.missing', array(), 404);
        // $route = $request->route('language');
        $request_uri = $request->server->get('REQUEST_URI');
        $current_language = App::getLocale();
        $active_language = '';
        if ($request_uri) {
            $array_request_uri = explode('/', $request_uri);
            if (count($array_request_uri) >= 2) {
                $active_language = $array_request_uri[1];
                if (!$active_language) {
                    $active_language = $current_language;
                }
            }
        }
        $array_language = ['en','jp','vi','cpanel','auth'];
        if (!in_array($active_language, $array_language)) {
            return redirect('/en/404');
        }
        App::setLocale($active_language);

        return $next($request);
    }
}
