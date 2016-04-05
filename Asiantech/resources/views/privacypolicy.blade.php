@extends('layouts.master')
@section('title') Privacy policy :: @parent @stop
@section('content')
<main class="page_privacy">
    <div class="headline x_scrollFadeIn">
        <p class="text">{{ trans('privacypolicy.privacy_policy') }}</p>
    </div>
    <div class="privacy_content x_scrollFadeIn">
        @if($policy)
        @foreach($policy->pageDetails as $info_page)
            {!! $info_page->page_contents !!}
        @endforeach
        @endif
    </div>
</main>
@stop