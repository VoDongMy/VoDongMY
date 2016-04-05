<?php

namespace app\Http\Controllers;

use App\Admin\StaticPage;
use App;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $policy = StaticPage::with(['pageDetails' => function ($query) {
            $query->where('language_code', '=', App::getLocale());
        }])->where('properties', '=', 1)->firstOrFail();

        return view('privacypolicy', compact('policy'));
    }
}
