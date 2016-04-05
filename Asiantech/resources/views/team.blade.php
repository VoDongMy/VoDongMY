@extends('layouts.master')
@section('title') Team - Interview  :: @parent @stop
@section('content')
<div class="main">
    <div class="page_team" id="teams">
        <section class="term">
            <div class="headline x_scrollFadeIn">
                <span class="text">{{ trans('team.team') }}</span>
            </div>
            <div class="content">
                @if($list_teams)
                <ul class="team_list">
                    @foreach($list_teams as $info_team)
                    <?php
                    $team_image = $info_team->images;
                    $array_image = explode(',', $team_image);
                    $image = $array_image[0] ? $array_image[0] : $array_image[1];
                    ?>
                    <li class="team_item x_scrollFadeIn">
                        <div class="box">
                            <img src="{{ config('custom.path_view_team').$image }}" class="team_image box1" alt="{{ $info_team->team_name}}" width="480px" height="260px">
                        </div>
                        <div class="above">
                            <p class="team_name">{{ $info_team->team_name}}</p>
                            <p class="team_description">{{ $info_team->description}} </p>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </section>
        @if($list_member)
        <section class="interview" id="interview">
            <div class="headline x_scrollFadeIn">
                <span class="text">{{ trans('team.interview') }}</span>
            </div>
            <div class="content x_scrollFadeIn">
                <ul class="member_list">
                @foreach($list_member as $info_member)
                    <?php
                        $team_id = $info_member->team;
                        $info_team = $team->find($team_id);
                        $member_details = $info_member->memberDetails;
                    ?>
                    <li class="member_item x_pulldown">
                        <div class="member_detail">
                            <div class="member_image x_pulldown_trigger">
                                <div class="front_image">
                                    <div class="box">
                                        <img src="{{ config('custom.path_view_member').$info_member->avatar }}" class="box1" width="166px" height="auto">
                                    </div>
                                </div>
                                <div class="embay_border line_inner">
                                    <div class="line_top"></div>
                                    <div class="line_bottom"></div>
                                    <div class="line_right"></div>
                                    <div class="line_left"></div>
                                </div>
                            </div>
                            <p class="member_name">{{ $info_member->fullname }}</p>
                            <p class="member_team">@if($info_team){{ $info_team->team_name }} @endif</p>
                        </div>
                        @if($member_details)
                        <div class="interview_detail x_pulldown_target">
                            <ul class="interview_list">
                                <?php
                                    $i = 1;
                                ?>
                                @foreach($member_details as $info_question)
                                <?php
                                    $question = $info_question->question;
                                    $answer = $info_question->answer;
                                ?>
                                @if($question)
                                <li class="interview_item">
                                    <hr class="horizontal_rule">
                                    <div class="mrb mlb">
                                        <p class="interview_question">
                                            <span class="logo">Q{{ $i }}</span>
                                            <span class="text">{{ $question }}</span>
                                        </p>
                                        <p class="interview_answer">
                                            <span class="logo">A{{ $i }}</span>
                                            <span class="text">{{ $answer }}</span>
                                        </p>
                                    </div>
                                </li>
                                <?php
                                    ++$i;
                                ?>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </li>
                @endforeach
                </ul>
            </div>
        </section>
        @endif
    </div>
</div>
@stop
