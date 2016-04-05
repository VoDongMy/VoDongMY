<!DOCTYPE html> 
<html lang ="js"> 
	<head> 
    	@include('partials.meta')	
    </head> 
  	<body>
    	@include('partials.header')
  		
  		@yield('content')

        @include('partials.footer')

  		

        <script type="text/javascript" src="{{ asset('assets/js/libs.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/wall/main.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>

        <!-- Util script -->
        <script type="text/javascript" src="{{ asset('assets/js/wall/util/date.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/wall/util/dispatcher.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/wall/util/fetch.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/wall/util/filter.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/wall/util/string.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/wall/util/url.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/wall/util/userAgent.js') }}"></script>

        <!-- Widget script -->
        <script type="text/javascript" src="{{ asset('assets/js/wall/widget/dropdown.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/wall/widget/header.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/wall/widget/lazyRender.js') }}"></script>

        <script type="text/javascript" src="{{ asset('assets/js/wall/page/all.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/wall/page/contact.js') }}"></script>

        @yield('script')

        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

        <script type="text/javascript" src="{{ asset('assets/js/wall/page/outline.js') }}"></script>

  	</body> 
</html>
