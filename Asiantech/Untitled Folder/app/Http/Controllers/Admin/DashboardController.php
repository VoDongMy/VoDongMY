<?php

namespace app\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Router;

class DashboardController extends Controller
{
    public function index(Router $router)
    {
        $title = 'Dashboard';
        $users = User::count();
        
        return view('admin.dashboard.index', compact('title', 'users', 'static_page', 'services', 'members', 'contacts'));
    }
}
