<?php

namespace app\Http\Controllers;

use App\Admin\StaticPage;
use App\Admin\Timeline;
use App;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get history
        $list_histories = Timeline::with(['timelineDetails' => function ($query) {
            $query->where('language_code', '=', App::getLocale());
        }])->orderBy('order', 'asc')->get();
        $about_service = StaticPage::with(['pageDetails' => function ($query) {
            $query->where('language_code', '=', App::getLocale());
        }])->where('properties', '=', 7)->firstOrFail();
        $why_vietnam = StaticPage::with(['pageDetails' => function ($query) {
            $query->where('language_code', '=', App::getLocale());
        }])->where('properties', '=', 8)->firstOrFail();
        $message_ceo = StaticPage::with(['pageDetails' => function ($query) {
            $query->where('language_code', '=', App::getLocale());
        }])->where('properties', '=', 9)->firstOrFail();

        return view('about', compact('list_histories', 'about_service', 'why_vietnam', 'message_ceo'));
    }
}
