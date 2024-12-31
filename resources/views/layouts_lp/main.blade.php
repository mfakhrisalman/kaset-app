<!DOCTYPE HTML>
<html>
    @include('partials_lp.head')

	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">

	@include('partials_lp.navigation')
	
	@yield('container')

    @include('partials_lp.footer')

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

    @include('partials_lp.javascript')
	
	</body>
</html>

