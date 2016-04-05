@extends('layouts.master')
@section('content')
    <main>
      <div class="page_404">
        <div class="logo"><img src="{{ asset('assets/images/thumbs/logo_404.png') }}"></div>
        <h1 class="error">404</h1>
        <div class="error_text">File Not found</div>
        <div class="back">
          <div class="back"><a href="/"><button class="back_btn">BACK TO TOP</button></a></div>
        </div>
      </div>
</main>
@stop
