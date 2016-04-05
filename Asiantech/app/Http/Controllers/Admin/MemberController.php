<?php

namespace app\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Admin\AppLanguage;
use App\Admin\Team;
use App\Admin\Member;
use App\Admin\MemberDetail;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member = new Member();
        $list_member = $member->paginate(config('custom.default_record_per_page'));

        return view('admin.member.index', compact('list_member'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items_for_question = config('custom.items_for_question');
        $languages = AppLanguage::orderBy('id')->get();
        $teams = Team::lists('team_name', 'id');

        return view('admin.member.create', compact('languages', 'teams', 'items_for_question'));
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
        $member = new Member();
        $member_id = $member->saveData($request);
        if ($member_id) {
            $member_details = new MemberDetail();
            $member_details->saveDetails($member_id, $request);
            if (!$member_details) {
                return redirect()->route('cpanel.member.index')
                                ->with('status', 'fail')
                                ->with('msg', 'Can not save data.');
            } else {
                return redirect()->route('cpanel.member.index')
                                ->with('status', 'success')
                                ->with('msg', 'Successfully !');
            }
        } else {
            return redirect()->route('cpanel.member.index')
                            ->with('status', 'fail')
                            ->with('msg', 'Can not save data.');
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
        $member_id = $request->route('member');
        $info_member = Member::find($member_id);
        $items_for_question = config('custom.items_for_question');
        $languages = AppLanguage::orderBy('id')->get();
        $teams = Team::selectTeam($info_member->team_id);
        $member_details = new MemberDetail();

        return view('admin.member.update', compact('languages', 'teams', 'items_for_question', 'info_member', 'member_id', 'member_details'));
    }

    public function saveUpdate(Request $request)
    {
        $member_id = $request->input('member_id', '');
        $info_member = Member::find($member_id);
        if ($info_member) {
            $member = new Member();
            $member_id = $member->saveData($request, $member_id);
            $member_details = new MemberDetail();
            $member_details->saveUpdate($request);
            if (!$member_details) {
                return redirect()->route('cpanel.member.index')
                                ->with('status', 'fail')
                                ->with('msg', 'Can not save data.');
            } else {
                return redirect()->route('cpanel.member.index')
                                ->with('status', 'success')
                                ->with('msg', 'Successfully !');
            }
        } else {
            return redirect()->route('cpanel.member.index')
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
        $member_id = $request->route('member');
        $member_details = MemberDetail::where('member_id', '=', $member_id)->delete();
        if ($member_details) {
            $affected_row = Member::find($member_id)->delete();
            if (!$affected_row) {
                return redirect()->route('cpanel.member.index')
                                ->with('status', 'fail')
                                ->with('msg', 'Can not delete data.');
            } else {
                return redirect()->route('cpanel.member.index')
                                ->with('status', 'success')
                                ->with('msg', 'Successfully !');
            }
        } else {
            return redirect()->route('cpanel.member.index')
                                ->with('status', 'fail')
                                ->with('msg', 'Can not delete data.');
        }
    }
}
