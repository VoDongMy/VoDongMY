<?php

namespace app\Http\Controllers;

use App;
use App\Admin\StaticPage;

class OffShoreDevController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get static page
        $offshore_dev = StaticPage::with(['pageDetails' => function ($query) {
            $query->where('language_code', '=', App::getLocale());
        }])->where('properties', '=', 3)->firstOrFail();
        $laboratory = StaticPage::with(['pageDetails' => function ($query) {
            $query->where('language_code', '=', App::getLocale());
        }])->where('properties', '=', 4)->firstOrFail();
        $package = StaticPage::with(['pageDetails' => function ($query) {
            $query->where('language_code', '=', App::getLocale());
        }])->where('properties', '=', 5)->firstOrFail();

        return view('offshore-development', compact('offshore_dev', 'laboratory', 'package'));
    }
}
