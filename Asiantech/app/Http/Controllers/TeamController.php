<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Admin\Team;
use App\Admin\Member;
use App;

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
        // Get all team
        $list_teams = Team::get();
        // Get member
        // $list_member = Member::with(MemberDetail)->get();
        $list_member = Member::with(['memberDetails' => function($query){
            $query->where('language_code', '=', App::getLocale());
        }])->get();
        // dd($list_member);
    	return view('team', compact('list_teams', 'list_member', 'team'));
    }
}