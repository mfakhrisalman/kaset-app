@extends('layouts_lp.main')

@section('container')
	<aside id="fh5co-hero" class="js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">
		   	<li style="background-image: url({{ asset('assets_lp/images/img_bg_1.jpg') }});">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					{{-- <div class="desc">
		   						<span class="price">$800</span>
		   						<h2>Alato Cabinet</h2>
		   						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.</p>
			   					<p><a href="single.html" class="btn btn-primary btn-outline btn-lg">Purchase Now</a></p>
		   					</div> --}}
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url({{ asset('assets_lp/images/img_bg_2.jpg') }});">
		   		<div class="container">
		   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					{{-- <div class="desc">
		   						<span class="price">$530</span>
		   						<h2>The Haluz Rocking Chair</h2>
		   						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.</p>
			   					<p><a href="single.html" class="btn btn-primary btn-outline btn-lg">Purchase Now</a></p>
		   					</div> --}}
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url({{ asset('assets_lp/images/img_bg_3.jpg') }});">
		   		<div class="container">
		   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					{{-- <div class="desc">
		   						<span class="price">$750</span>
		   						<h2>Alato Cabinet</h2>
		   						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.</p>
			   					<p><a href="single.html" class="btn btn-primary btn-outline btn-lg">Purchase Now</a></p>
		   					</div> --}}
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url({{ asset('assets_lp/images/img_bg_4.jpg') }});">
		   		<div class="container">
		   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					{{-- <div class="desc">
		   						<span class="price">$540</span>
		   						<h2>The WW Chair</h2>
		   						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.</p>
			   					<p><a href="single.html" class="btn btn-primary btn-outline btn-lg">Purchase Now</a></p>
		   					</div> --}}
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside>

	<div id="fh5co-services" class="fh5co-bg-section">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="80" height="80" viewBox="0 0 48 48">
								<path fill="#1565c0" d="M2 30H0v-4c0-1.654 1.346-3 3-3h9.5c.827 0 1.5-.673 1.5-1.5S13.327 20 12.5 20H0v-2h12.5c1.93 0 3.5 1.57 3.5 3.5S14.43 25 12.5 25H3c-.551 0-1 .448-1 1V30zM46.942 24C47.593 23.364 48 22.48 48 21.5c0-1.93-1.57-3.5-3.5-3.5H34v2h10.5c.827 0 1.5.673 1.5 1.5S45.327 23 44.5 23H34v2h10.5c.827 0 1.5.673 1.5 1.5S45.327 28 44.5 28H34v2h10.5c1.93 0 3.5-1.57 3.5-3.5C48 25.52 47.593 24.636 46.942 24zM21 30h-7v-2h7c.551 0 1-.448 1-1v-6c0-1.654 1.346-3 3-3h7v2h-7c-.551 0-1 .448-1 1v6C24 28.654 22.654 30 21 30z"></path>
								</svg>
						</span>
						<h3>Game PS 3</h3>
						<p><a href="/product" class="btn btn-primary btn-outline">Lihat</a></p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="80" height="80" viewBox="0 0 50 50">
								<path d="M 1 19 A 1.0001 1.0001 0 1 0 1 21 L 12.5 21 C 13.340812 21 14 21.659188 14 22.5 C 14 23.340812 13.340812 24 12.5 24 L 3 24 C 1.3550302 24 0 25.35503 0 27 L 0 30 A 1.0001 1.0001 0 1 0 2 30 L 2 27 C 2 26.43497 2.4349698 26 3 26 L 12.5 26 C 14.28508 26 15.719786 24.619005 15.921875 22.884766 A 1.0001 1.0001 0 0 0 16 22.5 C 16 20.578812 14.421188 19 12.5 19 L 1 19 z M 26 19 C 24.35503 19 23 20.35503 23 22 L 23 28 C 23 28.56503 22.56503 29 22 29 L 16 29 A 1.0001 1.0001 0 1 0 16 31 L 22 31 C 23.64497 31 25 29.64497 25 28 L 25 22 C 25 21.43497 25.43497 21 26 21 L 32 21 A 1.0001 1.0001 0 1 0 32 19 L 26 19 z M 46.970703 19 A 1.0001 1.0001 0 0 0 46.503906 19.130859 L 32.503906 27.130859 A 1.0001 1.0001 0 0 0 33 29 L 46 29 L 46 30 A 1.0001 1.0001 0 1 0 48 30 L 48 29 L 49 29 A 1.0001 1.0001 0 1 0 49 27 L 48 27 L 48 20 A 1.0001 1.0001 0 0 0 46.970703 19 z M 46 21.724609 L 46 27 L 36.767578 27 L 46 21.724609 z"></path>
								</svg>
						</span>
						<h3>Game PS 4</h3>
						<p><a href="/product" class="btn btn-primary btn-outline">Lihat</a></p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon" >
							<svg fill="#000000" height="70px" width="70px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 59 59" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M44.246,27.028H31v-11.5c0-1.93,1.57-3.5,3.5-3.5s3.5,1.57,3.5,3.5v3.5c0,2.757,2.243,5,5,5s5-2.243,5-5v-16 c0-0.553-0.448-1-1-1s-1,0.447-1,1v16c0,1.654-1.346,3-3,3s-3-1.346-3-3v-3.5c0-3.032-2.467-5.5-5.5-5.5s-5.5,2.468-5.5,5.5v11.5 H14.972C6.716,27.028,0,33.743,0,42c0,7.149,5.209,14.872,12.963,14.972c0.069,0.001,0.14,0.001,0.213,0.001 c2.072,0,5.679-0.354,9.378-1.367c4.359-1.194,9.764-1.195,14.107-0.001c3.952,1.087,8.169,1.381,9.596,1.367l0,0 C52.386,56.867,59,51.112,59,42C59,33.743,52.381,27.028,44.246,27.028z M46.225,54.971c-1.278,0.021-5.327-0.276-9.033-1.295 c-4.669-1.285-10.481-1.284-15.166-0.001c-3.629,0.994-7.12,1.317-9.038,1.296C7.682,54.903,2,49.674,2,42 c0-7.152,5.819-12.972,12.972-12.972h29.274C51.278,29.028,57,34.847,57,42C57,48.174,52.67,54.861,46.225,54.971z"></path> <path d="M33.631,32.028c0-0.553-0.448-1-1-1H28c-0.552,0-1,0.447-1,1c0,0.553,0.448,1,1,1h4.631 C33.184,33.028,33.631,32.581,33.631,32.028z"></path> <path d="M37,38.028c-2.206,0-4,1.794-4,4s1.794,4,4,4s4-1.794,4-4S39.206,38.028,37,38.028z M37,44.028c-1.103,0-2-0.897-2-2 s0.897-2,2-2s2,0.897,2,2S38.103,44.028,37,44.028z"></path> <path d="M51,38.028c-2.206,0-4,1.794-4,4s1.794,4,4,4s4-1.794,4-4S53.206,38.028,51,38.028z M51,44.028c-1.103,0-2-0.897-2-2 s0.897-2,2-2s2,0.897,2,2S52.103,44.028,51,44.028z"></path> <path d="M44,45.028c-2.206,0-4,1.794-4,4s1.794,4,4,4s4-1.794,4-4S46.206,45.028,44,45.028z M44,51.028c-1.103,0-2-0.897-2-2 s0.897-2,2-2s2,0.897,2,2S45.103,51.028,44,51.028z"></path> <path d="M44,39.028c2.206,0,4-1.794,4-4s-1.794-4-4-4s-4,1.794-4,4S41.794,39.028,44,39.028z M44,33.028c1.103,0,2,0.897,2,2 s-0.897,2-2,2s-2-0.897-2-2S42.897,33.028,44,33.028z"></path> <path d="M23,38.028h-3v-3c0-0.553-0.448-1-1-1h-6c-0.552,0-1,0.447-1,1v3H9c-0.552,0-1,0.447-1,1v6c0,0.553,0.448,1,1,1h3v3 c0,0.553,0.448,1,1,1h6c0.552,0,1-0.447,1-1v-3h3c0.552,0,1-0.447,1-1v-6C24,38.474,23.552,38.028,23,38.028z M22,44.028h-3 c-0.552,0-1,0.447-1,1v3h-4v-3c0-0.553-0.448-1-1-1h-3v-4h3c0.552,0,1-0.447,1-1v-3h4v3c0,0.553,0.448,1,1,1h3V44.028z"></path> </g> </g> </g></svg>
						</span>
						<h3>Aksesoris</h3>
						<p><a href="/aksesoris" class="btn btn-primary btn-outline">Lihat</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection