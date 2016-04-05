<?php

namespace app\Http\Controllers\Admin;

use App\User;
use App\Admin\StaticPage;
use App\Admin\Service;
use App\Admin\Contact;
use App\Admin\Member;
use App\Admin\Module;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Router;

class DashboardController extends Controller
{
    public function index(Router $router)
    {
        // $routeCollection = $router->getRoutes();

        // foreach ($routeCollection as $value) {
        //     echo $value->getPath().'<br>';
        // }
        // dd();

        dd(Module::select(['name','route_key'])->get()->toArray());
        $title = 'Dashboard';
        $users = User::count();
        $static_page = StaticPage::count();
        $services = Service::count();
        $members = Member::count();
        $contacts = Contact::count();

        return view('admin.dashboard.index', compact('title', 'users', 'static_page', 'services', 'members', 'contacts'));
    }
}
