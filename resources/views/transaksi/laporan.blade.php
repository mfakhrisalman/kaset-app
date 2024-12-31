@extends('layouts.main')

@section('container')
<div class="flex items-center flex-wrap justify-between gap20 mb-27">
    <h3>Laporan Transaksi</h3>
    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
        <li>
            <a href="/dashboard"><div class="text-tiny">Dashboard</div></a>
        </li>
        <li>
            <i class="icon-chevron-right"></i>
        </li>
        <li>
            <a href="/laporan-transaksi"><div class="text-tiny">Laporan</div></a>
        </li>
        <li>
            <i class="icon-chevron-right"></i>
        </li>
        <li>
            <div class="text-tiny">Laporan Transaksi</div>
        </li>
    </ul>
</div>
<!-- order-list -->
<div class="wg-box">
    <table id="myTable" class="table table-striped table-hover" style="width:100%">
        <thead class="">
            <tr class="table-title">
                <th class="body-title" style="text-align: left;">Tanggal Transaksi</th>
                <th class="body-title">Total Transaksi</th>
                <th class="body-title" style="text-align: right;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $transaksiku)
            <tr>
                <td class="body-text" style="text-align: left;">{{ $transaksiku->created_at->format('d F Y') }}</td>
                <td class="body-text">Rp {{ number_format($transaksiku->total_amount, 0, ',', '.') }}</td>
                <td style="text-align: right">
                    <div class="list-icon-function">
                        <a href="/laporan-transaksi/{{ $transaksiku->id }}/view"><div class="item eye"><i class="icon-eye"></i></div></a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- /order-list -->
@endsection
