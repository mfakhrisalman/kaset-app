@extends('layouts_lp.main')

@section('container')
<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image: url({{ asset('assets_lp/images/img_bg_4.jpg') }});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div class="display-t">
                    <div class="display-tc animate-box" data-animate-effect="fadeIn">
                        <h1>Kontak</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div id="fh5co-contact">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-push-1 animate-box">
                
                <div class="fh5co-contact-info">
                    <h3>Informasi Kontak</h3>
                    <ul>
                        <li class="address">Jl. Dr. Setia Budhi No.2, Rintis<br> Kec. Lima Puluh, Kota Pekanbaru, Riau 28144</li>
                        <li class="phone"><a href="#">+ 1235 2355 98</a></li>
                        <li class="email"><a href="#">info@yoursite.com</a></li>
                        <li class="url"><a href="#">www.budielektronik.com</a></li>
                    </ul>
                </div>

            </div>
            <div class="col-md-6 animate-box">
                <h3>Hubungi Kami</h3>
                <form action="/contact" method="POST">
                    @csrf
                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="text" name="name"  class="form-control" placeholder="Nama Anda">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="email" name="email" class="form-control" placeholder="Email Anda">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="text" name="nohp"  class="form-control" placeholder="Nomor HP Anda">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <textarea name="message" name="message" cols="30" rows="10" class="form-control" placeholder="Katakan sesuatu tentang kami"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Kirim Pesan" class="btn btn-primary">
                    </div>

                </form>		
            </div>
        </div>
        
    </div>
</div>
@endsection