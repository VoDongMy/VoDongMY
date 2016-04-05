<?php

namespace app\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Admin\AppLanguage;
use App\Admin\User;
use View;
use App\Admin\Configuration;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        // Show name in cpanel
        $info_user = User::find(Auth::id());
        $list_language = AppLanguage::all();
        View::share('info_user', $info_user);
        View::share('list_language', $list_language);
    }
}
