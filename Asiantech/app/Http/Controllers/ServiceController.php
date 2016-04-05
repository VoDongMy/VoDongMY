<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use App\Admin\Service;
use App\Admin\ServiceDetail;
use Datatables;
use DB;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	// Get service for Web & Smartphone
    	$web_smartphone = Service::with(['serviceDetails' => function($query){
            $query->where('language_code', '=', App::getLocale());
        }])->where("properties", "=", "1")->get();
        // Get service for Applications
    	$applications = Service::with(['serviceDetails' => function($query){
            $query->where('language_code', '=', App::getLocale());
        }])->where("properties", "=", "2")->get();
        // Get service for Enterprise Services
    	$enterprise_service = Service::with(['serviceDetails' => function($query){
            $query->where('language_code', '=', App::getLocale());
        }])->where("properties", "=", "3")->get();
        // Get service for Internal Services
    	$internal_service = Service::with(['serviceDetails' => function($query){
            $query->where('language_code', '=', App::getLocale());
        }])->where("properties", "=", "4")->get();
        $service = new Service();
        return view('service', compact('web_smartphone', 'applications', 'enterprise_service', 'internal_service', 'service'));
    }

    public function detail(Request $request){
    	$slug = $request->route('slug');
    	$array_slug = explode('-', $slug);
    	$count_array = count($array_slug);
    	$service_id = $array_slug[$count_array - 1];
    	// Get info service
    	$info_service = Service::with(['serviceDetails' => function($query){
            $query->where('language_code', '=', App::getLocale());
        }])->find($service_id);
        $service = new Service();
        return view('service_subpage', compact('info_service','service'));
    }
}
