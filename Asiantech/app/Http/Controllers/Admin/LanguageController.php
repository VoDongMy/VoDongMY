<?php

namespace app\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\User;
use App\Admin\Language;
use App\Admin\AppLanguage;

class LanguageController extends Controller
{
    public function __construct()
    {
        $info_user = User::find(Auth::id());
        view()->share('info_user', $info_user);
        view()->share('type', 'languages');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = AppLanguage::orderBy('language_name')->get();

        return view('admin.languages.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listLang = Language::lists('languages', 'id');

        return view('admin.languages.create', compact('listLang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idLang = $request->input('lang');
        $infoLang = Language::find($idLang);
        $langeName = $infoLang->languages;

        $languages = new AppLanguage();
        $languages->code = $infoLang->code;
        $languages->language_name = $infoLang->languages;
        $languages->is_default = $request->input('is_default', '0');
        $languages->save();

        return redirect()->route('cpanel.languages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $idLang = $request->route('languages');
        $languages = AppLanguage::find($idLang);
        $languages->delete();

        return redirect()->route('cpanel.languages.index');
    }
}
