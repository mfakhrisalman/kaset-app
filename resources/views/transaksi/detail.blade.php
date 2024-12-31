@extends('layouts.main')

@section('container')
<div class="flex items-center flex-wrap justify-between gap20 mb-27">
    <h3>Detail Transaksi #{{ $transaksi->id  }}</h3>
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
            <div class="text-tiny">#{{ $transaksi->id }}</div>
        </li>
    </ul>
</div>
<!-- order-detail -->
<div class="wg-order-detail">
    <div class="left flex-grow">
        
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
                <div class="body-title-2">#{{ $transaksi->id}}</div>
            </div>
            <div class="summary-item">
                <div class="body-text">Date</div>
                <div class="body-title-2">{{ $transaksi->created_at->format('d F Y') }}</div>
            </div>
            <div class="summary-item">
                <div class="body-text">Total</div>
                <div class="body-title-2 tf-color-1">Rp {{ number_format($transaksi->total_amount, 0, ',', '.') }}</div>
            </div>
        </div>
    </div>
</div>
<!-- /order-detail -->
@endsection
