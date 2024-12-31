@extends('layouts_lp.main')

@section('container')
<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image: url({{ asset('assets_lp/images/img_bg_3.jpg') }});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div class="display-t">
                    <div class="display-tc animate-box" data-animate-effect="fadeIn">
                        <h1>Profile</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div id="fh5co-about">
    <div class="container">
        <div class="about-content">
            <div class="row animate-box">
                <div class="col-md-6">
                    <div class="desc">
                        <h3>Sejarah Toko</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse quo est quis mollitia ratione magni assumenda repellat atque modi temporibus tempore ex. Dolore facilis ex sunt ea praesentium expedita numquam?</p> 
                        <p>Quos quia provident consequuntur culpa facere ratione maxime commodi voluptates id repellat velit eaque aspernatur expedita. Possimus itaque adipisci rem dolorem nesciunt perferendis quae amet deserunt eum labore quidem minima.</p>
                    </div>
                    <div class="desc">
                        <h3>Misi &amp; Visi</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse quo est quis mollitia ratione magni assumenda repellat atque modi temporibus tempore ex. Dolore facilis ex sunt ea praesentium expedita numquam?</p> 
                        <p>Quos quia provident consequuntur culpa facere ratione maxime commodi voluptates id repellat velit eaque aspernatur expedita. Possimus itaque adipisci rem dolorem nesciunt perferendis quae amet deserunt eum labore quidem minima.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <img class="img-responsive" src="{{ asset('assets_lp/images/img_bg_1.jpg') }}" alt="about">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection