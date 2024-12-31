@extends('layouts_lp.main')

@section('container')
<style>
    /* Pengaturan Opsi Pengiriman */
    .shipping-options {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .shipping-options label {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .shipping-options input[type="radio"] {
        accent-color: #007bff;
    }

    /* Button Styling */
    .mt-10 {
        margin-top: 10px;
    }

    .btn-sm {
        padding: 5px 10px;
        font-size: 14px;
        border-radius: 4px;
        border: none;
        cursor: pointer;
    }

    .btn-sm.btn-primary {
        background-color: #007bff;
        color: white;
    }

    .btn-sm.btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-sm.btn-danger {
        background-color: #dc3545;
        color: white;
    }

    .btn-sm.btn-danger:hover {
        background-color: #c82333;
    }

    /* Styling Tabel Riwayat */
    .table-order-detail {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }

    .table-order-detail th, .table-order-detail td {
        padding: 12px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    .table-order-detail th {
        background-color: #f8f9fa;
        color: #495057;
    }

    .table-order-detail tbody tr:hover {
        background-color: #f1f1f1;
    }

    .table-order-detail .action-icon {
        cursor: pointer;
    }

    .table-order-detail .action-icon i {
        font-size: 18px;
        color: #007bff;
    }

    .table-order-detail .action-icon:hover i {
        color: #0056b3;
    }

    /* Styling Box Utama */
    .wg-box {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 30px;
    }

    .body-title-2 {
        font-size: 18px;
        font-weight: bold;
        color: #333;
    }

    .body-text {
        font-size: 14px;
        color: #666;
    }

    /* Responsif untuk Tabel */
    @media (max-width: 768px) {
        .table-order-detail {
            font-size: 12px;
        }

        .table-order-detail th, .table-order-detail td {
            padding: 8px;
        }

        .wg-box {
            padding: 15px;
        }

        .table-order-detail .action-icon {
            font-size: 16px;
        }
    }
</style>

<div class="wg-box">
    <h2>Riwayat Pembelian</h2>

    @if ($pesanan->isNotEmpty())
    <table class="table-order-detail">
        <thead>
            <tr>
                <th class="body-title" style="text-align: left;">Tanggal Transaksi</th>
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
                <td class="body-text">{{ $pesananku->deliver }}</td>
                <td class="body-text">Rp {{ number_format($pesananku->total, 0, ',', '.') }}</td>
                <td class="body-text">{{ $pesananku->status }}</td>
                <td style="text-align: right">
                    <div class="action-icon">
                        <a href="/riwayat-detail/{{ $pesananku->no_transaksi }}/view">
                            <i class="icon-eye"></i>
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Belum ada riwayat transaksi pesanan.</p>
    @endif
</div>

@endsection
