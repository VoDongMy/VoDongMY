<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Http\Middleware\LanguageMiddleware;
use App;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Language;

class HomeController extends Controller
{


    public function index(Request $request)
    {
        $language = $request->route('language');
        if(!$language){
            $language = new Language();
            $default_language = $language->getDefaultLanguage();
        }else{
            $default_language = $language;
        }
        return redirect("/$default_language/index");
    }


    public function home()
    {
        $title = 'Home';
        return view('home', compact('title'));
    }
}
