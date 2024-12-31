@extends('layouts_lp.main')

@section('container')
<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image: url({{ asset('assets_lp/images/img_bg_3.jpg') }});margin-bottom: 5%;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div class="display-t">
                    <div class="display-tc animate-box" data-animate-effect="fadeIn">
                        <h1>FAQ</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div id="fh5co-faq" class="py-5">
    <div class="container">
        
        <div class="faq-content">
            <h3 class="text-center mb-4 mt-4">Frequently Asked Questions</h3>

            <button class="accordion">Apa itu toko ini?</button>
            <div class="panel">
                <p>Toko ini adalah tempat di mana kami menyediakan berbagai produk berkualitas dengan harga yang kompetitif. Kami berkomitmen untuk memberikan layanan terbaik kepada pelanggan kami.</p>
            </div>

            <button class="accordion">Bagaimana cara melakukan pemesanan?</button>
            <div class="panel">
                <p>Untuk melakukan pemesanan, Anda dapat mengunjungi halaman produk, memilih barang yang diinginkan, dan mengikuti instruksi untuk menyelesaikan pembelian. Jika Anda memerlukan bantuan lebih lanjut, jangan ragu untuk menghubungi layanan pelanggan kami.</p>
            </div>

            <button class="accordion">Apakah ada biaya pengiriman?</button>
            <div class="panel">
                <p>Biaya pengiriman akan tergantung pada lokasi pengiriman dan berat barang. Biaya pengiriman akan dihitung secara otomatis saat Anda melakukan checkout dan akan ditampilkan sebelum Anda menyelesaikan pembelian.</p>
            </div>

            <button class="accordion">Bagaimana cara mengembalikan barang?</button>
            <div class="panel">
                <p>Jika Anda ingin mengembalikan barang, silakan hubungi tim layanan pelanggan kami dalam waktu 14 hari setelah menerima pesanan. Kami akan memberikan petunjuk tentang cara mengembalikan barang dan proses pengembalian dana.</p>
            </div>

            <button class="accordion">Bagaimana cara menghubungi layanan pelanggan?</button>
            <div class="panel">
                <p>Anda dapat menghubungi layanan pelanggan kami melalui email di support@toko.com atau melalui telepon di (021) 123-4567. Kami siap membantu Anda dengan pertanyaan atau masalah yang Anda hadapi.</p>
            </div>
        </div>
    </div>
</div>

<style>
    .accordion {
        background-color: #eee;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
        margin-bottom: 10px;
    }

    .active, .accordion:hover {
        background-color: #ccc;
    }

    .accordion:after {
        content: '\002B';
        color: #777;
        font-weight: bold;
        float: right;
        margin-left: 5px;
    }

    .active:after {
        content: "\2212";
    }

    .panel {
        padding: 0 18px;
        background-color: white;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
    }
</style>

<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            } 
        });
    }
</script>
@endsection
