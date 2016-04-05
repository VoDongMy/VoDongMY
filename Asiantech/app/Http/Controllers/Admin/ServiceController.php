<?php

namespace app\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Admin\AppLanguage;
use App\Admin\Service;
use App\Admin\ServiceDetail;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $app_language = new AppLanguage();
        $list_services = Service::with(['serviceDetails' => function ($query) {
            $query->where('language_code', '=', AppLanguage::getDefaultLanguage());
        }])->paginate(config('custom.default_record_per_page'));

        return view('admin.services.index', compact('list_services', 'app_language'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = AppLanguage::orderBy('id')->get();

        return view('admin.services.create', compact('languages'));
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
        $services = new Service();
        $service_id = $services->saveData($request);
        if ($service_id) {
            $service_details = new ServiceDetail();
            $results = $service_details->saveDetails($service_id, $request);
            if (!$results) {
                return redirect()->route('cpanel.service.index')
                                    ->with('status', 'fail')
                                    ->with('msg', 'Can not save data.');
            } else {
                return redirect()->route('cpanel.service.index')
                                ->with('status', 'success')
                                ->with('msg', 'Successfully !');
            }
        } else {
            return redirect()->route('cpanel.service.index')
                                ->with('status', 'fail')
                                ->with('msg', 'Can not save data.');
        }
    }

    /**
     * Disable the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function disable(Request $request)
    {
        $service_id = $request->route('service');
        $affected_row = Service::where('id', $service_id)
            ->update(['is_active' => 0]);
        if (!$affected_row) {
            return redirect()->route('cpanel.service.index')
                            ->with('status', 'fail')
                            ->with('msg', 'Can not disable service.');
        } else {
            return redirect()->route('cpanel.service.index')
                            ->with('status', 'success')
                            ->with('msg', 'Successfully !');
        }
    }

    /**
     * Active the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function active(Request $request)
    {
        $service_id = $request->route('service');
        $affected_row = Service::where('id', $service_id)
            ->update(['is_active' => 1]);
        if (!$affected_row) {
            return redirect()->route('cpanel.service.index')
                            ->with('status', 'fail')
                            ->with('msg', 'Can not active service.');
        } else {
            return redirect()->route('cpanel.service.index')
                                ->with('status', 'success')
                                ->with('msg', 'Successfully !');
        }
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
        $service_id = $request->route('service');
        $affected_row = ServiceDetail::where('service_id', '=', $service_id)->delete();
        if (!$affected_row) {
            return redirect()->route('cpanel.service.index')
                            ->with('status', 'fail')
                            ->with('msg', 'Can not delete data.');
        } else {
            $affected_row = Service::find($service_id)->delete();
            if (!$affected_row) {
                return redirect()->route('cpanel.service.index')
                                ->with('status', 'fail')
                                ->with('msg', 'Can not delete data.');
            } else {
                return redirect()->route('cpanel.service.index')
                                ->with('status', 'success')
                                ->with('msg', 'Successfully !');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $service_details = new ServiceDetail();
        $service = new Service();
        $service_id = $request->route('service');
        $info_Service = Service::find($service_id);
        $feauture_image = $service->getListImage($service_id, 'feauture_image');
        $gallery = $service->getListImage($service_id, 'gallery');
        $languages = AppLanguage::orderBy('id')->get();

        return view('admin.services.update', compact('languages', 'info_Service', 'service_id', 'service_details', 'feauture_image', 'gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function saveUpdate(Request $request)
    {
        $service_id = $request->input('service_id');
        if ($service_id) {
            $services = new Service();
            $affected_row = $services->saveData($request, $service_id);
            if ($affected_row) {
                $service_details = new ServiceDetail();
                $affected_row = $service_details->saveDetails($service_id, $request);
                if (!$affected_row) {
                    return redirect()->route('cpanel.service.index')
                                    ->with('status', 'fail')
                                    ->with('msg', 'Can not save data.');
                } else {
                    return redirect()->route('cpanel.service.index')
                        ->with('status', 'success')
                        ->with('msg', 'Successfully !');
                }
            } else {
                return redirect()->route('cpanel.service.index')
                                    ->with('status', 'fail')
                                    ->with('msg', 'Can not save data.');
            }
        } else {
            return redirect()->route('cpanel.service.index')
                                    ->with('status', 'fail')
                                    ->with('msg', 'Service is not avalable.');
        }
    }
}
