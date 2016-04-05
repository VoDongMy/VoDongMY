<?php

namespace app\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\AppLanguage;
use App\Admin\Timeline;
use App\Admin\TimelineDetail;

class TimelineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $app_language = new AppLanguage();
        $list_timeline = Timeline::with(['timelineDetails' => function ($query) {
            $query->where('language_code', '=', AppLanguage::getDefaultLanguage());
        }])->orderBy('order')->get();

        return view('admin.timeline.index', compact('list_timeline', 'app_language'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = AppLanguage::orderBy('id')->get();

        return view('admin.timeline.create', compact('languages'));
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
        $timeline = new Timeline();
        $timeline_id = $timeline->saveData($request);
        if ($timeline_id) {
            $timeline_details = new TimelineDetail();
            $timeline_details->saveData($timeline_id, $request);
            if (!$timeline_details) {
                return redirect()->route('cpanel.timeline.index')
                                ->with('status', 'fail')
                                ->with('msg', 'Can not save data.');
            } else {
                return redirect()->route('cpanel.timeline.index')
                                ->with('status', 'success')
                                ->with('msg', 'Successfully !');
            }
        } else {
            return redirect()->route('cpanel.timeline.index')
                                ->with('status', 'fail')
                                ->with('msg', 'Can not save data.');
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
        $timeline_id = $request->route('timeline');
        $affected_row = TimelineDetail::where('timeline_id', '=', $timeline_id)->delete();
        if ($affected_row) {
            $affected_row = Timeline::find($timeline_id)->delete();
            if (!$affected_row) {
                return redirect()->route('cpanel.timeline.index')
                                ->with('status', 'fail')
                                ->with('msg', 'Can not delete data.');
            } else {
                return redirect()->route('cpanel.timeline.index')
                                ->with('status', 'success')
                                ->with('msg', 'Successfully !');
            }
        } else {
            return redirect()->route('cpanel.timeline.index')
                            ->with('status', 'fail')
                            ->with('msg', 'Can not delete data.');
        }
    }

    public function updateOrder(Request $request)
    {
        $timeline = new Timeline();
        $results = $timeline->updateOrder($request);
        if (!$results) {
            return redirect()->route('cpanel.timeline.index')
                                ->with('status', 'fail')
                                ->with('msg', 'Can not update order.');
        } else {
            return redirect()->route('cpanel.timeline.index')
                        ->with('status', 'success')
                        ->with('msg', 'Successfully !');
        }
    }
}
