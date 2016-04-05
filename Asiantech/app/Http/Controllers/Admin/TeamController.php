<?php

namespace app\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Team;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = new Team();
        $list_teams = Team::paginate(config('custom.default_record_per_page'));

        return view('admin.team.index', compact('list_teams', 'team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.create');
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
        $team = new Team();
        $affected_row = $team->saveData($request);
        if (!$affected_row) {
            return redirect()->route('cpanel.team.index')
                            ->with('status', 'fail')
                            ->with('msg', 'Can not delete data.');
        } else {
            return redirect()->route('cpanel.team.index')
                        ->with('status', 'success')
                        ->with('msg', 'Successfully !');
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
    public function update(Request $request, $id)
    {
        $team = new Team();
        $team_id = $request->route('team');
        $info_team = Team::find($team_id);
        $feauture_image = $team->getListImage($team_id);

        return view('admin.team.update', compact('info_team', 'feauture_image'));
    }

    public function saveUpdate(Request $request)
    {
        $team_id = $request->input('team_id');
        $team = new Team();
        $affected_row = $team->saveData($request, $team_id);
        if (!$affected_row) {
            return redirect()->route('cpanel.team.index')
                            ->with('status', 'fail')
                            ->with('msg', 'Can not update data.');
        } else {
            return redirect()->route('cpanel.team.index')
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
        $team_id = $request->route('team');
        $affected_row = Team::find($team_id)->delete();
        if (!$affected_row) {
            return redirect()->route('cpanel.team.index')
                            ->with('status', 'fail')
                            ->with('msg', 'Can not delete data.');
        } else {
            return redirect()->route('cpanel.team.index')
                        ->with('status', 'success')
                        ->with('msg', 'Successfully !');
        }
    }
}
