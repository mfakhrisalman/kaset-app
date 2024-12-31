@extends('layouts.main')

@section('container')
<div class="flex items-center flex-wrap justify-between gap20 mb-27">
    <h3>Daftar Pesanan #{{ $pesanan->first()->no_transaksi }}</h3>
    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
        <li>
            <a href="/dashboard"><div class="text-tiny">Dashboard</div></a>
        </li>
        <li>
            <i class="icon-chevron-right"></i>
        </li>
        <li>
            <a href="/pesanan"><div class="text-tiny">Daftar Pesanan</div></a>
        </li>
        <li>
            <i class="icon-chevron-right"></i>
        </li>
        <li>
            <div class="text-tiny">#{{ $pesanan->first()->no_transaksi }}</div>
        </li>
    </ul>
</div>
<!-- order-detail -->
<div class="wg-order-detail">
    <div class="left flex-grow" style="width: 700px">
        <div class="wg-box mb-20">
            <div class="wg-table table-order-detail">
                <ul class="flex flex-column">
                    @foreach ($pesanan as $item)
                    <li class="product-item gap14">
                        <div class="flex items-center justify-between gap40 flex-grow">
                            <div class="name">
                                <div class="text-tiny mb-1">Nama Produk</div>
                                @if ($item->product_id)
                                    <div class="body-title-2">{{ $products->where('id', $item->product_id)->first()->name }}</div>
                                @else
                                    <div class="body-title-2">{{ $accessories->where('id', $item->accessory_id)->first()->name }}</div>
                                @endif
                            </div>
                            <div class="name">
                                <div class="text-tiny mb-1">Jumlah</div>
                                <div class="body-title-2">{{ $item->quantity }}</div>
                            </div>
                            <div class="name">
                                <div class="text-tiny mb-1">Harga</div>
                                <div class="body-title-2">Rp {{ number_format($item->product_id ? $products->where('id', $item->product_id)->first()->price : $accessories->where('id', $item->accessory_id)->first()->price, 0, ',', '.') }}</div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="wg-box">
            <div class="wg-table table-order-detail">
                <div class="flex items-center justify-between gap10 mb-20">
                    <!-- Select dan Button di Bawahnya -->
                    <div class="item" style="text-align: left; width: 100%;">
                        <!-- Select berada di atas -->
                        <form action="/pesanan/updatestatus" method="POST">
                            @csrf
                @method('PATCH')
                        <input type="hidden" name="no_transaksi" value="{{ $pesanan->first()->no_transaksi }}">
                        <div class="select" style="margin-bottom: 10px; width: 100%;">
                            <select class="w-full" style="width: 100%;" name="status">
                                <option value="Diproses" {{ $pesanan->first()->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                <option value="Diantar" {{ $pesanan->first()->status == 'Diantar' ? 'selected' : '' }}>Diantar</option>
                                <option value="Menunggu Di Ambil" {{ $pesanan->first()->status == 'Menunggu Di Ambil' ? 'selected' : '' }}>Menunggu Di Ambil</option>
                                <option value="Selesai" {{ $pesanan->first()->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                            
                        </div>
                        <!-- Button berada di bawah -->
                        <div class="button" style="margin-top: 10px; width: 100%;">
                            <button class="tf-button style-1 w-full" type="submit">Ubah Status</button>
                        </div>
                    </form>
                    </div>
                </div>                  
            </div>
        </div>
        
        
        
    </div>
    <div class="right" style="width: 400px">
        <div class="wg-box mb-20 gap10">
            <div class="summary-item">
                <div class="body-text">Transaksi ID</div>
                <div class="body-title-2">{{ $pesanan->first()->no_transaksi }}</div>
            </div>
            <div class="summary-item">
                <div class="body-text">Date</div>
                <div class="body-title-2">{{ $pesanan->first()->created_at->format('d F Y') }}</div>
            </div>
            <div class="summary-item">
                <div class="body-text">Pengiriman</div>
                <div class="body-title-2 ">{{ $pesanan->first()->deliver}}</div>
            </div>
            <div class="summary-item">
                <div class="body-text">Alamat</div>
                <div class="body-title-2 ">{{ $pesanan->first()->address}}</div>
            </div>
            <div class="summary-item">
                <div class="body-text">Total</div>
                <div class="body-title-2 tf-color-1">Rp {{ number_format($pesanan->first()->total, 0, ',', '.') }}</div>
            </div>
        </div>
        <div class="wg-box mb-20 gap10">
                    <!-- Gambar Receipt -->
                    <div class="item" style="flex: 1;">
                        @if ($pesanan->first()->receipt)
                            <img src="{{ asset('storage/' . $pesanan->first()->receipt) }}" alt="Receipt Image" style="max-width: 10    0%; height: auto;">
                        @else
                            <p>No receipt available</p>
                        @endif
                    </div>  
        </div>
    </div>
</div>
<!-- /order-detail -->
@endsection
