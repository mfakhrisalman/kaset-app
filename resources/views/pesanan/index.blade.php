@extends('layouts.main')

@section('container')
<div class="flex items-center flex-wrap justify-between gap20 mb-27">
    <h3>Daftar Pesanan</h3>
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
     </ul>
</div>
<!-- order-list -->
<div class="wg-box">
    @if ($pesanan->isNotEmpty())
    <table id="myTable" class="table table-striped table-hover" style="width:100%">
        <thead class="">
            <tr class="table-title">
                <th class="body-title" style="text-align: left;">Tanggal Transaksi</th>
                <th class="body-title">Nama Pelanggan</th>
                <th class="body-title">Pengiriman</th>
                <th class="body-title">Total Transaksi</th>
                <th class="body-title">Status</th>
                <th class="body-title" style="text-align: right;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesanan as $pesananku)
            <tr>
                <td class="body-text" style="text-align: left;">{{ $pesananku->created_at->format('d F Y') }}</td>
                <td class="body-text">{{ $pesananku->user->name ?? 'Nama Tidak Ditemukan' }}</td> <!-- Menampilkan nama pengguna -->
                <td class="body-text">{{ $pesananku->deliver }}</td>
                <td class="body-text">Rp {{ number_format($pesananku->total, 0, ',', '.') }}</td>
                <td class="body-text">{{ $pesananku->status }}</td>
                <td style="text-align: right">
                    <div class="list-icon-function">
                        <a href="/daftar-pesanan/{{ $pesananku->no_transaksi }}/edit"><div class="item edit"><i class="icon-edit"></i></div></a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Belum ada pesanan.</p>
    @endif
</div>
<!-- /order-list -->
@endsection
