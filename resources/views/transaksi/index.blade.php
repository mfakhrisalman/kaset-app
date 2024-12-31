@extends('layouts.main')

@section('container')
<div class="flex items-center flex-wrap justify-between gap20 mb-27">
    <h3>#{{ $nextSaleId }}</h3>
    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
        <li>
            <a href="index.html"><div class="text-tiny">Dashboard</div></a>
        </li>
        <li>
            <i class="icon-chevron-right"></i>
        </li>
        <li>
            <a href="/transaksi"><div class="text-tiny">Transaksi</div></a>
        </li>
        <li>
            <i class="icon-chevron-right"></i>
        </li>
        <li>
            <div class="text-tiny">#{{ $nextSaleId }}</div>
        </li>
    </ul>
</div>
<!-- order-detail -->
<div class="wg-order-detail">
    <div class="left flex-grow">
        <div class="wg-box mb-20">
            <form action="/transaksi" method="post" class="tf-section-1 form-add-product" enctype="multipart/form-data">
                @csrf
                <fieldset class="category">
                    <div class="body-title mb-10">Jenis <span class="tf-color-1">*</span></div>
                    <div class="select">
                        <select name="category" id="categorySelect" class="">
                            <option value="" disabled selected>Pilih Jenis Barang</option>
                            <option value="PS 3">PS 3</option>
                            <option value="PS 4">PS 4</option>
                            <option value="Aksesoris">Aksesoris</option>
                        </select>
                    </div>
                </fieldset>
                <fieldset class="category">
                    <div class="body-title mb-10">Nama Barang<span class="tf-color-1">*</span></div>
                    <div class="select">
                        <select name="name" id="productSelect" class="">
                            <option value="" disabled selected>Pilih Barang</option>
                            <!-- PS 3 Options -->
                            @foreach ($game3 as $gameps3)
                            <option value="{{ $gameps3->name }}" class="ps3-option" data-price="{{ $gameps3->price }}">{{ $gameps3->name }}</option>
                            @endforeach
                            <!-- PS 4 Options -->
                            @foreach ($game4 as $gameps4)
                            <option value="{{ $gameps4->name }}" class="ps4-option" data-price="{{ $gameps4->price }}">{{ $gameps4->name }}</option>
                            @endforeach
                            <!-- Aksesoris Options -->
                            @foreach ($aksesoris as $aksesorisku)
                            <option value="{{ $aksesorisku->name }}" class="aksesoris-option" data-price="{{ $aksesorisku->price }}">{{ $aksesorisku->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </fieldset>
                <input id="no_transaksi" name="no_transaksi" type="hidden" value="{{ $nextSaleId }}">
                <input id="priceInput" name="price" type="hidden" >
                <div class="gap22 cols">
                    <fieldset class="price">
                        <div class="body-title mb-10">Jumlah <span class="tf-color-1">*</span></div>
                        <input class="mb-10" name="qty" type="text" placeholder="Masukkan Jumlah" tabindex="0" value="" required="">
                    </fieldset>
                    <fieldset class="stock">
                        <div class="body-title mb-10"> <span class="tf-color-1">&nbsp;</span></div>
                        <button class="tf-button style-1 w-full" type="submit">Tambah</button>
                    </fieldset>
                </div>
            </form>
        </div>
        
        <div class="wg-box">
            <div class="wg-table table-order-detail">
                <ul class="flex flex-column">
                    @foreach ($detail_transaksi as $detail_transaksiku)
                    <li class="product-item gap14">
                        <div class="flex items-center justify-between gap40 flex-grow">
                            <div class="name">
                                <div class="text-tiny mb-1">Nama Produk</div>
                                <div class="body-title-2">{{ $detail_transaksiku->name }}</div>
                            </div>
                            <div class="name">
                                <div class="text-tiny mb-1">Jumlah</div>
                                <div class="body-title-2">{{ $detail_transaksiku->qty }}</div>
                            </div>
                            <div class="name">
                                <div class="text-tiny mb-1">Harga</div>
                                <div class="body-title-2">Rp {{ number_format($detail_transaksiku->price, 0, ',', '.') }}</div>
                            </div>
                            <div class="name">
                                <form action="/transaksi/{{ $detail_transaksiku->id }}" method="post" style="display: inline;">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="waves-block btn-flat body-title-2">
                                        <input id="priceInput" name="price" type="hidden" >
                                        <div class="item trash"><i class="icon-trash-2" style="color:red"></i></div>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
    <div class="right">
        <div class="wg-box mb-20 gap10">
            <div class="summary-item">
                <div class="body-text">Transaksi ID</div>
                <div class="body-title-2">#{{ $nextSaleId }}</div>
            </div>
            <div class="summary-item">
                <div class="body-text">Date</div>
                <div class="body-title-2" id="currentDate"></div>
            </div>
            <div class="summary-item">
                <div class="body-text">Total</div>
                <div class="body-title-2 tf-color-1">Rp {{ number_format($totalPrice, 0, ',', '.') }}</div>
            </div>
        </div>
        <div class="wg-box gap10">
            <form action="/transaksi/simpan" method="post" class="tf-section-1 form-add-product" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="total_amount" value="{{ $totalPrice }}">
                <button class="tf-button style-1 w-full" type="submit"><i class="icon-save"></i>Simpan Transaksi</button>
            </form>
        </div>
    </div>
</div>
<!-- /order-detail -->
<script>
    // Mendapatkan tanggal hari ini
    const today = new Date();
    const options = { day: '2-digit', month: 'short', year: 'numeric' };
    const formattedDate = today.toLocaleDateString('en-GB', options);

    // Menampilkan tanggal di elemen dengan id "currentDate"
    document.getElementById('currentDate').innerHTML = formattedDate;
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categorySelect = document.getElementById('categorySelect');
        const productSelect = document.getElementById('productSelect');
        const priceInput = document.getElementById('priceInput');

        const ps3Options = document.querySelectorAll('.ps3-option');
        const ps4Options = document.querySelectorAll('.ps4-option');
        const aksesorisOptions = document.querySelectorAll('.aksesoris-option');

        // Fungsi untuk menyembunyikan semua opsi produk
        function hideAllOptions() {
            ps3Options.forEach(option => option.style.display = 'none');
            ps4Options.forEach(option => option.style.display = 'none');
            aksesorisOptions.forEach(option => option.style.display = 'none');
        }

        // Menampilkan opsi produk berdasarkan pilihan jenis barang
        categorySelect.addEventListener('change', function() {
            hideAllOptions(); // Sembunyikan semua opsi produk terlebih dahulu
            
            if (this.value === 'PS 3') {
                ps3Options.forEach(option => option.style.display = 'block');
            } else if (this.value === 'PS 4') {
                ps4Options.forEach(option => option.style.display = 'block');
            } else if (this.value === 'Aksesoris') {
                aksesorisOptions.forEach(option => option.style.display = 'block');
            }
        });

        // Menampilkan harga berdasarkan produk yang dipilih
        productSelect.addEventListener('change', function() {
            const selectedOption = productSelect.options[productSelect.selectedIndex];
            const price = selectedOption.getAttribute('data-price');
            priceInput.value = price ? price : '';
        });

        // Sembunyikan semua opsi produk saat halaman pertama kali dimuat
        hideAllOptions();
    });
</script>
@endsection
